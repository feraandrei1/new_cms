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
            /></a>

            <div class="card-body">
              <h2 class="card-title">{{$post->title}}</h2>
              <p class="card-text">{{Str::limit($post->body, '250', '...')}}
              </p>
              <a class="btn btn-primary" href="{{route('post', $post->id)}}">Read more →</a>
            </div>
            <div class="card-footer text-muted">Posted on {{$post->created_at->diffForHumans()}}
            </div>
          </div>

          @endforeach

          <div class="col-lg-8" style="padding: 0; margin-top: 3rem; margin-bottom: 3rem;">
                  {{$posts->render()}}
          </div>

        </div>

@endsection

</x-master>