<h1>{{$post->title}}</h1>

<p>
by <a href="#">{{$post->user->name}}</a>
</p>
<p>Posted on {{$post->created_at->diffForHumans()}}</p>
<img src="{{$post->post_image}}" alt="">
<p>{{$post->body}}</p>

