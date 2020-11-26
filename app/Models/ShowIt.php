<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShowIt extends Model
{
    use HasFactory;

   public function user(){

        return $this->belongsTo('App\Models\User', 'user_id');
    } 

    public function comment(){

        return $this->belongsTo('App\Models\Comment', 'user_id');
        } 
}


