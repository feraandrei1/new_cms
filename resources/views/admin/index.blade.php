<?php $role = DB::table('users')->select('role')->get(); ?>

@if(auth()->user()->userHasRole2($role))

<x-admin.admin-master>

    @section('content')

        <h1 style="padding: 1rem;">Dashboard</h1>

        <canvas id="myChart" style="max-width:100%; max-height: 600px;"></canvas>

    @endsection

</x-admin.admin-master>

@else
<div class="container123456" style="height: 100%; display: flex; width: 100%; justify-content: center; align-items: center;">
<h1>Permission denied.</h1>
</div>
@endif