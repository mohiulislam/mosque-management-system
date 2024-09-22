<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'mosque_id',
        'title',
        'description',
        'start_time',
        'end_time',
    ];

    public function mosque()
    {
        return $this->belongsTo(Mosque::class);
    }
}
