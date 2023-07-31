<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
    client: Object,
    auth: Object
})

</script>

<template>
    <Head title="View Client" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">{{ client.title }}</h2>
                <div class="flex">
                    <Link href="/clients" class="px-4 py-2 mr-2 bg-gray-300 border border-gray-300 rounded shadow hover:bg-white">
                        Back
                    </Link>
                    <Link :href="'/clients/email/' + client.id" class="flex p-2 mr-2 bg-gray-300 border border-gray-300 rounded shadow hover:bg-white">Send Email</Link>
                    <a as="button" :href="'/clients/pdf/' + client.id" target="_blank" class="flex p-2 bg-gray-300 border border-gray-300 rounded shadow hover:bg-white">
                        <svg fill="#333333" width="20px" height="20px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g fill-rule="evenodd"> <path d="M1251.654 0c44.499 0 88.207 18.07 119.718 49.581l329.223 329.224c31.963 31.962 49.581 74.54 49.581 119.717V1920H169V0Zm-66.183 112.941H281.94V1807.06h1355.294V564.706H1185.47V112.94Zm112.94 23.379v315.445h315.445L1298.412 136.32Z"></path> <path d="M900.497 677.67c26.767 0 50.372 12.65 67.991 37.835 41.901 59.068 38.965 121.976 23.492 206.682-5.308 29.14.113 58.617 16.263 83.125 22.814 34.786 55.68 82.673 87.981 123.219 23.718 29.93 60.198 45.854 97.13 40.885 23.718-3.276 52.292-5.986 81.656-5.986 131.012 0 121.186 46.757 133.045 89.675 6.55 25.976 3.275 48.678-10.165 65.506-16.715 22.701-51.162 34.447-101.534 34.447-55.793 0-74.202-9.487-122.767-24.96-27.445-8.81-55.906-10.617-83.69-3.275-55.453 14.456-146.936 36.48-223.284 46.983-40.772 5.647-77.816 26.654-102.438 60.875-55.454 76.8-106.842 148.518-188.273 148.518-21.007 0-40.32-7.567-56.244-22.701-23.492-23.492-33.544-49.581-28.574-79.85 13.778-92.95 128.075-144.79 196.066-182.625 16.037-8.923 28.687-22.589 36.592-39.53l107.86-233.223c7.68-16.377 10.051-34.56 7.228-52.518-12.537-79.059-31.06-211.99 18.748-272.075 10.955-13.44 26.09-21.007 42.917-21.007Zm20.556 339.953c-43.257 126.607-119.718 264.282-129.996 280.32 92.273-43.37 275.916-65.28 275.916-65.28-92.386-88.998-145.92-215.04-145.92-215.04Z"></path> </g> </g></svg>
                        Export
                    </a>
                </div>
            </div>
        </template>

        <div class="py-12">
            <div class="flex justify-between mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="bg-gray-200 p-4 rounded shadow w-[30%]">
                    <h4 class="mb-3 text-2xl ">Artwork Info</h4>
                    <img :src="client.picUrl" alt="Product photo" class="object-cover w-full h-[200px] mb-4 aspect-square">
                    <hr>
                    <table class="min-w-[100%] table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <td>{{ client.title }}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{ client.description }}</td>
                            </tr>
                            <tr>
                                <th>Artist Name</th>
                                <td>{{ client.artist }}</td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td>{{ client.price }}</td>
                            </tr>
                            <tr>
                <td>
                    <Link
                        v-if="props.auth.user.permissions.includes('edit-client')"
                        :href="route('clients.edit', { client: client.id })"
                        class="block px-4 py-2 text-center text-white bg-blue-500 rounded shadow hover:bg-blue-600"
                    >
                        Edit Artwork
                    </Link>
                </td>
                <td>
                    <Link v-if="props.auth.user.permissions.includes('delete-client')"
                    class="block px-4 py-2 text-center text-white bg-red-500 rounded shadow hover:bg-red-600"
                        :href="'/clients/' + client.id" method="delete" as="button"
                    >
                        Delete Artwork
                    </Link>
                </td>
            </tr>
                        </thead>
                    </table>
                </div>
                <div class="bg-gray-200 p-4 rounded shadow w-[68%]">
                    <h4 class="mb-3 text-2xl">Transaction Logs</h4>

                    <table class="table table-auto min-w-[100%] ">
                        <thead>
                            <tr>
                                <th>Transaction Date</th>
                                <th>Buyers</th>
                                <th>Down Payment</th>
                                <th>Status</th>
                                <th>Payment Method</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="txn in client.transactions" :key="txn.id">
                                <td>{{ txn.transaction_date  }}</td>
                                <td>{{ txn.buyer }}</td>
                                <td>{{ txn.amount }}</td>
                                <td>{{ txn.status }}</td>
                                <td>{{ txn.payment_method }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
