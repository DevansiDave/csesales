<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServicesSubCategory;
use App\Models\ServicesCategory;
use App\Models\Services;
use App\Models\PaymentTerms;
use Illuminate\Http\Request;
use auth;
class ServicesController extends Controller
{
	public function index()
    {
    	if(Auth::user()->usertype == 1){
    		$Services = Services::with('ServicesCategory','ServicesSubCategory','PaymentTerms')->orderBy('created_at', 'desc')->paginate(10);
        	return view('Admin.Services.index',compact('Services'));
    	}else{
    		return redirect()->route('login');
    	}
        
    }

    public function create()
    {
        $ServicesCategory    = ServicesCategory::all();
        $ServicesSubCategory = ServicesSubCategory::all();
        $PaymentTerms        =  PaymentTerms::all();
    	return view('Admin.Services.create',compact('ServicesCategory','ServicesSubCategory','PaymentTerms'));
    }

    public function store(Request $request)
    {
    	$this->validate($request , [
            'service_category' => 'required',
			'service_sub_category' => 'required',
            'service_name' => 'required|string|max:255',
		]);

    	$Services = Services::create([
            'services_category_id'      => $request->get('service_category'),
    		'services_sub_category_id'  => $request->get('service_sub_category'),
            'name'                      => $request->get('service_name'),
            'payment_term_id'           => $request->get('payment_term'),
            'estimated_cost'            => $request->get('estimated_cost'),
            'block_of_hours'            => $request->get('block_of_hours'),
    	]);
		return redirect()->route('Services.index')->with('success','Services Created Successfully');
    }

    public function edit($id)
    {  
        $Services            = Services::find($id);
        $ServicesCategory    = ServicesCategory::all();
        $PaymentTerms        =  PaymentTerms::all();
        $ServicesSubCategory    = ServicesSubCategory::where('services_category_id',$Services->services_category_id)->get();
        return view('Admin.Services.edit',compact('Services','PaymentTerms','ServicesSubCategory','ServicesCategory'));
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request , [
            'service_category' => 'required',
            'service_sub_category' => 'required',
            'service_name' => 'required|string|max:255',
        ]);

		$Services = Services::find($id);
        $Services->services_category_id     = $request->get('service_category');
		$Services->services_sub_category_id = $request->get('service_sub_category');
        $Services->name                     = $request->get('service_name');
        $Services->payment_term_id          = $request->get('payment_term');
        $Services->estimated_cost           = $request->get('estimated_cost');
        $Services->block_of_hours           = $request->get('block_of_hours');
		$Services->save();
		return redirect()->route('Services.index')->with('success','Services Updated Successfully');
    }

    public function destroy($id)
    {
    	$Services = Services::find($id);
    	$Services->delete();
    	return redirect()->route('Services.index')->with('Delete','Services Deleted Successfully');
    }

    public function show($id)
    {
        $Services = Services::with('ServicesCategory','ServicesSubCategory','PaymentTerms')->where('id',$id)->first();
        return view('Admin.Services.show',compact('Services'));
    }

    public function subcategoryAjax($id)
    {
        $ServicesSubCategory    = ServicesSubCategory::where('services_category_id',$id)
                        ->pluck('name','id');
        return json_encode($ServicesSubCategory);
    }
}