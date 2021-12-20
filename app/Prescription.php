<?php
namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model{
    protected $table = 'admin_prescription';

    protected $guarded = ['id'];

    protected $fillable = [];


 
}