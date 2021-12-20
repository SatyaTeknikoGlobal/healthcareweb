<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Chatwithuser extends Model{

    protected $table = 'chats_with_users';

    protected $guarded = ['id'];
}