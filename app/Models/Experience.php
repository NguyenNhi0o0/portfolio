<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $table = 'experiences';
    protected $primaryKey = 'id';
    protected $fillable = ['name_exp', 'sta_month','sta_year','end_month','end_year','description' ];

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'exp_skills');
    }
}
