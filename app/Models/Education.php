<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    protected $table = 'educations';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['name_edu', 'sta_month','sta_year','end_month','end_year','description' ];
    // $table->increments('id');
    //         $table->string('name_edu');
    //         $table->integer('sta_month');
    //         $table->integer('sta_year');
    //         $table->integer('end_month');
    //         $table->integer('end_year');
    //         $table->text('description');

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'educations_skills');
    }
}
