<?php 
$role = DB::table('users')->select('role')->get(); 
$categories = DB::table('posts')->select('category')->distinct()->pluck('category')->all();
?>

@if(auth()->user()->userHasRole2($role))

<x-admin.admin-master>

    @section('content')

        <h1 style="padding: 1rem;">Create post</h1>

        <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data" style="padding: 1rem;">

            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input  type="text" 
                        name="title" 
                        class="form-control" 
                        id="title" 
                        aria-describedby="" 
                        placeholder="Enter title"
                        required
                        minlength="8"
                        maxlength="255">
            </div>

            <div class="form-group" style="margin-bottom: 2rem;">
                <label for="file">File</label>
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
                            rows="10"
                            required
                            minlength="8"
                            maxlength="255"></textarea>
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