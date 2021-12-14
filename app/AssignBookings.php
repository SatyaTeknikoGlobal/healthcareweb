<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class AssignBookings extends Model{

    protected $table = 'assign_bookings';
  
    protected $fillable = ['booking_id','hospital_id'];


}