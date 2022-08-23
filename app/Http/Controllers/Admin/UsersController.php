<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Auth;
use App\Models\DistrictModel;
use App\Models\ProvinceModel;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('level');
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone'     => 'numeric|min:111111111|max:99999999999',
            'address'   => 'min:6',
            'province_id'     => 'required',
            'district_id'   => 'required',
        ];

        $messages = [ 
            'name.required'=> 'Tên không được để trống.',
            'email.required'=> 'Email không được để trống.',
            'email.unique' => 'Email đã tồn tại',
            'district_id.required'=> 'Quận/huyện không được để trống.',
            'province_id.required'=> 'Tỉnh/thành phố không được để trống.',
            'address.min' =>'Địa chỉ phải nhập trên 6 kí tự.',
            'phone.numeric' => 'Số điện thoại phải nhập số '
        ];

        $validator = \Validator::make($request->all(), $rules, $messages);

        $request->flashOnly(['name', 'email', 'phone', 'address']);
        if (!$validator->fails())
        {
                User::create([
                    'name'          => $request->name,
                    'email'         => $request->email,
                    'phone'         => $request->phone,
                    'address'       => $request->address,
                    'password'      => bcrypt(123456),
                    'level'         => 0,
                    'province_id'   => $request->province_id,
                    'district_id'   => $request->district_id,
                ]);
                session()->flash('save', 'Thêm khách hàng thành công!');
                
                return Redirect::to('admin/users/list');
        }
        else{
            // dd($validator);
            return back()->withErrors($validator);

        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('level', 0)->orderBy('id', 'DESC')->paginate(12); 
        $admin = User::where('level', 1)->orwhere('level', 2)->orderBy('id', 'DESC')->paginate(12); 
        return view('BE.users.list', compact('users', 'admin'));
    }


         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view_create()
    {
        $states = DistrictModel::all();
        $countries = ProvinceModel::all();
        //dump($countries);

        return view('BE.users.create', compact('countries', 'states'));
    }
}
