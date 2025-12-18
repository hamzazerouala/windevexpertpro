<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'software_id',
        'license_key',
        'max_activations',
        'activations_count',
        'expires_at',
        'is_active',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function software()
    {
        return $this->belongsTo(Software::class);
    }

    public function workstations()
    {
        return $this->hasMany(Workstation::class);
    }
}
