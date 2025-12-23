<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasUuids;

    protected $fillable = ['code', 'name', 'sks', 'semester', 'description'];

    public function schedules()
    {
        return $this->hasMany(ClassSchedule::class);
    }
}
