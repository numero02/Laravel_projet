<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    /**
     * annonces qui appartiennt à un certain utilisateur
     */
    public function user(){

        return $this->belongsTo(User::class);

    }

    public function category(){

        return $this->belongsTo(Category::class);

    }
}
