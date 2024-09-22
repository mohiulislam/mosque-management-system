<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mosque extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'name',
        'address',
        'contact_number',
        'imam_id',
        'capacity',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function prayerTimes()
    {
        return $this->hasMany(PrayerTime::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }

    public function quranClasses()
    {
        return $this->hasMany(QuranClass::class);
    }
}
