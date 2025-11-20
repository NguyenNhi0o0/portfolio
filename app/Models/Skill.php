<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $table = 'skills';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];

    // thiết lập mới quan hệ n-n với projects
    public function projects(){
        return $this->belongsToMany(Project::class);
    }

    public function educations(){
        return $this->belongsToMany(Education::class);
    }
    
    public function experiences(){
        return $this->belongsToMany(Experience::class);
    }
}
