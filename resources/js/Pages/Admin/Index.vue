<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    subject: '',
    message: ''
})

const submit = () => {
    form.post('/admin/send-mail')

    form.subject = ''
    form.message = ''
}

const props = defineProps({
    message: Object
})

console.log(props.message)
</script>

<template>
    <Head title="Admin" />

    <AuthenticatedLayout>
        <template #header>
            
        </template>
        <div v-if="props.message.info" class="p-4 mt-4 text-center text-green-800 bg-green-100 rounded-lg">
            Information: {{ props.message.info }}
        </div>
        <div v-if="props.message.error" class="p-4 mt-4 text-center text-red-800 bg-red-100 rounded-lg">
            Error: {{ props.message.error }}
        </div>
        <div class="py-12">
            <div class="flex items-center justify-center">
                <div class="w-1/2 p-6 bg-gray-300 rounded-lg shadow-sm">
                    <h1 class="mb-10 text-2xl text-center">Send a Message to All Artists</h1>
                    <form @submit.prevent="submit">
                        <div class="mb-4">
                            <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
                            <input v-model="form.subject" type="text" id="subject" class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:ring focus:ring-blue-300 focus:border-blue-400">
                        </div>
                        <div class="mb-4">
                            <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                            <textarea v-model="form.message" id="message" class="mt-1 px-4 py-2 h-[120px] w-full rounded-md border border-gray-300 focus:ring focus:ring-blue-300 focus:border-blue-400"></textarea>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="px-4 py-2 text-center text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:ring focus:ring-blue-300 focus:ring-opacity-50">Send Mail</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
