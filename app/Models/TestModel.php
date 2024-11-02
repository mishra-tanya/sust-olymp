<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestModel extends Model
{
    protected $table='test_response';
    protected $fillable = ['user_id', 'results', 'test_id',  'class_id','status'];

}
