<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
 
class PostController extends Model
{

    public function index(){

        // ASTA ERA SA ARATE TOATE POSTARILE FARA PAGINATION
        // $posts = Post::all();

        // ASTA E SA ARATE CU PAGINATION CATE 5 PE PAGINA
        $posts = Post::paginate(5);

        return view('admin.posts.index', ['posts' => $posts]);

    }

    //
    //
    //

    public function show(Post $post){

        return view('blog-post', ['post' => $post]);

    }

    //
    //
    //

    public function create(){

        return view('admin.posts.create');

    }

    //
    //
    //

    public function store(){

        $inputs = request()->validate([
            'title'=>'required|min:8|max:255',
            'post_image'=>'file',
            'category'=>'required',
            'body'=>'required'
        ]);

        if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
        }

        auth()->user()->posts()->create($inputs);

        Session::flash('message2', 'Post has been created');

        return redirect()->route('post.index');

    }

    //
    //
    //

    public function edit_post(Post $post){

        return view('admin.posts.edit_post', ['post'=>$post]);

    }

    public function update_post(Post $post){

        $inputs = request()->validate([
            'title'=>'required|min:8|max:255',
            'post_image'=>'file',
            'category'=>'required',
            'body'=>'required'
        ]);

        if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
            $post->post_image = $inputs['post_image'];
        }

        $post->title = $inputs['title'];
        $post->category = $inputs['category'];
        $post->body = $inputs['body'];

        auth()->user()->posts()->save($post);

        Session::flash('message3', 'Post has been updated');

        return back();

    }

    //
    //
    //

    public function destroy_post(Post $post){

        $post->delete();

        Session::flash('message', 'Post has been deleted');

        return back();

    }

}