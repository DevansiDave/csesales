<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';

    protected $fillable = ['company','company_phone','site','fax','address1','website','address2','linkedin','city','facebook','state','twitter','zip','country','sharepoint','customer_contract_type','company_id','status','territory','account_id','market','vendor_id','primary_sales','date_acquired','secondary_sales','not_a_fit_reason','customer_billing_contact','customer_billing_email','customer_billing_phone','customer_sales_contact','customer_sales_email','customer_sales_phone','type','name','email','title','relationship','phone','primary_type','account_manager','primary_tech','sales_orginator'];

    public function PrimarySalesPerson()
    {
        return $this->belongsTo('App\Models\SalesPerson', 'primary_sales');
    }

    public function SecondarySalesPerson()
    {
        return $this->belongsTo('App\Models\SalesPerson', 'secondary_sales');
    }

}