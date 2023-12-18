<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title','image','created_by','created_user_type','post_date'];

    //Belongs to User Table
    public function user()
    {
        return $this->belongsTo(User::class, "created_by", "id");
    }

    //Belongs to SuperAdmin Table
    public function super_admin()
    {
        return $this->belongsTo(SuperAdmin::class, "created_by", "id");
    }
}
