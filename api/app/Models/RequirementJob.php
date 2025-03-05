<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RequirementJob extends Model
{   
    protected $table='requirement_jobs';
    use HasFactory;
    protected $gaurded=[];
    protected $hidden = ['job_title'];

    public function getTitleAttribute(): string
    {
        return $this->attributes['job_title'];
    }
    public function recruiter()
    {
        return $this->belongsTo(Recruiter::class);
    }
    protected $appends = ['title'];
}
