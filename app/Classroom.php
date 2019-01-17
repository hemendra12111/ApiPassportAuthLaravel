<?php

namespace App;
use App\Classroom;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable = [
        'class', 'no_student','teacher_id'
    ];
    public function user(){
    	return $this->belongsTo(Classroom::class);
    }
}

