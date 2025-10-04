<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'experience',
        'birth_date',
        'room_id',
        'post_id'
    ];
    protected $casts = [
        'birth_date' => 'datetime',
    ];
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function records()
    {
        return $this->hasMany(Record::class);
    }
}
