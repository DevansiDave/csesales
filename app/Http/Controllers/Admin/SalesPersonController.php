<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SalesPerson;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use auth;
class SalesPersonController extends Controller
{
	public function index()
    {
    	if(Auth::user()->usertype == 1){
    		$salesperson = SalesPerson::orderBy('created_at', 'desc')->paginate(10);
        	return view('Admin.SalesPerson.index',compact('salesperson'));
    	}else{
    		return redirect()->route('login');
    	}
        
    }

    public function create()
    {
    	return view('Admin.SalesPerson.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request , [
			'first_name' => 'required|string|max:255|alpha_dash',
			'last_name' => 'required|string|max:255|alpha_dash',
			'email' => 'required|unique:users|email:rfc,dns',
			'region' => 'required'
		]);

    	$user = User::create([
    		'name' => $request->get('first_name'),
    		'email' => $request->get('email'),
    		'password' => Str::random(10),
    		'usertype' => 2
    	]);

		$salesperson = new SalesPerson();
		$salesperson->user_id = $user->id;
		$salesperson->first_name = $request->get('first_name');
		$salesperson->last_name = $request->get('last_name');
		$salesperson->email = $request->get('email');
		$salesperson->second_email = $request->get('secondary_email');
		$salesperson->phone = $request->get('phone');
		$salesperson->region = $request->get('region');
		$salesperson->save();
		return redirect()->route('SalesPerson.index')->with('success','Sales Person Created Successfully');
    }

    public function edit($id)
    {  
        $salesperson = SalesPerson::find($id);
        return view('Admin.SalesPerson.edit',compact('salesperson'));
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request , [
			'first_name' => 'required|string|max:255|alpha_dash',
			'last_name' => 'required|string|max:255|alpha_dash',
			'region' => 'required'
		]);

		$salesperson = SalesPerson::find($id);
		$salesperson->first_name = $request->get('first_name');
		$salesperson->last_name = $request->get('last_name');
		$salesperson->second_email = $request->get('secondary_email');
		$salesperson->phone = $request->get('phone');
		$salesperson->region = $request->get('region');
		$salesperson->save();

		$user = User::find($salesperson->user_id);
		$user->name = $request->get('first_name');
		$user->save();
		return redirect()->route('SalesPerson.index')->with('success','Sales Person Updated Successfully');
    }

    public function destroy($id)
    {
    	$salesperson = SalesPerson::find($id);
    	$user = User::find($salesperson->user_id);
    	$user->delete();
    	$salesperson->delete();
    	return redirect()->route('SalesPerson.index')->with('Delete','Sales Person Deleted Successfully');
    }
}