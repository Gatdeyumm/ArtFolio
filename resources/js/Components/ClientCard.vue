<template>
    <div class="min-w-[400px] mb-4 mx-2 p-4 bg-gray-300 rounded shadow border flex-1 cursor-pointer">
      <!-- Title centered above the picture -->
      <h3 class="mb-3 text-2xl font-semibold text-center text-blue-900">{{ client.title }}</h3>
      <img :src="client.picUrl" alt="Product photo" class="object-cover w-full h-[200px] mb-4 aspect-square rounded-t-lg" @click="open(client)">
      <!-- Description displayed after the picture -->
      <p class="mb-4 text-lg text-green-800">{{ client.description }}</p>
      <!-- Artist and Price displayed below the description -->
      <div class="flex justify-between mb-4">
        <p class="text-base text-green-800">By: {{ client.artist }}</p>
        <p class="italic text-blue-600">{{ client.price }}</p>
      </div>
      <!-- Toggle switch -->
      <div class="flex items-center justify-between mb-2">
        <p class="text-sm text-gray-800">Availability:</p>
        <label :for="'enabled' + '-' + client.id" class="switch">
          <input type="checkbox" :id="'enabled' + '-' + client.id" :checked="client.enabled" @change.prevent="toggleEnabled(client)">
          <span class="slider round"></span>
        </label>
        <p class="ml-2 text-sm text-gray-800">
          {{ client.enabled ? 'Available' : 'Not Available' }}
        </p>
      </div>
    </div>
  </template>
  
  <style scoped>
  /* Your existing styles here */
  
  /* Make the toggle switch smaller */
  .switch {
    position: relative;
    display: inline-block;
    width: 40px;
    height: 20px;
  }
  
  /* Hide default HTML checkbox */
  .switch input {
    opacity: 0;
    width: 0;
    height: 0;
  }
  
  /* The slider */
  .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
    border-radius: 10px;
  }
  
  .slider:before {
    position: absolute;
    content: "";
    height: 16px;
    width: 16px;
    border-radius: 50%;
    left: 2px;
    bottom: 2px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
  }
  
  input:checked + .slider {
    background-color: #2196F3;
  }
  
  input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
  }
  
  input:checked + .slider:before {
    -webkit-transform: translateX(20px);
    -ms-transform: translateX(20px);
    transform: translateX(20px);
  }
  
  /* Rounded sliders */
  .slider.round {
    border-radius: 34px;
  }
  
  .slider.round:before {
    border-radius: 50%;
  }
  </style>
  
  <script setup>
  import { router } from '@inertiajs/vue3';
  
  const props = defineProps({
    client: Object
  });
  
  function open(client) {
    router.visit('/clients/' + client.id);
  }
  
  function toggleEnabled(client) {
    router.visit('/clients/toggle/' + client.id, {
      method: 'post',
      preserveScroll: true
    });
  }
  </script>
  