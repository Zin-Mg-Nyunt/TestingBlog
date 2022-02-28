<form action="/" class="my-3">
    <div class="input-group mb-3">
      @if (request('category'))
        <input
        type="hidden"
        name="category"
        value="{{ request('category') }}"
        />
      @endif
      @if (request('author'))
        <input
        type="hidden"
        name="author"
        value="{{ request('author') }}"
      />
      @endif
      <input
        type="text"
        name="search"
        autocomplete="false"
        class="form-control"
        placeholder="Search Blogs..."
        value="{{ request('search') }}"
      />
      <button
        class="input-group-text bg-primary text-light"
        id="basic-addon2"
        type="submit"
      >
        Search
      </button>
    </div>
  </form>