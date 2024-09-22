<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'mosque_id',
        'title',
        'content',
        'publish_date',
    ];

    public function mosque()
    {
        return $this->belongsTo(Mosque::class);
    }
}
