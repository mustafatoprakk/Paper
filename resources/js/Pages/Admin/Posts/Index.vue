<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const isOpenProjectModal = ref(false)
const openProjectModal = () => {
    isOpenProjectModal.value = true
}
const closeProjectModal = () => {
    isOpenProjectModal.value = false
}

defineProps({
    posts: ""
})

const form = useForm({
    image: null
})

const submitImage = () => {
    form.post('/posts')
    isOpenProjectModal.value = false
}

const deleteImage = (id) => {
    if (confirm("Are you sure this delete image")) {
        form.delete(route("post.destroy", id))
    }
}

</script>

<template>
    <Head title="Our Projects" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Our Projects</h2>
        </template>

        <div class="float-right pe-16">
            <button type="button" @click="openProjectModal"
                class="text-white bg-gray-800 hover:bg-gray-900 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-md mt-2 px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">New
                Image</button>
        </div>
        <div class="p-16 mt-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-10">
                <div v-for="post in posts" :key="post.id">
                    <div class="relative group">
                        <img class="h-auto max-w-full rounded-lg hover:shadow-2xl hover:border-2" :src="'images/posts/' + post.image"
                            alt="">
                        <button @click="deleteImage(post.id)"
                            class="absolute top-0 right-0 p-4 rounded opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                            <svg class="w-6 h-6 text-gray-800 dark:text-red-600" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                <path
                                    d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Project Modal -->
        <div v-if="isOpenProjectModal"
            class="flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Create Projects
                        </h3>
                        <button type="button" @click="closeProjectModal"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <form @submit.prevent="submitImage" class="max-w-lg mx-auto">
                        <!-- Modal body -->
                        <div class="py-4 md:py-5 space-y-4">
                            <!--Image-->
                            <div class="max-w-lg mx-auto">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="image">Upload file</label>
                                <input @change="form.image = $event.target.files[0]"
                                    class="block w-full text-md text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    aria-describedby="user_avatar_help" id="image" type="file">
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="flex items-center py-4 md:py-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>
                            <button @click="closeProjectModal" type="button"
                                class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
