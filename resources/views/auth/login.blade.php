<x-layout>
    <div class="container">
        <div class="col-md-4 mx-auto">
            <h3 class="text-primary text-center my-2">Login Form</h3>
            <div class="card p-4 my-3 shadow-sm">
                <form method="POST" action="/login">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input
                            required 
                            type="email" 
                            name="email" 
                            class="form-control" 
                            id="exampleInputEmail1" 
                            aria-describedby="emailHelp"
                            value="{{ old('email') }}"
                        >
                        <x-error name=email />
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input
                            required 
                            type="password" 
                            name="password" 
                            class="form-control" 
                            id="exampleInputPassword1"
                        >
                        <x-error name=password />
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>