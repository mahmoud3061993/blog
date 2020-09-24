<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    public function users()
{
  return $this->belongsToMany('App\Models\User', 'user_post', 'post_id', 'user_id');
}
}
