<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassroomServe extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
