<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodRequest extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function Patient(){
        return $this->belongsTo(User::class,'patient_id','id');
    }
    public function Donor(){
        return $this->belongsTo(User::class,'donor_id','id');
    }
}
