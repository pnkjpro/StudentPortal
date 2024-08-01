<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candreg extends Model
{
   protected $fillable = [
    'studentID', 'name', 'pname', 'session', 'gender', 'birthDate', 'course', 'phoneNumber', 'address', 'a-card', 'admissionDate', 'certNumber', 'status', 'mode',
   ];
   
   public function fee_records(){
       return $this->hasMany(FeeRecord::class, 'candreg_id', 'id');
   }
}
