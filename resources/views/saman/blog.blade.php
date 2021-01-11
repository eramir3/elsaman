<h1>All Posts</h1>

@foreach($posts as $post)

    <div>
        <img src="{{$post->post_image}}" alt="">
        <h2>{{ $post->title }}</h2>
        <p>{{ Str::limit($post->body, '50', '...') }}</p>
        <div>
            Posted on {{ $post->created_at->diffForHumans() }}
        </div>
        <a href="{{route('saman.blog.post.show', $post->id)}}">Read More</a>
    </div>
    <hr>

@endforeach