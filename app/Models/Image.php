<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table = 'images';
    protected $primaryKey = 'id';
    protected $fillable = ['category', 'src'];
    public $timestamps = false;

    // Phương thức để lấy dự án mà hình ảnh thuộc về
    public function project()
    {
        return $this->hasOne(Project::class, 'image_id');
    }
    public function banner()
    {
        return $this->belongsTo(Banner::class, 'parent_id');
    }
}
