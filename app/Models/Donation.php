<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function BloodRequest(){
        return $this->belongsTo(BloodRequest::class,'br_id','id');
    }
    public function Donor(){
        return $this->belongsTo(User::class,'donor_id','id');
    }
}
