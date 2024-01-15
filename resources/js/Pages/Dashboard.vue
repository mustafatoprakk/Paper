<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="p-16">
            <div
                class="bg-blue-100 py-52 shadow-xl max-w-lg px-4  mx-auto text-left md:max-w-none md:text-center rounded-xl">
                <h1
                    class="font-extrabold leading-10 tracking-tight text-[#201515] text-center sm:leading-none text-5xl sm:text-9xl">
                    <span class="inline md:block">Building Good </span>
                    <span class="relative mt-2 bg-clip-text text-[#201515] md:inline-block">Software.</span>
                </h1>
            </div>
        </div>

        <div class="p-16">
            <h1 class="text-3xl mb-6 font-semibold text-center text-gray-600 capitalize lg:text-5xl dark:text-slate-600">
                Our Projects
            </h1>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 ">
                <div>
                    <img class="h-auto max-w-full rounded-lg shadow-xl"
                        src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg shadow-xl"
                        src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg shadow-xl"
                        src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg shadow-xl"
                        src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg shadow-xl"
                        src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg shadow-xl"
                        src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-5.jpg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg shadow-xl"
                        src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-6.jpg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg shadow-xl"
                        src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-7.jpg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg shadow-xl"
                        src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-8.jpg" alt="">
                </div>
            </div>


        </div>

        <div class="p-16">

            <h1 class="text-3xl mb-6 font-semibold text-center text-gray-700 capitalize lg:text-5xl dark:text-slate-700">
                What we are doing
            </h1>

            <section class="bg-slate-400 dark:bg-slate-300 shadow-xl rounded-xl">
                <div class="container px-6 py-10 mx-auto">
                    <div class="grid grid-cols-1 gap-8 mt-8 xl:my-5 xl:gap-12 md:grid-cols-2 xl:grid-cols-3">
                        <div class="overflow-hidden bg-cover rounded-lg cursor-pointer h-96 group"
                            style="background-image:url('https://images.unsplash.com/photo-1621111848501-8d3634f82336?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1565&q=80')">
                            <div
                                class="flex flex-col justify-center w-full h-full px-8 py-4 transition-opacity duration-700 opacity-0 backdrop-blur-sm bg-gray-800/60 group-hover:opacity-100">
                            </div>
                        </div>

                        <div class="overflow-hidden bg-cover rounded-lg cursor-pointer h-96 group"
                            style="background-image:url('https://images.unsplash.com/photo-1621609764180-2ca554a9d6f2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&q=80')">
                            <div
                                class="flex flex-col justify-center w-full h-full px-8 py-4 transition-opacity duration-700 opacity-0 backdrop-blur-sm bg-gray-800/60 group-hover:opacity-100">

                            </div>
                        </div>

                        <div class="overflow-hidden bg-cover rounded-lg cursor-pointer h-96 group"
                            style="background-image:url('https://images.unsplash.com/photo-1531403009284-440f080d1e12?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80')">
                            <div
                                class="flex flex-col justify-center w-full h-full px-8 py-4 transition-opacity duration-700 opacity-0 backdrop-blur-sm bg-gray-800/60 group-hover:opacity-100">

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </AuthenticatedLayout>
</template>
