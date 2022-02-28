<div>
    <div class="dropdown">
        <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            {{ $currentCategory ? $currentCategory->name: "Filter by Category" }}
        </a>
    
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="/">all</a></li>
        @foreach ($categories as $category)
            <li>
                <a class="dropdown-item" href="/?category={{ $category->slug }}{{ request('author') ? '&author='.request('author') : '' }}{{ request('search') ? '&search='.request('search') : '' }}"
                >
                {{ $category->name }}
                </a>
            </li>
        @endforeach
        </ul>
    </div>
</div>