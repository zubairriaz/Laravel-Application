<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostRequest;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $post = Post::all();
        return view('admin.posts.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
       $category = Category::pluck('name','id')->all();

        return view('admin.posts.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

        $input = $request->all();
        $user = Auth::user();

        if ($request->hasFile('file')) {
            $name = time() . $request->file('file')->getClientOriginalName();
            $request->file('file')->move('images', $name);
            $photo = Photo::create(['file' => $name]);
            $input['photo_id'] = $photo->id;

        }
        $user->post()->create($input);
        return redirect('admin/posts');


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
        $category = Category::pluck('name','id')->all();
        $post = Post::find($id);
        return view('admin.posts.edit',compact('category','post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {

        $input = $request->all();
       if ($request->hasFile('file')){
          $name = time().$request->file('file')->getClientOriginalName();
           $request->file('file')->move('images',$name);
           $photo = Photo::create(['file'=>$name]);
           $input['photo_id'] = $photo->id;

       }
       $input['user_id'] = Auth::user()->id;

        Post::find($id)->update($input);
        return redirect('/admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $post = Post::find($id);
        unlink(public_path().$post->photo->file);
        $post->delete();
        return redirect('/admin/posts');
    }
}
