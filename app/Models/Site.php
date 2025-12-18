<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'name', 'address'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function workstations()
    {
        return $this->hasMany(Workstation::class);
    }
}
