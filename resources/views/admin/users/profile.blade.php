<?php $role = DB::table('users')->select('role')->get(); ?>

@if(auth()->user()->userHasRole2($role))

<x-admin.admin-master>

    @section('content')

        <h1 style="padding: 1rem;">User profile for : {{$user->name}} 

        @if(auth()->user()->userHasRole2($role))
        (Admin)
        @endif

        </h1>

        <div class="row">
            <div class="col-sm-6">

            <form method="post" action="{{route('user.profile.update', $user)}}" enctype="multipart/form-data" style="padding: 1rem;">

            @csrf
            @method('PUT')

            <!-- <div class="mb-4">
            <img class="img-profile rounded-circle" src="{{$user->avatar}}" height="64" width="64">
            </div> -->

            <!-- <div class="form-group">
                <input  type="file" 
                        class="form-control-file"
                        name="avatar">
            </div> -->

            <div class="form-group">
                <label for="username">Username</label>
                <input  type="text" 
                        name="username" 
                        class="form-control @error('username') is-invalid @enderror" 
                        id="username" 
                        value="{{$user->username}}">
                @error('username')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input  type="text" 
                        name="name" 
                        class="form-control @error('name') is-invalid @enderror"
                        id="name" 
                        value="{{$user->name}}">
                @error('name')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input  type="email" 
                        name="email" 
                        class="form-control @error('email') is-invalid @enderror"
                        id="email" 
                        value="{{$user->email}}">
                @error('email')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

            </form>

            </div>
        </div>

        <!-- tabel -->

    @endsection

</x-admin.admin-master>

@else
<div class="container123456" style="height: 100%; display: flex; width: 100%; justify-content: center; align-items: center;">
<h1>Permission denied.</h1>
</div>
@endif