<?php

namespace App;
use App\Teacher;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'name', 'gender', 'subject','email','phone','dob'
    ];
    public function user(){
    	return $this->belongsTo(Teacher::class);
    }
}
