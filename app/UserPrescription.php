<?php
namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class UserPrescription extends Model{
    protected $table = 'prescription';

    protected $guarded = ['id'];

    protected $fillable = [];


 
}