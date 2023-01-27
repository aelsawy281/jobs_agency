<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSkill extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_id',
        'skill_id'
    
    ];

    public function jobs()
    {
        return $this->belongsTo(Jobs::class);
    }
    public function skills()
    {
        return $this->belongsTo(Skills::class);
    }
}
