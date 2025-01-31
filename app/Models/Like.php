<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $table = "likes";

    protected $fillable = [
        'user_id',
        'image_id'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function image(){
        return $this->belongsTo('App\Models\Image');
    }

}
