<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\User;
use Session;
use Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class RestoController extends Controller
{
    //
    function index()
    {
    	return view('home');
    }

    function list()
    {
    	$data = Restaurant::all();
    	return view('list', ["data"=>$data]);
    }
    function add(Request $req)
    {
        //return $req->input();
        $resto = new Restaurant;
        $resto->name=$req->input('name');
        $resto->email=$req->input('email');
        $resto->address=$req->input('address');
        $resto->save();
        $req->session()->flash('status', 'Restaurant entered Successfully');
        return redirect('list');
    }
    function delete($id)
    {
        Restaurant::find($id)->delete();
        //Session::flash('status', 'Restaurant has been deleted Successfully');
        return redirect('list');
    }
    function edit($id)
    {
        $data = Restaurant::find($id);
        return view('edit', ["data"=>$data]);
    }
    function update(Request $req)
    {
        //return $req->input();
        $resto = Restaurant::find($req->id);
        $resto->name=$req->input('name');
        $resto->email=$req->input('email');
        $resto->address=$req->input('address');
        $resto->save();
        $req->session()->flash('status', 'Restaurant updated Successfully');
        return redirect('list');
    }
    function register(Request $req)
    {
        //return $req->input();
        $resto = new User;
        $resto->name=$req->input('name');
        $resto->email=$req->input('email');
        $resto->password=Crypt::encrypt($req->input('password'));
        $resto->save();
        $req->session()->put('user', $req->input('name'));
        return redirect('/');
    }
    function login(Request $req){
        $user = User::where('email', $req->input('email'))->get();
        //return Crypt::decrypt($user[0]->password==$req->input($email)
        if(Crypt::decrypt($user[0]->password)==$req->input('password'))
        {
            $req->session()->put('user', $user[0]->name);
            return redirect('/');
        }
    }

    function logout(Request $req){
        $req->session()->forget('user');


        return redirect('login');
    }
    
}
