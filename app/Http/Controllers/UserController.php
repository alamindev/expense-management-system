<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use Session;
use Image;

class UserController extends Controller {
 public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $all = User::orderBy('id', 'DESC')->get();
        return view('user.all', compact('all'));
    }

    public function add() {
        return view('user.add');
    }

    public function view($id) {
        $data=User::findOrFail($id);
        return view('user.view',compact('data'));
    }

    public function registration(Request $request) {
        $this->validate($request, [
                'name' => 'required|min:5|max:35',
                'email' => 'required|string|email|max:50|unique:users',
                'password' => 'required|min:6|max:50',
                'repass' => 'required|same:password',
            ],
            [
                'name.required' => 'Please enter your name!',
                'name.min' => 'Name must be at least 5 characters.',
                'name.max' => 'Name may not be greater than 35 characters.',
                'email.required' => 'Please enter your email address!',
                'email.email' => 'Invalid email address!',
            ]);
        $userReg = User::insertGetId(
            [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => bcrypt($_POST['password']),
                'role' => $_POST['role'],
                'photo' => 'defaultavatar.jpg',
                'created_at' => Carbon::now('Asia/Dhaka')->toDateTimeString()
            ]
        );

        if($request->hasFile('pic')){
            $image=$request->file('pic');
            $imageName= $userReg.".".$image->getClientOriginalExtension();
            Image::make($image)->resize(100,100)->save(base_path('public/uploads/avatar/'.$imageName));

            User::where('id', $userReg)->update([
                'photo' => $imageName
            ]);
        if ($userReg) {
            Session::flash('success', 'value');
            return redirect('/admin/user');
        } else {
            Session::flash('error', 'value');
            return redirect('/admin/user');
        }
    }
    }
}
