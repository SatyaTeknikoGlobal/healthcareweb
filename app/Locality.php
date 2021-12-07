<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Locality extends Model{

    protected $table = 'locality';

    protected $guarded = ['id'];


    protected $fillable = [
        'name',
        'state_id',
        'city_id',
        'status',
    ];


    public function cityStateLocality(){
        return $this->belongsTo('App\City', 'city_id');
    }
}