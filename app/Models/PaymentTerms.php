<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PaymentTerms extends Model
{
    protected $table = 'payment_terms';

    protected $fillable = ['name'];

}