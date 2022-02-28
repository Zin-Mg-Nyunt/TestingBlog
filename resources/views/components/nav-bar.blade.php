<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Creative Coder</a>
        <div class="d-flex">
            <a href="#blogs" class="nav-link">Blogs</a>
            @auth
                <a href="#" class="nav-link">Welcome {{ auth()->user()->name }}</a>
                <div class="dropdown">
                    <button 
                    class="btn" 
                    type="button" 
                    id="dropdownMenuButton1" 
                    data-bs-toggle="dropdown" 
                    aria-expanded="false"
                    >
                        <img 
                        src="{{ auth()->user()->avatar }}" 
                        width="35" 
                        height="35" 
                        class="rounded-circle"
                        >
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li>
                        <form action="/logout" method="POST">
                            @csrf
                            <button 
                            type="submit" 
                            class="nav-link btn btn-link"
                            >
                                logout
                            </button>
                        </form>
                    </li>
                    </ul>
                </div>
            @else
                <a href="/register" class="nav-link">Register</a>
                <a href="/login" class="nav-link">Login</a>
            @endauth
        </div>
    </div>
</nav>