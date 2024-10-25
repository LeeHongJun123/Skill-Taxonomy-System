<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_name',
        'job_title',
        'years',
        'start_date', 
        'end_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }

    public function tools()
    {
        return $this->belongsToMany(Tool::class);
    }
}
