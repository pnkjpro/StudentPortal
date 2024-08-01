<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeRecord extends Model
{
   protected $fillable = [
       'candreg_id', 'feeDate', 'feeAmount', 'feeType', 'splitStatus', 'comment', 'created_at', 'updated_at',
       ];
       
    protected $casts = [
    'feeDate' => 'datetime',
];
       
    public function candreg(){
        return $this->belongsTo(Candreg::class, 'candreg_id', 'id');
    }
}
