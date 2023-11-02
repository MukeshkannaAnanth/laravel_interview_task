<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Userdetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function list(){
        $data['getRecord'] = Userdetails::getUserDetails();
        $data['header_title'] = "User Detail List";
        return view('user.userDetails.list', $data);
    }

    public function add(){
        $data['header_title'] = "Add New User Detail";
        return view('user.userDetails.add', $data);
    }

    public function edit($id){
        $data['getRecord'] = Userdetails::getSingle($id);


        if(!empty($data['getRecord'])){

            $data['header_title'] = "Edit User Detail";
            return view('user.userDetails.edit', $data);
        }else{
           return redirect('NotFound/404');
        }


    }

    public function insert(Request $request){

        request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => ['required', 'regex:/^[0-9]{10}$/'],
            'address' => 'required',
            'state' => 'required',
            'city' => 'required',
        ]);


        $user = new Userdetails();
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->mobile = trim($request->mobile);
        $user->address = trim($request->address);
        $user->state = trim($request->state);
        $user->city = trim($request->city);
        $user->save();
     return redirect('user/user/list')->with('success','User Details Successfully Created');
    }

    public function update($id, Request $request){

        request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => ['required', 'regex:/^[0-9]{10}$/'],
            'address' => 'required',
            'state' => 'required',
            'city' => 'required',
        ]);


        $userdetails = Userdetails::getSingle($id);
        $userdetails->name = trim($request->name);
        $userdetails->email = trim($request->email);
        $userdetails->mobile = trim($request->mobile);
        $userdetails->address = trim($request->address);
        $userdetails->state = trim($request->state);
        $userdetails->city = trim($request->city);
        $userdetails->save();
        return redirect('user/user/list')->with('success','User Details Successfully Updated');
    }

    public function delete($id){
        $user = Userdetails::getSingle($id);
        $user->is_delete = 1;
        $user->save();
        return redirect('user/user/list')->with('success','User Details Successfully Deletd');
    }

}
