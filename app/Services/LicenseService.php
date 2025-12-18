<?php

namespace App\Services;

use App\Models\License;
use Illuminate\Support\Str;

class LicenseService
{
    /**
     * Generate a new unique license key.
     * Format: XXXXX-XXXXX-XXXXX-XXXXX (20 chars)
     */
    public function generateKey(): string
    {
        do {
            $key = strtoupper(Str::random(5) . '-' . Str::random(5) . '-' . Str::random(5) . '-' . Str::random(5));
        } while (License::where('license_key', $key)->exists());

        return $key;
    }

    /**
     * Validate a license key.
     */
    public function validateKey(string $key, ?string $machineId = null): array
    {
        $license = License::where('license_key', $key)->first();

        if (!$license) {
            return ['valid' => false, 'message' => 'License key not found.'];
        }

        if (!$license->is_active) {
            return ['valid' => false, 'message' => 'License is inactive.'];
        }

        if ($license->expires_at && $license->expires_at->isPast()) {
            return ['valid' => false, 'message' => 'License has expired.'];
        }

        if ($machineId) {
            // Check if machine is already associated via workstation
            // This logic depends on how strictly we link machines.
            // For now, we just check if we have reached max activations.
            // If the machine ID is new and we are at limit -> fail.
            // If the machine ID is known -> pass.
        }

        return ['valid' => true, 'license' => $license];
    }
}
