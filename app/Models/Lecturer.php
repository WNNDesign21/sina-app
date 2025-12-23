<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasUuids;

    protected $fillable = ['user_id', 'name', 'nidn', 'email'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function schedules()
    {
        return $this->hasMany(ClassSchedule::class);
    }
}
