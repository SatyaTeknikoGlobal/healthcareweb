<?php
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Zizaco\Entrust\Traits\EntrustUserTrait;

class HospitalUser extends Authenticatable{
  use Notifiable;
  protected $table = 'hospital_users';
  protected $guard = 'hospital';
  protected $guarded = ['id'];



}