<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'desc',
        'user_id',
        'speciality_id'

        
    ];
    public function applies()
    {
        return $this->hasMany(Apply::class,);
    }
    public function jobSkills()
    {
        return $this->hasMany(JobSkill::class,);
    }
    public function speciality()
    {
        return $this->belongsTo(Speciality::class);
    }
}
