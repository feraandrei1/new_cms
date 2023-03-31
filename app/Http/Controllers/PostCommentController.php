<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\UserController;
use App\Models\User;

use Illuminate\Support\Facades\Session;
use App\Models\Comment;
use Auth;

class PostCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    $comments = Comment::all();

    return view('admin.comments.index', compact('comments'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function create(){

    //     return view('admin.comments.create');

    // }

    //
    //
    //

    //

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request){

        $user = Auth::user();
        $author = auth()->user();

        $data = [
                'post_id' => $request->post_id,
                'author' => $author,
                'email' => $user->email,
                'body' => $request->body
        ];

        Comment::create($request->all());

        $request->session()->flash('comment_message', 'Comment submitted.');

        return redirect()->back();

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    // }

    public function delete($id){

        Comment::findOrFail($id)->delete();

        Session::flash('comment_deleted', 'Comment has been deleted');

        return redirect('/admin/comments');

    }

}
