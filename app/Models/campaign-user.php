<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class campaignUuser extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'campaing_id', 'status'];

}
