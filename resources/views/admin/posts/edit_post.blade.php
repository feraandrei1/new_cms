<?php 
$role = DB::table('users')->select('role')->get(); 
$categories = DB::table('posts')->select('category')->distinct()->pluck('category')->all();
?>

@if(auth()->user()->userHasRole2($role))

<x-admin.admin-master>

    @section('content')

        <h1 style="padding: 1rem;">Edit post</h1>

        <!-- ASTA ESTE DACA AI EDITAT UN POST -->
        @if(Session::has('message3'))
        <div class="container369" style="padding: 1rem; padding-top: 0; padding-left: 0.7rem; padding-bottom: 0;">
            <div class="alert alert-success">{{Session::get('message3')}}</div>
        </div>
        @endif

        <form method="post" action="{{route('post.update_post', $post->id)}}" enctype="multipart/form-data" style="padding: 1rem;">

            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="title">Title</label>
                <input  type="text" 
                        name="title" 
                        class="form-control" 
                        id="title" 
                        aria-describedby="" 
                        placeholder="Enter title"
                        value="{{$post->title}}">
            </div>

            <div class="form-group" style="margin-bottom: 2rem;">
                <img height="100" src="{{$post->post_image}}" alt="" style="padding-bottom: 1rem;">
                <input  type="file" 
                        name="post_image" 
                        class="form-control-file" 
                        id="post_image">
            </div>

            <div class="form-group" style="margin-bottom: 2rem;">
                <label for="category">Category</label>
                <select  type="category" name="category" class="form-control" id="category">
                    @foreach($categories as $category)
                        <option>{{$category}}</option>
                    @endforeach
                </select required>
            </div>

            <div class="form-group">
                <textarea   name="body" 
                            class="form-control" 
                            id="body" 
                            cols="30" 
                            rows="10">{{$post->body}}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>

    @endsection

</x-admin.admin-master>

@else
<div class="container123456" style="height: 100%; display: flex; width: 100%; justify-content: center; align-items: center;">
<h1>Permission denied.</h1>
</div>
@endif