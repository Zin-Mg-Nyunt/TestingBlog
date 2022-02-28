<section class="container text-center" id="blogs">
    <h1 class="display-5 fw-bold mb-4">Blogs</h1>
    <x-category-dropdown />
    <x-search-bar />
    <div class="row">
        @forelse ($blogs as $blog)
            <x-blog-card :blog="$blog"/>
        @empty
            <h6 class="text-center">No Blog Found</h6>
        @endforelse
        {{ $blogs->links() }}
    </div>
</section>