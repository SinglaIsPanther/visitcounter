<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $table = "visits";
    protected $fillable = ['ip_address', 'user_agent', 'url', 'created_at', 'updated_at', 'deleted_at'];
}
