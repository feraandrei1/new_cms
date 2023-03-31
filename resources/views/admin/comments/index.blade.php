<?php 
$role = DB::table('users')->select('role')->get();
$comments = DB::table('comments')->get();
?>

@if(auth()->user()->userHasRole2($role))

<x-admin.admin-master>

    @section('content')

    @if(count($comments) > 0)

        <h1 style="padding: 1rem;">Comments</h1>

        <!-- ASTA ESTE DACA AI DAT DELETE LA comment -->
        @if(Session::has('comment_deleted'))
        <div class="container369" style="padding: 1rem; padding-top: 0; padding-left: 0.7rem;">
            <div class="alert alert-danger">{{Session::get('comment_deleted')}}</div>
        </div>
        @endif

    <div class="col-sm-12">
      <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">

          <thead>
            <tr>
                <th style="text-align: center;">Comment Id</th>
                <th style="text-align: center;">Author</th>
                <th style="text-align: center;">Body</th>
                <th style="text-align: center;">Post Id</th>
                <th style="text-align: center;">Post</th>
                <th style="text-align: center;">Delete</th>
            </tr>
          </thead>

          <tbody>
            @foreach($comments as $comment)
                <tr>

                    <td style="text-align: center;">{{$comment->id}}</td>

                    <td style="text-align: center;">{{$comment->author}}</td>

                    <td style="text-align: center;">{{$comment->body}}</td>

                    <td style="text-align: center;">{{$comment->post_id}}</td>

                    <td style="text-align: center;"><a href="{{route('post.edit_post', $comment->post_id)}}">View Post</a></td>

                    <td style="display: flex; justify-content: center;">
                      <form method="post" action="{{route('comments.delete', $comment->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                    </td>

                </tr>
            @endforeach
            </tbody>

      </table>
    </div>

    @else

    <h1 style="padding: 1rem;">No comments</h1>

    @endif

    @endsection

</x-admin.admin-master>

@else
<div class="container123456" style="height: 100%; display: flex; width: 100%; justify-content: center; align-items: center;">
<h1>Permission denied.</h1>
</div>
@endif