<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $users = DB::table('users')
            ->where('type','!=','admin')
            ->join('categories', 'users.category_id', '=', 'categories.id')            
            ->select('users.*', 'categories.name')
            ->get();
        return response()->json($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.user.create-user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
            'f_name' => 'required',
            'l_name' => 'required',
        ], [
            'email.unique' => 'Email นี้ได้ใช้ไปแล้ว',
            'email.required' => 'กรุณากรอก email',
            'password.required' => 'กรุณากรอก password',
            'password.min' => 'password ต้องมากกว่า 8 ตำแหน่ง',
            'f_name.required' => 'กรุณากรอกชื่อจริง',
            'l_name.required' => 'กรุณากรอกนามสกุล',
        ]);

        User::create([            
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'category_id' => $request->category_id,
        ]);
        return response()->json('ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::find($id);
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'f_name' => 'required',
            'l_name' => 'required',
        ], [
            'f_name.required' => 'กรุณากรอกชื่อจริง',
            'l_name.required' => 'กรุณากรอกนามสกุล',
        ]);
        $data = User::find($id)->update([
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'email' => $request->email,            
            'category_id' => $request->category_id,
        ]);
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = User::find($id)->delete();
        return response()->json($del);
    }
}
