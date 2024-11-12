<x-layout-dashboard>
    <div class="flex flex-col min-h-screen md:flex-row">
        <x-sidebar-dashboard></x-sidebar-dashboard>

        <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
            <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
                <article class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                    <header class="mb-4 lg:mb-6 not-format">
                        <a href="/dashboard/posts" class="font-medium text-sm text-blue-600"><i class="bi bi-arrow-left-square-fill"></i> Back</a>
                        <a href="" class="text-yellow-500 hover:text-yellow-700 flex items-center">
                            <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full text-xs font-semibold">
                                Edit <i class="fa-regular fa-pen-to-square"></i>
                            </span>
                        </a>
                        <form action="" method="" class="inline" id="">
                            <button type="" class="text-red-500 hover:text-red-700 flex items-center">
                                <span class="bg-red-100 text-red-700 px-2 py-1 rounded-full text-xs font-semibold mt-2">
                                    Delete <i class="bi bi-trash3"></i></i>
                                </span>
                            </button>
                        </form>
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
                    <p>{{ $post->body }}</p>
                </article>
            </div>
        </main>

    </div>
</x-layout-dashboard>

<!-- <script>
    let deleteFormId;

    function showDeleteModal(postId) {
        deleteFormId = postId;
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function hideDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }

    document.getElementById('confirmDeleteButton').addEventListener('click', function() {
        if (deleteFormId) {
            document.getElementById(`deleteForm${deleteFormId}`).submit();
        }
    });
</script> -->