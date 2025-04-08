<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    // If the table name is not the plural form of the model name
    // you can specify the table name explicitly
    protected $table = 'job_listings';
 
    protected $fillable = ['title', 'description'];
}
