<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class HospitalDocuments extends Model{

    protected $table = 'hospital_documents';

    protected $guarded = ['id'];
}