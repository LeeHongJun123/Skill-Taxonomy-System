<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'Role',
    ];

    public function skills()
    {
        return $this->belongsToMany(Skill::Class);
    }

    public function tools()
    {
        return $this->belongsToMany(Tool::Class);
    }

}
