<?php
namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class UserOtp extends Model{
    protected $table = 'user_otp';
    protected $fillable =['mobile','otp','timestamp'];



}