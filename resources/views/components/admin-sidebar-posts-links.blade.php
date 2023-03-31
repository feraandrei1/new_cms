      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-folder"></i>
          <span>Posts</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Posts :</h6>
            <a class="collapse-item" href="{{route('post.create')}}">Create a post</a>
            <a class="collapse-item" href="{{route('comments.index')}}">Comments</a>
            <a class="collapse-item" href="{{route('post.index')}}">All Posts</a>
          </div>
        </div>
      </li>

      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-user"></i>
          <span>Users</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Users :</h6>
            <a class="collapse-item" href="{{route('user.create')}}">Create a user</a>

            <a class="collapse-item" href="{{route('user.index')}}">View All Users</a>
          </div>
        </div>
      </li>

      <hr class="sidebar-divider d-none d-md-block">