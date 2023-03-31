<?php
$role = DB::table('users')->select('role')->get();
?>

@if(auth()->user()->userHasRole2($role))

<x-admin.admin-master>

    @section('content')

        <h1 style="padding: 1rem;">Create user</h1>

        <div class="col-sm-4">

        <form method="post" action="{{route('user.store')}}" enctype="multipart/form-data" style="padding: 1rem;">

            @csrf

            <div class="form-group">
                <label for="username">Username</label>
                <input  type="text" 
                        name="username" 
                        class="form-control" 
                        id="username">
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input  type="text" 
                        name="name" 
                        class="form-control" 
                        id="name">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input  type="text" 
                        name="email" 
                        class="form-control" 
                        id="email">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input  type="text" 
                        name="password" 
                        class="form-control" 
                        id="password">
            </div>

            <div class="form-group">
                <label for="confirm_password">Confirm password</label>
                <input  type="text" 
                        name="confirm_password" 
                        class="form-control" 
                        id="confirm_password">
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