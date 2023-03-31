<?php 
$author = auth()->user();
$post_id = $post->id;
$comments = DB::table('comments')->where('post_id', $post_id)->get();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Blog Home - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </head>
  <body>

    <!-- Navbar-->
    <x-navbar></x-navbar>

    <!-- Main Container -->
    <div class="container" style="padding-top: 3rem;">
      <div class="row">

        <!-- FULL CONTENT OF THE PAGE -->
        <div class="col-lg-8">

        <!-- Post -->
          <div class="card mb-4">

            <a href="{{route('post', $post->id)}}"
              ><img
                class="card-img-top"
                src="{{$post->post_image}}"
            /></a>

            <div class="card-body">
              <!-- <div class="small text-muted">January 1, 2022</div> -->
              <h2 class="card-title">{{$post->title}}</h2>
              <p class="card-text">{{Str::limit($post->body, '250', '...')}}
              </p>
              <a class="btn btn-primary" href="{{route('post', $post->id)}}">Read more →</a>
            </div>
            <div class="card-footer text-muted">Posted on {{$post->created_at->diffForHumans()}}
            </div>
          </div>

          <hr>

        <!-- ASTA ESTE DACA AI EDITAT UN USER -->
        @if(Session::has('comment_message'))
        <div class="container369" style="#">
            <div class="alert alert-success">{{Session::get('comment_message')}}</div>
        </div>
        @endif

          <!-- Comments Form -->
          <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
                <form method="post" action="{{route('comments.store')}}">
                    @csrf
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                    <input type="hidden" name="author" value="{{$author->name}}">
                    <input type="hidden" name="email" value="{{$author->email}}">
                    <div class="form-group">
                      <textarea class="form-control"  name="body" id="body" cols="30" rows="10" required minlength="8" maxlength="255"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
          </div>

          @if(count($comments) > 0)
          @foreach($comments as $comment)
          <!-- Comment Template -->
          <div class="media mb-4">
            <div class="media-body">
              <h5 class="mt-0">{{$comment->author}}</h5>
              {{$comment->body}}
            </div>
          </div>
          @endforeach
          @endif

        </div>

        <!-- Sidebar -->
        <x-search></x-search>
        <x-categories></x-categories>
        <x-widgets></x-widgets>

      </div>
    </div>

    <!-- Footer-->
    <x-footer></x-footer>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
  </body>
</html>