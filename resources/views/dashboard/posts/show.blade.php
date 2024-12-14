<x-layout-dashboard>
    <div class="flex flex-col min-h-screen md:flex-row">
        <x-sidebar-dashboard></x-sidebar-dashboard>

        <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
            <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
                <article class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                    <header class="mb-4 lg:mb-6 not-format">
                        <div class="flex flex-wrap items-center space-x-4 mt-4">
                            <!-- Back -->
                            <a href="/dashboard/posts" class="font-medium text-sm text-blue-600"><i class="bi bi-arrow-left-square-fill"></i> Back</a>

                            <!-- Edit -->
                            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="text-yellow-500 hover:text-yellow-700 flex items-center">
                                <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full text-xs font-semibold">
                                    Edit <i class="fa-regular fa-pen-to-square"></i>
                                </span>
                            </a>

                            <!-- Delete -->
                            <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" onclick="return confirm('Are you sure?')" class="text-red-500 hover:text-red-700 flex items-center">
                                    <span class="bg-red-100 text-red-700 px-2 py-1 rounded-full text-xs font-semibold">
                                        Delete <i class="bi bi-trash3"></i></i>
                                    </span>
                                </button>
                            </form>

                            <div class="h-80 overflow-hidden mt-3">
                                @if ($post->image)
                                <img src="{{ asset('/storage/'. $post->image) }}" alt="{{ $post->category->name }}" class="object-cover object-center w-full h-full">
                                @else
                                <img src="https://source.unsplash.com/1200x400?{{ urlencode($post->category->name) }}" alt="{{ $post->category->name }}" class="object-cover object-center w-full h-full">
                                @endif
                            </div>

                        </div>
                        <address class="flex items-center my-6 not-italic">
                            <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                                <img class="mr-4 w-16 h-16 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="{{ $post->author->name }}">
                                <div>
                                    <a href="/posts?author={{ $post->author->username }}" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">{{ $post->author->name }}</a>
                                    <p class="text-base text-gray-500 dark:text-gray-400 mb-1">{{ $post->created_at->format('j F Y') }} | {{ $post->created_at->diffForHumans() }}</p>
                                    <a href="/posts?category={{ $post->category->slug }}">
                                        <span class="bg-{{ $post->category->color }}-100 text-gray-900 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                            <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path>
                                            </svg>
                                            {{ $post->category->name }}
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </address>
                        <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{ $post->title }}</h1>
                    </header>
                    <p class="text-gray-700 ">{{ $post->body }}</p>
                </article>
            </div>
        </main>

    </div>
</x-layout-dashboard>