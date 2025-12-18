<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workstation extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_id',
        'name',
        'machine_id',
        'ip_address',
        'is_active',
        'license_id',
    ];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function license()
    {
        return $this->belongsTo(License::class);
    }
}
