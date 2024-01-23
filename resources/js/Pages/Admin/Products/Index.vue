<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';

const isOpenModal = ref(false)
// Open Modal
const openModal = () => {
    isOpenModal.value = true
}
// Close Modal
const closeModal = () => {
    isOpenModal.value = false
}

defineProps({
    products: Object
})

const form = useForm({
    name: "",
    image: null,
})

// Create Product
const submitProduct = () => {
    form.post("/products")
    isOpenModal.value = false
    form.image = null
    form.name = ""
}

// Delete Product
const deleteProduct = (id) => {
    if (confirm("Silmek istediğinize emin misiniz?")) {
        form.delete(route('product.destroy', id))
    }
}

</script>

<template>
    <Head title="Ürünler" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Ürünler</h2>
        </template>
        <div class="py-16 bg-gradient-to-r from-sky-100 to-indigo-100">
            <div class="float-right px-36 md:px-44 pe-44 md:pe-44 lg:pe-60"
                v-if="$page.props.auth && $page.props.auth.user && $page.props.auth.user.roles && $page.props.auth.user.roles.includes('admin')">
                <button type="button" @click="openModal"
                    class="text-white bg-gray-800 hover:bg-gray-900 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-md mt-2 px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Yeni
                    Ürün Ekle</button>
            </div>
            <div class="py-16 px-36 md:px-44 lg:px-60">
                <div v-if="products.data.length" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div v-for="product in products.data" :key="product.key"
                        class="w-full max-w-sm bg-white duration-300 rounded-lg hover:shadow-2xl shadow-sm dark:bg-gray-100 dark:border-gray-700">
                        <a href="#">
                            <div class="relative group">
                                <img class="pb-2 rounded-t-lg" :src="'images/products/' + product.image"
                                    alt="product image" />
                                <button @click="deleteProduct(product.id)"
                                    v-if="$page.props.auth && $page.props.auth.user && $page.props.auth.user.roles && $page.props.auth.user.roles.includes('admin')"
                                    class="absolute top-0 right-0 p-4 rounded opacity-0 transition-opacity duration-500 group-hover:opacity-100">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-red-600" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                        <path
                                            d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z" />
                                    </svg>
                                </button>
                            </div>
                        </a>
                        <div class="px-5 pt-3 pb-5">
                            <a href="#">
                                <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-gray-700">
                                    {{ product.name }}</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Modal -->
        <div v-if="isOpenModal"
            class="flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Yeni Ürün
                        </h3>
                        <button type="button" @click="closeModal"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <form @submit.prevent="submitProduct" class="max-w-lg mx-auto">
                        <!-- Modal body -->
                        <div class="py-4 md:py-5 space-y-4">
                            <!--Product Name-->
                            <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ürün
                                    İsmi</label>
                                <input v-model="form.name" type="text" name="name" id="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Ürün ismi" required="">
                            </div>
                            <!--Image-->
                            <div class="max-w-lg mx-auto">
                                <label class="block mb-2 text-md font-medium text-gray-900 dark:text-white"
                                    for="image">Resim Yükle</label>
                                <input @change="form.image = $event.target.files[0]"
                                    class="block w-full text-md text-gray-900 file:p-2 file:font-semibold file:border-0 file:rounded-full cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    aria-describedby="user_avatar_help" id="image" type="file">
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="flex items-center py-4 md:py-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kaydet</button>
                            <button @click="closeModal" type="button"
                                class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Kapat</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </AuthenticatedLayout>
</template>
