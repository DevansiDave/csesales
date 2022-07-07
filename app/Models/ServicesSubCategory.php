<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ServicesSubCategory extends Model
{
    protected $table = 'services_sub_category';

    protected $fillable = ['services_category_id','name'];

    public function ServicesCategory()
    {
        return $this->belongsTo('App\Models\ServicesCategory', 'services_category_id');
    }

}