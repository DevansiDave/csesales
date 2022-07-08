<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SalesPerson;
use App\Models\Company;
use Illuminate\Http\Request;
use auth;
class CompanyController extends Controller
{
	public function index()
    {
    	if(Auth::user()->usertype == 1){
    		$Company = Company::orderBy('created_at', 'desc')->paginate(10);
        	return view('Admin.Company.index',compact('Company'));
    	}else{
    		return redirect()->route('login');
    	}
        
    }

    public function create()
    {
        $SalesPerson    = SalesPerson::all();
        return view('Admin.Company.create',compact('SalesPerson'));
    }

    public function store(Request $request)
    {
    	$this->validate($request , [
            'company'       => 'required|string|max:255',
            'site'          => 'required',
            // 'type'          => 'required',
            // 'primary_type'  => 'required'
		]);

    	$Company = Company::create([
            'company'                   => $request->get('company'),
            'company_phone'             => $request->get('company_phone'),
            'site'                      => $request->get('site'),
            'fax'                       => $request->get('fax'),
            'address1'                  => $request->get('address1'),
            'website'                   => $request->get('website'),
            'address2'                  => $request->get('address2'),
            'linkedin'                  => $request->get('linkedin'),
            'city'                      => $request->get('city'),
            'facebook'                  => $request->get('facebook'),
            'state'                     => $request->get('state'),
            'twitter'                   => $request->get('twitter'),
            'zip'                       => $request->get('zip'),
            'country'                   => $request->get('country'),
            'sharepoint'                => $request->get('sharepoint'),
            'customer_contract_type'    => $request->get('customer_contract_type'),
            'company_id'                => $request->get('company_id'),
            'status'                    => $request->get('status'),
            'territory'                 => $request->get('territory'),
            'account_id'                => $request->get('account_id'),
            'market'                    => $request->get('market'),
            'vendor_id'                 => $request->get('vendor_id'),
            'primary_sales'             => $request->get('primary_sales'),
            'date_acquired'             => $request->get('date_acquired'),
            'secondary_sales'           => $request->get('secondary_sales'),
            'not_a_fit_reason'          => $request->get('not_a_fit_reason'),
            'customer_billing_contact'  => $request->get('customer_billing_contact'),
            'customer_billing_email'    => $request->get('customer_billing_email'),
            'customer_billing_phone'    => $request->get('customer_billing_phone'),
            'customer_sales_contact'    => $request->get('customer_sales_contact'),
            'customer_sales_email'      => $request->get('customer_sales_email'),
            'customer_sales_phone'      => $request->get('customer_sales_phone'),
            'type'                      => $request->get('type'),
            'name'                      => $request->get('name'),
            'email'                     => $request->get('email'),
            'title'                     => $request->get('title'),
            'relationship'              => $request->get('relationship'),
            'phone'                     => $request->get('phone'),
            'primary_type'              => $request->get('primary_type'),
            'account_manager'           => $request->get('account_manager'),
            'primary_tech'              => $request->get('primary_tech'),
            'sales_orginator'           => $request->get('sales_orginator'),
    	]);
		return redirect()->route('Company.index')->with('success','Company Created Successfully');
    }

    public function edit($id)
    {  
        $SalesPerson    = SalesPerson::all();
        $Company        = Company::find($id);
        return view('Admin.Company.edit',compact('SalesPerson','Company'));
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request , [
            'company'       => 'required|string|max:255',
            'site'          => 'required',
            // 'type'          => 'required',
            // 'primary_type'  => 'required'
        ]);

		$Company = Company::find($id);
        $Company->company                   = $request->get('company');
        $Company->company_phone             = $request->get('company_phone');
        $Company->site                      = $request->get('site');
        $Company->fax                       = $request->get('fax');
        $Company->address1                  = $request->get('address1');
        $Company->website                   = $request->get('website');
        $Company->address2                  = $request->get('address2');
        $Company->linkedin                  = $request->get('linkedin');
        $Company->city                      = $request->get('city');
        $Company->facebook                  = $request->get('facebook');
        $Company->state                     = $request->get('state');
        $Company->twitter                   = $request->get('twitter');
        $Company->zip                       = $request->get('zip');
        $Company->country                   = $request->get('country');
        $Company->sharepoint                = $request->get('sharepoint');
        $Company->customer_contract_type    = $request->get('customer_contract_type');
        $Company->company_id                = $request->get('company_id');
        $Company->status                    = $request->get('status');
        $Company->territory                 = $request->get('territory');
        $Company->account_id                = $request->get('account_id');
        $Company->market                    = $request->get('market');
        $Company->vendor_id                 = $request->get('vendor_id');
        $Company->primary_sales             = $request->get('primary_sales');
        $Company->date_acquired             = $request->get('date_acquired');
        $Company->secondary_sales           = $request->get('secondary_sales');
        $Company->not_a_fit_reason          = $request->get('not_a_fit_reason');
        $Company->customer_billing_contact  = $request->get('customer_billing_contact');
        $Company->customer_billing_email    = $request->get('customer_billing_email');
        $Company->customer_billing_phone    = $request->get('customer_billing_phone');
        $Company->customer_sales_contact    = $request->get('customer_sales_contact');
        $Company->customer_sales_email      = $request->get('customer_sales_email');
        $Company->customer_sales_phone      = $request->get('customer_sales_phone');
        $Company->type                      = $request->get('type');
        $Company->name                      = $request->get('name');
        $Company->email                     = $request->get('email');
        $Company->title                     = $request->get('title');
        $Company->relationship              = $request->get('relationship');
        $Company->phone                     = $request->get('phone');
        $Company->primary_type              = $request->get('primary_type');
        $Company->account_manager           = $request->get('account_manager');
        $Company->primary_tech              = $request->get('primary_tech');
        $Company->sales_orginator           = $request->get('sales_orginator');
		$Company->save();
		return redirect()->route('Company.index')->with('success','Company Updated Successfully');
    }

    public function destroy($id)
    {
    	$Company = Company::find($id);
    	$Company->delete();
    	return redirect()->route('Company.index')->with('Delete','Company Deleted Successfully');
    }

    public function show($id)
    {
       $Company = Company::with('PrimarySalesPerson','SecondarySalesPerson')->where('id',$id)->first();
        return view('Admin.Company.show',compact('Company'));
    }

}