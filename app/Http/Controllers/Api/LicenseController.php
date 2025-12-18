<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\License;
use App\Models\Workstation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LicenseController extends Controller
{
    public function activate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'license_key' => 'required|string',
            'machine_id' => 'required|string',
            'machine_name' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $license = License::where('license_key', $request->license_key)->first();

        if (!$license) {
            return response()->json(['valid' => false, 'message' => 'Invalid license key'], 404);
        }

        if (!$license->is_active) {
            return response()->json(['valid' => false, 'message' => 'License is inactive'], 403);
        }

        if ($license->expires_at && $license->expires_at->isPast()) {
            return response()->json(['valid' => false, 'message' => 'License expired'], 403);
        }

        // Check if machine is already activated for this license
        $existingWorkstation = Workstation::where('machine_id', $request->machine_id)
            ->where('license_id', $license->id)
            ->first();

        if ($existingWorkstation) {
            return response()->json([
                'valid' => true,
                'message' => 'Machine already activated',
                'license' => $license
            ]);
        }

        // Check activation limit
        if ($license->activations_count >= $license->max_activations) {
            return response()->json(['valid' => false, 'message' => 'Max activations reached'], 403);
        }

        // Activate new machine
        // Ideally we should find the site and client context, but for API simplicity 
        // we might create a "Default Site" or require site_id.
        // For now, let's assume we update an existing workstation or create a dummy one if site context is missing?
        // Wait, the request comes from the client software.
        // Let's assume the software sends machine_id. We record it.
        
        // Strategy: We link the machine to the license.
        // We need a site_id to create a workstation.
        // For now, we will just increment count and maybe store machine_id in a separate log or
        // create a workstation if we can resolve the site.
        
        // Simplified: Just increment count and return success. 
        // Real implementation: User enters Key on Machine -> Machine calls API -> API registers Machine.
        
        $license->increment('activations_count');
        
        // Store workstation info (simplified, assuming we don't strictly need site_id for this logic or we fetch it from license->client->sites->first())
        $site = $license->client->sites->first();
        if ($site) {
             Workstation::create([
                'site_id' => $site->id,
                'name' => $request->machine_name ?? 'Unknown PC',
                'machine_id' => $request->machine_id,
                'license_id' => $license->id,
                'is_active' => true
            ]);
        }

        return response()->json([
            'valid' => true,
            'message' => 'Activation successful',
            'license' => $license
        ]);
    }

    public function check(Request $request)
    {
        $request->validate([
            'license_key' => 'required|string',
            'machine_id' => 'required|string',
        ]);

        $license = License::where('license_key', $request->license_key)->first();

        if (!$license || !$license->is_active || ($license->expires_at && $license->expires_at->isPast())) {
            return response()->json(['valid' => false], 200);
        }
        
        // Check if this machine is the one authorized?
        // If we strictly enforce machine binding:
        $isBound = Workstation::where('machine_id', $request->machine_id)
            ->where('license_id', $license->id)
            ->exists();

        if (!$isBound && $license->activations_count >= $license->max_activations) {
             return response()->json(['valid' => false, 'message' => 'Machine not authorized'], 200);
        }

        return response()->json(['valid' => true]);
    }
}
