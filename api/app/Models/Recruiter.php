<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruiter extends Model
{
    use HasFactory;
    protected $gaurded=[];
    protected $hidden = ['company_name'];

    public function getCompanyAttribute(): string
    {
        return $this->attributes['company_name'];
    }
    public function jobs()
    {
        return $this->haMany(RequirementJob::class);
    }
    protected $appends = ['company'];
}
