<?php

namespace App\Http\Controllers;

use App\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function login(){
        return view('pages.login');
    }
    public function register(){
        return view('pages.register');
    }

    public function checkEmail(Request $request){
        if ($request->ajax()){
            $email = User::where('email',$request->email)->first();
            if ($email != null){
                echo("Email đã tồn tại");
            }
        }
    }

    public function postRegister(Request $request){
        $this->validate($request,[
            'email' => 'required|unique:users,email|email',
            'ten' => 'required',
            'address' => 'required|min:10',
            'phone_number' => 'required|min:10|max:10',
            'password' => 'required|min:6',
            'passwordAgain' => 'required|same:password'

        ],[
            'email.required' => 'Bạn chưa nhập email',
            'email.unique' => 'Email đã tồn tại',
            'ten.required' => 'Bạn chưa nhập tên',
            'address.required' => 'Bạn chưa nhập địa chỉ',
            'address.min' => 'Địa chỉ phải có tên đường, quận, thành phố',
            'phone_number.required' => 'Bạn chưa nhập số điện thoại',
            'phone_number.min' => 'Số điện thoại không phù hợp',
            'phone_number.max' => 'Số điện thoại không phù hợp',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu phải có tối thiểu 6 ký tự',
            'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
            'passwordAgain.same' => 'Mật khẩu nhập lại không khớp'
        ]);

        $user = new User();
        $user->email = $request->email;
        $user->name = $request->ten;
        $user->phone = $request->phone_number;
        $user->address = $request->address;
        $user->password = bcrypt($request->password);
        $user->created_at = new DateTime();
        $user->level = 0;
        $user->save();
        return redirect()->route('register')->with('thongbao','Bạn đã đăng ký thành công');

    }

    public function postLogin(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'password' =>'required'
        ],[
            'email.required' => 'Bạn chưa nhập email',
            'password.required' => 'Bạn chưa nhập mật khẩu'
        ]);

        $credentials = $request->only('email','password');
        if (Auth::attempt($credentials)){
            return redirect()->route('trangchu');
        }else{
            return redirect()->back()->with('thongbao','Sai tên đăng nhập hoặc mật khẩu');
        }
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('trangchu');
    }


    public function getList(){
        $users = User::all();
        return view('admin.user.list',compact('users'));
    }

    public function getDelete($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('msg','Bạn đã xóa thành công.');

    }

    public function getEdit($id){
        $user = User::find($id);
        return view('admin.user.edit',compact('user'));
    }

    public function postEdit(Request $request,$id){
        $this->validate($request,[
            // 'email' => 'required|unique:users,email|email',
            'ten' => 'required',
            'address' => 'required|min:10',
            'phone_number' => 'required|min:10|max:10',


        ],[
            // 'email.required' => 'Bạn chưa nhập email',
            // 'email.unique' => 'Email đã tồn tại',
            'ten.required' => 'Bạn chưa nhập tên',
            'address.required' => 'Bạn chưa nhập địa chỉ',
            'address.min' => 'Địa chỉ phải có tên đường, quận, thành phố',
            'phone_number.required' => 'Bạn chưa nhập số điện thoại',
            'phone_number.min' => 'Số điện thoại không phù hợp',
            'phone_number.max' => 'Số điện thoại không phù hợp',

        ]);


        $user = User::find($id);
        $user->name = $request->ten;
        $user->phone = $request->phone_number;
        $user->address = $request->address;
        $user->level = $request->level;
        $user->save();

        return redirect()->back()->with('msg','Bạn đã sửa thành công');

    }

}
