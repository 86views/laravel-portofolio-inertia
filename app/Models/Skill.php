<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',    
        'skill_id',
        'project_url' 
    ];

   public function project() 
   {
    return  $this->hasMany(Project::class);
   }
}
