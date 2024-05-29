<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    // if i wnat to cange the name of this columns in the database
//    protected $connection ='ConntionName'; // if we want to connect with another connection no the default one
    protected $table = 'stores';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true; // if the primary key is incrementing is true else it will be false
    public $timestamps =true; // make false if i want to stop fill it automatically if i want to delete them from the database
}

