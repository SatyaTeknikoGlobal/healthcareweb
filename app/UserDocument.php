<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDocument extends Model{

    protected $table = 'UsersDocuments';

    protected $guarded = ['id'];
   
}