<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];
    // fillable

    protected $perPage=10;
    function user(){
        return $this->belongsTo(User::class);

    }
}
