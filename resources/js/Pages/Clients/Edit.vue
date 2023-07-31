<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    client: Object
})

const form = useForm({
    title: props.client.title,
    description : props.client.description ,
    artist: props.client.artist,
    email: props.client.email,
    price: props.client.price,
    pic: props.client.pic,

})

function submit() {
    // Now, the form.price value should be updated with the calculated price
    form.patch('/clients/' + props.client.id)
}


</script>

<template>
    <Head title="Edit Client" />

    <AuthenticatedLayout>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex justify-between">
                <h2 class="text-xl text-gray-800">Edit Artwork</h2>
                <div>
                    <Link href="/clients" class="px-4 py-2 bg-gray-300 border border-gray-300 rounded shadow hover:bg-white">
                        Back
                    </Link>
                </div>
            </div>
            <div class="py-8 w-[700px] mx-auto px-4 rounded bg-gray-300 mt-8 shadow">
    <form @submit.prevent="submit" class="flex">
      <div class="flex-1 pr-4">
        <div class="form-field">
          <label for="title">Title</label>
          <input required type="text" id="title" v-model="form.title" class="h-full border-gray-500 rounded" />
        </div>

        <div class="form-field">
          <label for="description">Description</label>
          <textarea required type="description" id="description" v-model="form.description" class="h-full border-gray-500 rounded" />
        </div>

        <div class="form-field">
          <label for="artist">Artist</label>
          <input required type="text" id="artist" v-model="form.artist" class="h-full border-gray-500 rounded" />
        </div>

        <div class="form-field">
          <label for="email">Email</label>
          <input required type="text" id="email" v-model="form.email" class="h-full border-gray-500 rounded" />
        </div>

        <div class="form-field">
          <label for="price">Price</label>
          <input required type="number" id="price" v-model="form.price" class="h-full text-right border-gray-500 rounded" />
        </div>
        
        <button class="w-full px-4 py-2 bg-blue-200 border border-blue-300 rounded shadow hover:bg-gray-200">
          Save Changes
        </button>
        
      </div>
    </form>
  </div>
  </div>
        </div>



    </AuthenticatedLayout>
</template>

<style>
.form-field {
  margin-bottom: 1rem;
}

.form-field label {
  color: black;
  font-size: 16px;
}

.form-field input,
.form-field textarea {
  background-color: #ffffff;
  border: none;
  
  color: rgb(87, 87, 87);
  padding: 0.5rem 0;
  font-size: 16px;
  width: 100%;
}

.form-field textarea {
  resize: vertical;
}

button {
  cursor: pointer;
}
</style>