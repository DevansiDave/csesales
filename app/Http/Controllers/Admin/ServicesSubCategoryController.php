<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServicesSubCategory;
use App\Models\ServicesCategory;
use Illuminate\Http\Request;
use auth;
class ServicesSubCategoryController extends Controller
{
	public function index()
    {
    	if(Auth::user()->usertype == 1){
    		$ServicesSubCategory = ServicesSubCategory::with('ServicesCategory')->orderBy('created_at', 'desc')->paginate(10);
        	return view('Admin.ServicesSubCategory.index',compact('ServicesSubCategory'));
    	}else{
    		return redirect()->route('login');
    	}
        
    }

    public function create()
    {
        $ServicesCategory = ServicesCategory::all();
    	return view('Admin.ServicesSubCategory.create',compact('ServicesCategory'));
    }

    public function store(Request $request)
    {
    	$this->validate($request , [
            'service_category_name' => 'required',
			'service_sub_category_name' => 'required|string|max:255',
		]);

    	$ServicesSubCategory = ServicesSubCategory::create([
            'services_category_id' => $request->get('service_category_name'),
    		'name' => $request->get('service_sub_category_name'),
    	]);
		return redirect()->route('ServicesSubCategory.index')->with('success','Services Sub Category Created Successfully');
    }

    public function edit($id)
    {  
        $ServicesSubCategory = ServicesSubCategory::find($id);
        $ServicesCategory = ServicesCategory::all();
        return view('Admin.ServicesSubCategory.edit',compact('ServicesSubCategory','ServicesCategory'));
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request , [
            'service_category_name' => 'required',
			'service_sub_category_name' => 'required|string|max:255'
		]);

		$ServicesSubCategory = ServicesSubCategory::find($id);
        $ServicesSubCategory->services_category_id = $request->get('service_category_name');
		$ServicesSubCategory->name = $request->get('service_sub_category_name');
		$ServicesSubCategory->save();
		return redirect()->route('ServicesSubCategory.index')->with('success','Services Sub Category Updated Successfully');
    }

    public function destroy($id)
    {
    	$ServicesSubCategory = ServicesSubCategory::find($id);
    	$ServicesSubCategory->delete();
    	return redirect()->route('ServicesSubCategory.index')->with('Delete','Services Sub Category Deleted Successfully');
    }
}