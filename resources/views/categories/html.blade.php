<?php 
use App\Models\Post;
$posts = Post::where('category', 'HTML')->get();
?>

<x-master>

@section('content')

        <div class="col-lg-8">

          @foreach($posts as $post)

          <!-- Post -->
          <div class="card mb-4">
            <a href="{{route('post', $post->id)}}"
              ><img
                class="card-img-top"
                src="{{$post->post_image}}"
                alt="..."
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

          @endforeach

          <!-- Pagination -->
          <!-- <nav aria-label="Pagination">
            <hr class="my-0" />
            <ul class="pagination justify-content-center my-4">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true"
                  >Newer</a
                >
              </li>
              <li class="page-item active" aria-current="page">
                <a class="page-link" href="#!">1</a>
              </li>
              <li class="page-item"><a class="page-link" href="#!">2</a></li>
              <li class="page-item"><a class="page-link" href="#!">3</a></li>
              <li class="page-item disabled">
                <a class="page-link" href="#!">...</a>
              </li>
              <li class="page-item"><a class="page-link" href="#!">15</a></li>
              <li class="page-item">
                <a class="page-link" href="#!">Older</a>
              </li>
            </ul>
          </nav> -->

        </div>

@endsection

</x-master>