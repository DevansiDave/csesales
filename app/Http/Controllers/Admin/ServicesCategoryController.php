<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServicesCategory;
use App\Models\ServicesSubCategory;
use Illuminate\Http\Request;
use auth;
class ServicesCategoryController extends Controller
{
	public function index()
    {
    	if(Auth::user()->usertype == 1){
    		$ServicesCategory = ServicesCategory::orderBy('created_at', 'desc')->paginate(10);
        	return view('Admin.ServicesCategory.index',compact('ServicesCategory'));
    	}else{
    		return redirect()->route('login');
    	}
        
    }

    public function create()
    {
    	return view('Admin.ServicesCategory.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request , [
			'service_category_name' => 'required|string|max:255',
		]);

    	$ServicesCategory = ServicesCategory::create([
    		'name' => $request->get('service_category_name'),
    	]);
		return redirect()->route('ServicesCategory.index')->with('success','Services Category Created Successfully');
    }

    public function edit($id)
    {  
        $ServicesCategory = ServicesCategory::find($id);
        return view('Admin.ServicesCategory.edit',compact('ServicesCategory'));
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request , [
			'service_category_name' => 'required|string|max:255'
		]);

		$ServicesCategory = ServicesCategory::find($id);
		$ServicesCategory->name = $request->get('service_category_name');
		$ServicesCategory->save();
		return redirect()->route('ServicesCategory.index')->with('success','Services Category Updated Successfully');
    }

    public function destroy($id)
    {
    	$ServicesCategory = ServicesCategory::find($id);
    	$ServicesSubCategory = ServicesSubCategory::where('services_category_id',$id)->delete();
    	$ServicesCategory->delete();
    	return redirect()->route('ServicesCategory.index')->with('Delete','Services Category Deleted Successfully');
    }
}