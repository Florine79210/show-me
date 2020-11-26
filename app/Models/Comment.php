<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function user(){

        return $this->belongsTo('App\Models\User', 'user_id');
    } 

    public function show_it(){

        return $this->belongsTo('App\Models\Show_it', 'show_it_id');
    } 
}
