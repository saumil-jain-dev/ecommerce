<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name','code','discount_type','discount','discount_time','discount_start_date','discount_end_date','status'];
}
