<x-layout>
    <div class="container">
        <div class="col-md-8 mx-auto">
            <h3 class="text-primary text-center my-2">Create Blog</h3>
            <div class="card p-4 my-3 shadow-sm">
                <form 
                    method="POST" 
                    action="/admin/blogs/store"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <x-form.input name="title" required />
                    <x-form.input name="slug" required />
                    <x-form.input name="intro" required />
                    <x-form.textarea name="body"/>
                    <x-form.input name="thumbnail" type="file"/>
                    <x-form.input-wrapper>
                        <x-form.label name="category"/>
                        <select 
                            name="category_id" 
                            id="category"
                            class="form-control"
                            >
                            @foreach ($categories as $category)
                                <option 
                                    {{ $category->id==old('category_id') ? 'selected' : ''}}
                                    value="{{ $category->id }}"
                                >
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-error name="category" />
                    </x-form.input-wrapper>
                    <div class="d-flex justify-content-center">
                        <button 
                            type="submit" 
                            class="btn btn-primary"
                        >
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>