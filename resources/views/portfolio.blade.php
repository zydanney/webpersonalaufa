<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Portfolio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-2">
                        <div>
                            <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                                <div class="flex flex-col pb-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">NIK</dt>
                                    <dd class="text-lg font-semibold">123456789</dd>
                                </div>
                                <div class="flex flex-col py-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Name</dt>
                                    <dd class="text-lg font-semibold">Zidan Nih Bos Senggol Dong</dd>
                                </div>
                                <div class="flex flex-col pt-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Grade</dt>
                                    <dd class="text-lg font-semibold">6</dd>
                                </div>
                            </dl>
                        </div>
                        <div>
                            <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                                <div class="flex flex-col pb-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Faculty</dt>
                                    <dd class="text-lg font-semibold">Engineering</dd>
                                </div>
                                <div class="flex flex-col py-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Major</dt>
                                    <dd class="text-lg font-semibold">Informatics</dd>
                                </div>
                                <div class="flex flex-col pt-3">
                                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Class</dt>
                                    <dd class="text-lg font-semibold">1-A</dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                    <ol class="mt-6 space-y-4 text-gray-500 list-decimal list-inside dark:text-gray-400">
                        <li>
                        List item one
                        <ul class="ps-5 mt-2 space-y-1 list-disc list-inside">
                            <li>You might feel like you are being really "organized" o</li>
                            <li>Nested navigation in UIs is a bad idea too, keep things as flat as possible.</li>
                            <li>Nesting tons of folders in your source code is also not helpful.</li>
                        </ul>
                        </li>
                        <li>
                        List item two
                        <ul class="ps-5 mt-2 space-y-1 list-disc list-inside">
                            <li>I'm not sure if we'll bother styling more than two levels deep.</li>
                            <li>Two is already too much, three is guaranteed to be a bad idea.</li>
                            <li>If you nest four levels deep you belong in prison.</li>
                        </ul>
                        </li>
                        <li>
                        List item three
                        <ul class="ps-5 mt-2 space-y-1 list-disc list-inside">
                            <li>Again please don't nest lists if you want</li>
                            <li>Nobody wants to look at this.</li>
                            <li>I'm upset that we even have to bother styling this.</li>
                        </ul>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
