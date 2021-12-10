<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class HospitalDoctor extends Model{

    protected $table = 'hospital_doctors';

    protected $guarded = ['id'];
}