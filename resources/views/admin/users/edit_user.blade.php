<?php
$role = DB::table('users')->select('role')->get();
$roles = DB::table('users')->select('role')->distinct()->pluck('role')->all();
?>

@if(auth()->user()->userHasRole2($role))

<x-admin.admin-master>

    @section('content')

        <h1 style="padding: 1rem;">Edit user</h1>

        <!-- ASTA ESTE DACA AI EDITAT UN USER -->
        @if(Session::has('message3'))
        <div class="container369" style="padding: 1rem; padding-top: 0; padding-left: 0.7rem; padding-bottom: 0;">
            <div class="alert alert-success">{{Session::get('message3')}}</div>
        </div>
        @endif

        <div class="col-sm-4">

        <form method="post" action="{{route('user.update_user', $user->id)}}" enctype="multipart/form-data" style="padding: 1rem;">

            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="username">Username</label>
                <input  type="text" 
                        name="username" 
                        class="form-control" 
                        id="username"
                        value="{{$user->username}}">
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input  type="text" 
                        name="name" 
                        class="form-control" 
                        id="name"
                        value="{{$user->name}}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input  type="email" 
                        name="email" 
                        class="form-control" 
                        id="email"
                        value="{{$user->email}}">
            </div>

            <div class="form-group" style="margin-bottom: 2rem;">
                <label for="roles">Roles</label>
                <select  type="roles" name="roles" class="form-control" id="roles">
                    @foreach($roles as $rol)
                        <option>{{$rol}}</option>
                    @endforeach
                </select required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>

        </div>

    @endsection

</x-admin.admin-master>

@else
<div class="container123456" style="height: 100%; display: flex; width: 100%; justify-content: center; align-items: center;">
<h1>Permission denied.</h1>
</div>
@endif