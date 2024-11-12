<x-layout-dashboard>
    <div class="flex flex-col min-h-screen md:flex-row">
        <!-- Sidebar -->
        <x-sidebar-dashboard></x-sidebar-dashboard>

        <!-- Konten Utama -->
        <main class="flex-1 p-6">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-semibold">My Post</h1>
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
                                <a href="/dashboard/posts/{{ $post->slug }}"><i class="fa-regular fa-eye"></i></a>
                                <a href=""><i class="fa-regular fa-pen-to-square"></i></a>
                                <a href=""><i class="bi bi-trash3"></i></a>
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