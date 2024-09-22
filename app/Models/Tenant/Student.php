<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    use HasUuids;
    protected $fillable = [
        'user_id',
        'quran_class_id',
        'enrollment_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function quranClass()
    {
        return $this->belongsTo(QuranClass::class);
    }
}
