<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'name',
        'description',
        'floor',
        'number'
    ];

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
}
