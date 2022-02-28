<div class="container">
  <div class="row">
    <div class="col-md-6 mx-auto text-center">
      <img
        src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
        class="card-img-top"
        alt="..."
      />
      <h3 class="my-3">{{ $blog->title }}</h3>
      <p class="fs-6 text-secondary">
        Author - <a 
          class="text-decoration-none" 
          href="/?author={{ $blog->author->username }}{{ request('search') ? '&search='.request('search') : '' }}{{ request('category') ? '&category='.request('category') : '' }}
          ">{{ $blog->author->name }}</a>
          <div>
            <a href="/?category={{ $blog->category->slug }}"><span class="badge bg-primary">{{ $blog->category->name }}</span></a>
          </div>
          <span class="text-secondary">{{ $blog->created_at->diffforHumans() }}</span>
          <form 
          action="/blogs/{{ $blog->slug }}/subscription"
          method="POST">
          @csrf
          @auth
            @if (auth()->user()->isSubscribe($blog))
              <button type="submit" class="btn btn-danger">Unsubscribe</button>
            @else
              <button type="submit" class="btn btn-warning">Subscribe</button>
            @endif
          @endauth
          </form>
      </p>
      <p class="lh-md">
        {{ $blog->body }}
      </p>
    </div>
  </div>
  <section class="container">
    <div class="col-md-8 mx-auto">
      @auth
        <x-comment-form :blog="$blog"/>
      @else
        <p class="text-center">Please <a href="/login">login</a> or <a href="/register">Register</a> to comment.</p>
      @endauth
    </div>
  </section>
  @if ($blog->comments->count())
    <x-comments :comments="$blog->comments()->latest()->paginate(3)"/>
  @endif
</div>