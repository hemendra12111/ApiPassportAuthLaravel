<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Student extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'fullName'=>$this->name,
            'Gender'=>$this->gender,
            'DateOfBirth'=>$this->dob,
            'Email'=>$this->email,
            'Class'=>$this->class,
            'Created'=>(string)$this->created_at->format('d-m-Y')
        ];
    }
}
