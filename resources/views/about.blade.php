<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="w-full text-center bg-white dark:bg-gray-800 dark:border-gray-700">
                        <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">Blog, blog, and keep blogging!</h5>
                        <p class="mb-5 text-base text-gray-500 sm:text-lg dark:text-gray-400">Hey folks! So, let me spill the beans on the awesome features waiting for you here. First up, we've got the classic login and register gig - your passport to a personalized experience. Once you're in, brace yourself for the CRUD magic. What's CRUD, you ask? It's the superhero trio of Create, Read, Update, and Delete. Want to throw a new blog into the mix? Easy peasy. Feel like tweaking a post or tossing one out? We've got you covered. It's like your blog, your rules. We've kept it fuss-free so you can focus on what matters - your thoughts, your stories, and maybe a bit of digital mischief. So, buckle up, hit those buttons, and let the blogging adventure begin!</p>
                        <div class="items-center justify-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4 rtl:space-x-reverse">
                            <a href="{{ route('posts.index') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Blogging now
                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
