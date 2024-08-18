<div>
    <!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->
    
    @if ($posts->count())
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach ($posts as $post)
            <div>
                <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user]) }}">
                    <img src="{{ asset('uploads') . '/' . $post->image }}"
                        alt="Post image from: {{ $post->title }}">
                </a>
            </div>
        @endforeach
    </div>
    <div class="my-10">
        {{ $posts->links('pagination::tailwind') }}
    </div>
    @else
        <p class="text-center">Nothing yet :|</p>
    @endif

</div>