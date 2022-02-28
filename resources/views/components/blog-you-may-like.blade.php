<section class="blogs_you_may_like">
    <div class="container">
      <h3 class="text-center my-4 fw-bold">Blogs You May Like</h3>
      <div class="row text-center">
          @foreach ($randomBlogs as $randomBlog)
          <x-blog-card :blog="$randomBlog"/>  
          @endforeach
      </div>
    </div>
  </section>