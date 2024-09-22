<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuranClass extends Model
{
    use HasFactory;
    use HasUuids;
    protected $fillable = [
        'mosque_id',
        'teacher_id',
        'name',
        'schedule',
        'max_students',
    ];

    public function mosque()
    {
        return $this->belongsTo(Mosque::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
