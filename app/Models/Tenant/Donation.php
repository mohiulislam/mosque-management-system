<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'mosque_id',
        'user_id',
        'amount',
        'donation_date',
        'purpose',
    ];

    public function mosque()
    {
        return $this->belongsTo(Mosque::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
