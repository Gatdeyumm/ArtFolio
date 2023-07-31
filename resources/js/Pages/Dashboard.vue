<template>
    <AuthenticatedLayout>
      <template #header>
        <!-- Add the welcome text -->
        <div class="mb-6 text-center">
          <h2 class="text-3xl font-semibold text-gray-800">Welcome to UrbanGallery ArtFolio</h2>
        </div>
      </template>
  
      <div class="py-6"> <!-- Reduced the vertical padding -->
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
          <div class="grid grid-cols-2 gap-4 p-4 bg-gray-300 shadow-md sm:rounded-lg"> <!-- Adjusted gap and padding, added a white background, shadow, and rounded corners -->
            <!-- Picture of Arts - Row 1, Column 1 -->
            <div class="overflow-hidden rounded-t-lg">
              <img
                src="https://images-cdn.ubuy.co.in/6357f08b45bc2f1fb8252e3e-tyed-art-24x48-inch-oil-paintings-on.jpg"
                alt="Arts Picture 1"
                class="object-contain w-full h-[310px] sm:h-[400px]"
              />
            </div>
  
            <!-- Picture of Arts - Row 1, Column 2 -->
            <div class="overflow-hidden rounded-t-lg">
              <img
                src="https://m.media-amazon.com/images/I/71jjoIbG8dL._AC_UF894,1000_QL80_.jpg"
                alt="Arts Picture 2"
                class="object-contain w-full h-[300px] sm:h-[400px]"
              />
            </div>
  
            <!-- Catchy Description - Spanning across two columns -->
            <div class="col-span-2 p-4 text-center">
              <h3 class="mb-4 text-2xl font-semibold text-gray-800">UNLEASH YOUR CREATIVITY!</h3>
              <p class="text-lg text-gray-800">
                Welcome to ArtFolio, the platform where your artistic vision comes to life. Easily manage your artworks and
                connect with clients to showcase your talent.
              </p>
            </div><br>
          </div>
          
          <div class="mt-6 text-center text-gray-600"> <!-- Reduced the margin -->
            &copy; 2023 Lauros, MJ.
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  </template>
  
  <style>
  /* Add custom CSS styles here */
  
  /* Customize the grid layout for larger screens */
  @media (min-width: 768px) {
    .grid-cols-2 {
      grid-template-columns: repeat(2, minmax(0, 1fr));
    }
  }
  </style>
  
  <script setup>
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import { Head } from '@inertiajs/vue3';
  </script>
  