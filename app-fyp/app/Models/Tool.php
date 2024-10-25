<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    use HasFactory;

    protected $fillable = [
        'Name',
        'Description',
    ];

    public function role()
    {
        return $this->belongsToMany(Role::Class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function careerHistories()
    {
        return $this->belongsToMany(CareerHistory::class);
    }
}
