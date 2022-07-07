<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $table = 'services';

    protected $fillable = ['services_category_id','services_sub_category_id','name','payment_term_id','estimated_cost','block_of_hours'];

    public function ServicesCategory()
    {
        return $this->belongsTo('App\Models\ServicesCategory', 'services_category_id');
    }

    public function ServicesSubCategory()
    {
        return $this->belongsTo('App\Models\ServicesSubCategory', 'services_sub_category_id');
    }

    public function PaymentTerms()
    {
        return $this->belongsTo('App\Models\PaymentTerms', 'payment_term_id');
    }

}