<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $table = 'skills';
    protected $primaryKey = 'id';
    protected $fillable = ['section'];
    public function image()
    {
        return $this->hasOne(Image::class, 'parent_id');
    }

}
