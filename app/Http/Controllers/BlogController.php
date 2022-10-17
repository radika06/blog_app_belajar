<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Post;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {

        $posts = DB::table('posts') 
            ->join ( 'users' , 'users.id', '=', 'posts.user_id')->latest('posts.created_at')
            ->paginate(2);
            // ->get();
        // $posts = Post::latest()->paginate(2);
        return view('blog.index',compact('posts'));
    }
        // $posts = Post::latest()->paginate(5);
        // $nama = "asimili";
        

            // foreach ($query as $row) {
            //     $nama = $row->name;
            // };
         
        
            // ->with('i', (request()->input('page', 1) - 1) * 5);
   

  
    public function show($id)
    {
        $post = $id;

        $posts = DB::table('posts')
                ->where('id', '=', $id)
                ->get();
        // echo var_dump($users);
        return view('blog.post.post',compact('posts'));
    }

   
    public function comment (Request $request)
        {
            $request->validate([

                'name' => 'required',
                'email' => 'required|unique:users',
                // 'comment' => 'required'
                // 'post_id' => 'required'

            ]);
        
            DB::table('comment')-> insert([
                'name' => $request->name,
                'email' => $request->email,
                'comment' => $request->comment,
                'post_id' => $request->post_id,
            ]);
        
            return redirect()->route('blog/'. $request->post_id)->with('success', 'Registrasi Berhasil. Silahkan L ogin!');

        }

        public function test($id)
        {
            $id;
            echo $id;
        }
}