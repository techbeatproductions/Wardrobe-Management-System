<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Wardrobe Wizard
            </h2>
        </template>

        <div class="flex flex-col min-h-screen py-12">
            <main class="flex-grow mt-6 max-w-6xl mx-auto px-6 md:px-8 lg:px-10 xl:px-12">
                <div class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2">
                    <!-- Feature Card -->
                    <a href="#" 
                        class="flex flex-col items-start gap-4 rounded-lg bg-white p-6 shadow-lg ring-1 ring-gray-200 transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#4F46E5] dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700"
                    >
                        <div class="relative w-full overflow-hidden rounded-[10px]">
                            <img
                                src="https://images.pexels.com/photos/2229490/pexels-photo-2229490.jpeg?auto=compress&cs=tinysrgb&w=600"
                                alt="Organize Your Wardrobe"
                                class="w-full h-auto object-cover drop-shadow-lg"
                            />
                        </div>
                        <div class="flex flex-col flex-1 justify-between">
                            <h2 class="text-xl font-semibold text-black dark:text-white">
                                Organize Your Wardrobe
                            </h2>
                            <p class="mt-4 text-sm">
                                Effortlessly manage your clothing items, categorize them, and keep track of your favorite outfits.
                            </p>
                        </div>
                    </a>

                    <!-- Feature Card -->
                    <a href="#" 
                        class="flex flex-col items-start gap-4 rounded-lg bg-white p-6 shadow-lg ring-1 ring-gray-200 transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#4F46E5] dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700"
                    >
                        <div class="relative w-full overflow-hidden rounded-[10px]">
                            <img
                                src="https://images.pexels.com/photos/432059/pexels-photo-432059.jpeg?auto=compress&cs=tinysrgb&w=600"
                                alt="Plan Your Outfits"
                                class="w-full h-auto object-cover drop-shadow-lg"
                            />
                        </div>
                        <div class="flex flex-col flex-1 justify-between">
                            <h2 class="text-xl font-semibold text-black dark:text-white">
                                Plan Your Outfits
                            </h2>
                            <p class="mt-4 text-sm">
                                Create and save outfits for different occasions, seasons, or moods. Stay stylish and organized.
                            </p>
                        </div>
                    </a>

                    <!-- Feature Card -->
                    <a href="#" 
                        class="flex flex-col items-start gap-4 rounded-lg bg-white p-6 shadow-lg ring-1 ring-gray-200 transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#4F46E5] dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700"
                    >
                        <div class="relative w-full overflow-hidden rounded-[10px]">
                            <img
                                src="https://images.pexels.com/photos/1311587/pexels-photo-1311587.jpeg?auto=compress&cs=tinysrgb&w=600"
                                alt="Track Your Style"
                                class="w-full h-auto object-cover drop-shadow-lg"
                            />
                        </div>
                        <div class="flex flex-col flex-1 justify-between">
                            <h2 class="text-xl font-semibold text-black dark:text-white">
                                Track Your Style
                            </h2>
                            <p class="mt-4 text-sm">
                                Keep a record of your favorite clothing items and outfits. Stay on top of your fashion game.
                            </p>
                        </div>
                    </a>

                    <!-- Feature Card -->
                    <a href="#" 
                        class="flex flex-col items-start gap-4 rounded-lg bg-white p-6 shadow-lg ring-1 ring-gray-200 transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#4F46E5] dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700"
                    >
                        <div class="relative w-full overflow-hidden rounded-[10px]">
                            <img
                                src="https://images.pexels.com/photos/949670/pexels-photo-949670.jpeg?auto=compress&cs=tinysrgb&w=600"
                                alt="Discover Trends"
                                class="w-full h-auto object-cover drop-shadow-lg"
                            />
                        </div>
                        <div class="flex flex-col flex-1 justify-between">
                            <h2 class="text-xl font-semibold text-black dark:text-white">
                                Discover Trends
                            </h2>
                            <p class="mt-4 text-sm">
                                Stay updated with the latest fashion trends and get personalized recommendations based on your wardrobe.
                            </p>
                        </div>
                    </a>
                </div>
            </main>

            <footer class="py-16 text-center text-sm text-black dark:text-white/70 mt-auto pb-5">
                <div>Wardrobe Wizard</div>
                <div>&copy; {{ new Date().getFullYear() }}</div>
            </footer>
        </div>
    </AuthenticatedLayout>
</template>
