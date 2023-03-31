    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="{{route('home')}}">Laravel Project</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="justify-content: flex-end;">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

            <li class="nav-item"><a class="nav-link"></a></li>
            <li class="nav-item"><a class="nav-link"></a></li>
            <li class="nav-item"><a class="nav-link"></a></li>

            <?php $role = DB::table('users')->select('role')->get(); ?>

            @if(auth()->user()->userHasRole2($role))
            <li class="nav-item">
            <a class="nav-link active" href="{{route('admin.index')}}" style="color: #9e9e9e;">Admin</a>
            </li>

            <li class="nav-item"><a class="nav-link"></a></li>
            <li class="nav-item"><a class="nav-link"></a></li>
            <li class="nav-item"><a class="nav-link"></a></li>
            <li class="nav-item"><a class="nav-link"></a></li>
            <li class="nav-item"><a class="nav-link"></a></li>
            <li class="nav-item"><a class="nav-link"></a></li>

            <li class="nav-item"><a class="nav-link"></a></li>
            <li class="nav-item"><a class="nav-link"></a></li>
            <li class="nav-item"><a class="nav-link"></a></li>
            <li class="nav-item"><a class="nav-link"></a></li>
            <li class="nav-item"><a class="nav-link"></a></li>
            <li class="nav-item"><a class="nav-link"></a></li>
            @endif

            <li class="nav-item">
            <a class="nav-link active" href="/logout" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
            </form>
            </li>

          </ul>
        </div>
      </div>
    </nav>