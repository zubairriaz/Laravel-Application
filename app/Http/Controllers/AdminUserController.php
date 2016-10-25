<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;

use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view ('admin.users.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::pluck('name','id')->all();

        return view('admin.users.create',compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {


        $user['name'] = $request->name;
        $user['password']=bcrypt($request->password);
        $user['email'] = $request->email;
        $user['is_active'] = $request->status;
        $user['role_id'] = $request->role;
           if ($request->hasFile('file')){
               $photoName = time().$request->file('file')->getClientOriginalName();
               $request->file('file')->move('images',$photoName);
              $photo = Photo::create(['file'=>$photoName]);
           }
           $id= $photo->id;

          $photo_create = Photo::find($id);
          $photo_create->user()->create($user);
        Session::flash('message','User has been created');
        return redirect('/admin/users');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::pluck('name','id')->all();
        $user = User::find($id);
        return view('admin.users.edit',compact('user','role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {

       $users = User::find($id);
        if ($request->hasFile('file')){
            $photo_id = $users->photo_id;
            $photoName = time().$request->file('file')->getClientOriginalName();
            $request->file('file')->move('images',$photoName);
            $photo = Photo::find($photo_id)->update(['file'=>$photoName]);
        }
        $user['name'] = $request->name;
        $user['password']=bcrypt($request->password);
        $user['email'] = $request->email;
        $user['is_active'] = $request->status;
        $user['role_id'] = $request->role;
        $user = User::find($id)->update($user);
        Session::flash('message','User has been updated');
        return redirect('admin/users');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        unlink(public_path().$user->photo->file);
        $user->photo()->delete();
        $user->delete();
        Session::flash('message','User has been deleted');
       return redirect('admin/users');
    }
}
