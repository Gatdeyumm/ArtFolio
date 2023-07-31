<script setup>

    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import ClientCard from '@/Components/ClientCard.vue';
    import { Head, Link, router } from '@inertiajs/vue3';

    const props = defineProps({
        clients: Array,
        auth: Object
    })

    const search = (ev) => {
        // console.log(ev.target.value)
        router.visit('/clients/search/' + ev.target.value)
    }
    
</script>

<template>
    <Head title="Clients" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between ">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">Artworks</h2>
                <div style="position: relative">
                    <input type="text" @keydown.enter="search($event)" placeholder="Search..." class="border border-gray-400 rounded-full w=[300px]">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#888888" width="30px" height="20px" viewBox="0 0 16 16" style="position: absolute; right: 10px; top:10px">
                        <path d="M12.027 9.92L16 13.95 14 16l-4.075-3.976A6.465 6.465 0 0 1 6.5 13C2.91 13 0 10.083 0 6.5 0 2.91 2.917 0 6.5 0 10.09 0 13 2.917 13 6.5a6.463 6.463 0 0 1-.973 3.42zM1.997 6.452c0 2.48 2.014 4.5 4.5 4.5 2.48 0 4.5-2.015 4.5-4.5 0-2.48-2.015-4.5-4.5-4.5-2.48 0-4.5 2.014-4.5 4.5z" fill-rule="evenodd"/>
                    </svg>
                </div>
                <div>                   
                    <Link v-if="props.auth.user.permissions.includes('create-client')" :href="route('clients.create')" class="px-4 py-2 bg-gray-300 border border-gray-300 rounded shadow hover:bg-white">
                        Create Artwork
                    </Link>
                </div>
            </div>
        </template>

        <div class="py-12">
            <div class="flex flex-wrap mx-auto max-w-7xl sm:px-6 lg:px-8">
                <ClientCard v-for="client in props.clients" :client="client" :key="client.id" />
            </div>
        </div>
    </AuthenticatedLayout>
</template>

