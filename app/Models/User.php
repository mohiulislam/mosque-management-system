<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements FilamentUser
{

    protected $connection = 'tenant';

    // use HasUuids;
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Authorize user to access Filament
    public function canAccessPanel(\Filament\Panel $panel): bool
    {
        return true; // Allow all registered users to access the panel
    }
}
