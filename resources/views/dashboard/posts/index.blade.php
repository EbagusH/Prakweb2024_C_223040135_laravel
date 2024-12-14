<x-layout-dashboard>
    <div class="flex flex-col min-h-screen md:flex-row">
        <!-- Sidebar -->
        <x-sidebar-dashboard></x-sidebar-dashboard>

        <!-- Konten Utama -->
        <main class="flex-1 p-6">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-semibold">My Post</h1>
            </div>

            <div class="flex justify-center">
                @if (session()->has('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded flex items-center mb-4" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span>{{ session('success') }}</span>
                    <button type="button" class="text-green-700 font-bold ml-2" onclick="this.parentElement.style.display='none';">&times;</button>
                </div>
                @endif
            </div>

            <div class="flex justify-start mb-4 my-3">
                <a href="/dashboard/posts/create"
                    class="bg-blue-100 text-blue-600 hover:bg-blue-200 hover:text-blue-800 font-semibold px-3 py-1 rounded flex items-center space-x-2 transition-colors duration-200">
                    <span>Create new post</span>
                </a>
            </div>

            <div class="hidden md:block overflow-x-auto bg-white rounded shadow mt-4">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium font-bold uppercase tracking-wider">#</th>
                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium font-bold uppercase tracking-wider">Title</th>
                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium font-bold uppercase tracking-wider">Category</th>
                            <th scope="col" class="px-4 py-2 text-left text-xs font-medium font-bold uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($posts as $post)

                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900">{{ $post->title }}</td>
                            <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900">{{ $post->category->name }}</td>
                            <td>
                                <!-- View -->
                                <a href="/dashboard/posts/{{ $post->slug }}" class="text-blue-500 hover:text-blue-700">
                                    <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded-full text-xs font-semibold">
                                        <i class="fa-regular fa-eye"></i>
                                    </span>
                                </a>

                                <!-- Edit -->
                                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="text-yellow-500 hover:text-yellow-700">
                                    <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full text-xs font-semibold">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </span>
                                </a>

                                <!-- Delete -->
                                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" onclick="return confirm('Are you sure?')" class=" text-red-500 hover:text-red-700">
                                        <span class="bg-red-100 text-red-700 px-2 py-1 rounded-full text-xs font-semibold"><i class="fa-regular fa-circle-xmark"></i>
                                        </span>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>

        </main>
    </div>

    <!-- JavaScript untuk Toggle Sidebar -->
    <script>
        const toggleButton = document.getElementById('toggleButton');
        const sidebar = document.getElementById('sidebar');

        toggleButton.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });
    </script>
</x-layout-dashboard>