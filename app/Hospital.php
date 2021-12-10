<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model{

    protected $table = 'hospitals';

    protected $guarded = ['id'];


    protected $fillable = [];




    public function getGalleryImage(){
        return $this->hasMany('App\HospitalGallery', 'hospital_id');
    }

    public function getRole(){
        return $this->hasMany('App\HospitalRole', 'hospital_id')->where('is_delete','=', 0);
    }

     public function getUser(){
        return $this->hasMany('App\HospitalUser', 'hospital_id')->where('is_delete','=', 0);
    }
      public function getDocuments(){
        return $this->hasMany('App\HospitalDocuments', 'hospital_id');
    }
    public function getDoctor(){
        return $this->hasMany('App\HospitalDoctor', 'hospital_id')->where('is_delete','=', 0);
    }
    
    
}