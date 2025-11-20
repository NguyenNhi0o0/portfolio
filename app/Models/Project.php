<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'description', 'linkgitHub'];

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }

    // Phương thức để lấy liên kết 
    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id', 'id');
    }

    public static function getAll() {
        return Project::with('skills', 'image')->get();
    }
}
