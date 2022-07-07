<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentTerms;
use Illuminate\Http\Request;
use auth;
class PaymentTermsController extends Controller
{
	public function index()
    {
    	if(Auth::user()->usertype == 1){
    		$PaymentTerms = PaymentTerms::orderBy('created_at', 'desc')->paginate(10);
        	return view('Admin.PaymentTerms.index',compact('PaymentTerms'));
    	}else{
    		return redirect()->route('login');
    	}
        
    }

    public function create()
    {
    	return view('Admin.PaymentTerms.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request , [
			'payment_terms' => 'required|string|max:255',
		]);

    	$PaymentTerms = PaymentTerms::create([
    		'name' => $request->get('payment_terms'),
    	]);
		return redirect()->route('PaymentTerms.index')->with('success','Payment Terms Created Successfully');
    }

    public function edit($id)
    {  
        $PaymentTerms = PaymentTerms::find($id);
        return view('Admin.PaymentTerms.edit',compact('PaymentTerms'));
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request , [
			'payment_terms' => 'required|string|max:255'
		]);

		$PaymentTerms = PaymentTerms::find($id);
		$PaymentTerms->name = $request->get('payment_terms');
		$PaymentTerms->save();
		return redirect()->route('PaymentTerms.index')->with('success','Payment Terms Updated Successfully');
    }

    public function destroy($id)
    {
    	$PaymentTerms = PaymentTerms::find($id);
    	$PaymentTerms->delete();
    	return redirect()->route('PaymentTerms.index')->with('Delete','Payment Terms Deleted Successfully');
    }
}