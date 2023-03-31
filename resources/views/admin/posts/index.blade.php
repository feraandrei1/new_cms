<?php $role = DB::table('users')->select('role')->get(); ?>

@if(auth()->user()->userHasRole2($role))

<x-admin.admin-master>

    @section('content')

    <h1 style="padding: 1rem;">All posts</h1>

    <!-- ASTA ESTE DACA AI DAT DELETE LA POST -->
    @if(Session::has('message'))
      <div class="container369" style="padding: 1rem; padding-top: 0; padding-left: 0.7rem;">
        <div class="alert alert-danger">{{Session::get('message')}}</div>
      </div>
    @endif

    <!-- ASTA ESTE DACA AI CREAT UN POST NOU -->
    @if(Session::has('message2'))
    <div class="container369" style="padding: 1rem; padding-top: 0; padding-left: 0.7rem;">
        <div class="alert alert-success">{{Session::get('message2')}}</div>
    </div>
    @endif

    <div class="col-sm-12">
      <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">

          <thead>
            <tr>
                <th style="text-align: center;">Id</th>
                <th>Author</th>
                <th>Title</th>
                <th style="text-align: center;">Image</th>
                <th style="text-align: center;">Category</th>
                <th style="text-align: center;">Created At</th>
                <th style="text-align: center;">Updated At</th>
                <th>Delete</th>
            </tr>
          </thead>

          <tbody>
            @foreach($posts as $post)
                <tr>

                    <td style="text-align: center;">{{$post->id}}</td>

                    <td style="text-align: center;">{{$post->user->name}}</td>

                    <td><a href="{{route('post.edit_post', $post->id)}}">{{$post->title}}</a></td>

                    <td style="display: flex; justify-content: center;">
                    <img src="{{$post->post_image}}" height="50" alt="">
                    </td>

                    <td style="text-align: center;">{{$post->category}}</td>

                    <td style="text-align: center;">{{$post->created_at->diffForHumans()}}</td>

                    <td style="text-align: center;">{{$post->updated_at->diffForHumans()}}</td>

                    <td>
                      <form method="post" action="{{route('post.destroy_post', $post->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                    </td>

                </tr>
            @endforeach
            </tbody>

      </table>

      <div class="row" style="padding-left: 0.75rem;">
            {{$posts->render()}}
      </div>

    </div>

    @endsection

    <!--  -->
    <!--  -->
    <!--  -->

    @section('scripts')

    <script src="{{URL::to('/')}}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{URL::to('/')}}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="{{URL::to('/')}}/js/sb-admin-2.js"></script>
    <script src="{{URL::to('/')}}/js/demo/chart-bar-demo.js"></script>

    @endsection

</x-admin.admin-master>

@else
<div class="container123456" style="height: 100%; display: flex; width: 100%; justify-content: center; align-items: center;">
<h1>Permission denied.</h1>
</div>
@endif