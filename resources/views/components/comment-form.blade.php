<x-card-wrapper>
    <form method="POST" action="/blogs/{{ $blog->slug }}/comment">
        @csrf
        <div class="mb-3">
            <textarea 
            required
            name="comment" 
            class="border border-0 form-control" 
            cols="67" 
            rows="5" 
            placeholder="comment hear..." ></textarea>
            <x-error name=comment/>
            </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Send</button>
        </div>
    </form>
</x-card-wrapper>