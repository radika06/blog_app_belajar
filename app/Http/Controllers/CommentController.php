<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {

        $posts = DB::table('comment') 
            ->join ( 'posts' , 'comment.post_id', '=', 'posts.id')->latest('posts.created_at')
            ->paginate(5);
          
        return view('admin.posts.comment',compact('posts'));
    }
    public function edit(Post $post)
    {
        return view('admin.posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'name' => 'required',
            'comment' => 'required',
        ]);

        $post->update($request->all());

        return redirect()->route('posts.comment')
                        ->with('success','Post updated successfully');
    }
}
