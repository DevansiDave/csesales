<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class SalesPerson extends Model
{
    protected $table = 'sales_person';

    protected $fillable = ['user_id','first_name','last_name','email','second_email','phone','region'];

}