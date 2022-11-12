<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table="account_record";
    protected $fillable=['D_NAME','ACC_TYPE','Punishment','Date'];
}
