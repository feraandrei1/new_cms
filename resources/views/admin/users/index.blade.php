<?php $role = DB::table('users')->select('role')->get(); ?>

@if(auth()->user()->userHasRole2($role))

<x-admin.admin-master>

    @section('content')

      <h1 style="padding: 1rem;">Users</h1>

        <!-- ASTA ESTE DACA AI DAT DELETE LA USER -->
        @if(session('message11'))
        <div class="container369" style="padding: 1rem; padding-top: 0; padding-left: 0.7rem;">
            <div class="alert alert-danger">{{Session::get('message11')}}</div>
        </div>
        @endif

      <div class="col-sm-12">
      <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">

          <thead>
            <tr>
                <th style="text-align: center;">Id</th>
                <th style="text-align: center;">Username</th>
                <th style="text-align: center;">Name</th>
                <th style="text-align: center;">Email</th>
                <th style="text-align: center;">Role</th>
                <th style="text-align: center;">Registered At</th>
                <th style="text-align: center;">Updated At</th>
                <th style="text-align: center;">Delete</th>
            </tr>
          </thead>

          <tbody>
            @foreach($users as $user)
                <tr>

                    <td style="text-align: center;">{{$user->id}}</td>

                    <td style="text-align: center;">{{$user->username}}</td>

                    <td style="text-align: center;"><a href="{{route('user.edit_user', $user->id)}}">{{$user->name}}</a></td>

                    <td style="text-align: center;">{{$user->email}}</td>

                    <td style="text-align: center;">{{$user->role}}</td>

                    <td style="text-align: center;">{{$user->created_at->diffForHumans()}}</td>

                    <td style="text-align: center;">{{$user->updated_at->diffForHumans()}}</td>

                    <td style="display: flex; justify-content: center;">
                      <form method="post" action="{{route('user.destroy_user', $user->id)}}" enctype="multipart/form-data">
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