<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
     protected $fillable = [
        'name', 'gender', 'class','email','phone','dob'
    ];
    public function user(){
    	return $this->belongsTo(User::class);
    }

}
