<template>
    <Head title="Create Client" />

    <AuthenticatedLayout>

        <template #header>
            <div class="flex justify-between">
                <h2 class="text-xl text-gray-800">Create Artwork</h2>
                <div>
                    <Link href="/clients" class="px-4 py-2 bg-gray-300 border border-gray-300 rounded shadow hover:bg-white">
                        Back
                    </Link>
                </div>
            </div>
        </template>

        <div class="py-8 w-[800px] mx-auto px-4 rounded bg-gray-300 mt-8 shadow">

            <form @submit.prevent="submit">
                <div class="flex flex-col mb-3">
                    <label for="title">Title</label>
                    <input type="text" id="title" v-model="form.title" class="h-full border-gray-400 rounded" />
                    <div class="text-red-600" v-if="form.errors.title">{{ form.errors.title }}</div>
                </div>
                <div class="flex flex-col mb-3">
                    <label for="artist">Artist</label>
                    <textarea id="artist" v-model="form.artist" class="h-full border-gray-400 rounded"></textarea>
                    <div class="text-red-600" v-if="form.errors.artist">{{ form.errors.artist }}</div>
                </div>
                <div class="flex flex-col mb-3">
                    <label for="email">Email</label>
                    <textarea id="email" v-model="form.email" class="h-full border-gray-400 rounded"></textarea>
                    <div class="text-red-600" v-if="form.errors.email">{{ form.errors.email }}</div>
                </div>
                <div class="flex flex-col mb-3">
                    <label for="description">Description</label>
                    <textarea id="description" v-model="form.description" class="h-full border-gray-400 rounded"></textarea>
                    <div class="text-red-600" v-if="form.errors.description">{{ form.errors.description }}</div>
                </div>
                <div class="flex justify-between">
                    <div class="flex flex-col mb-3 w-[100%]">
                        <label for="price">Price</label>
                        <input type="number" step="0.01" id="price" v-model="form.price" class="h-full text-right border-gray-400 rounded" />
                        <div class="text-red-600" v-if="form.errors.price">{{ form.errors.price }}</div>
                    </div>
                </div>
                <div class="flex flex-col mb-3">
                    <label for="pic">Product Picture</label>
                    <input type="file" @input="form.pic = $event.target.files[0]" class="h-full text-center border-gray-400 rounded" accept="image/jpeg" />
                    <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                        {{ form.progress.percentage }}%
                    </progress>
                </div>
                <button class="w-full px-4 py-2 bg-blue-200 border border-blue-300 rounded shadow hover:bg-gray-200">
                    Create Artwork
                </button>
            </form>

        </div>

    </AuthenticatedLayout>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm } from '@inertiajs/vue3';

const form =  useForm({
    title: null,
    description: null,
    artist: null,
    email: null,
    price: 0,
    pic: null
})

function submit() {
    form.post('/clients');
}
</script>
