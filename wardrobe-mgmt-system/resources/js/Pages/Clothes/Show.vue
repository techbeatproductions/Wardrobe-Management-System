<template>
  <Head :title="clothe.name" />

  <AuthenticatedLayout>
      <template #header>
          <h2 class="text-xl font-semibold leading-tight text-gray-800">
              Clothing Item Details
          </h2>
      </template>

      <div class="max-w-7xl mx-auto px-6 py-6">
          <div class="bg-white shadow-md rounded-lg max-w-2xl mx-auto p-6">
              <h1 class="text-2xl font-bold mb-4">{{ clothe.name }}</h1>
              <div class="space-y-2">
                  <p><span class="font-semibold">Category:</span> {{ clothe.category }}</p>
                  <p><span class="font-semibold">Color:</span> {{ clothe.color }}</p>
                  <p><span class="font-semibold">Size:</span> {{ clothe.size }}</p>
                  <p><span class="font-semibold">Season:</span> {{ clothe.season }}</p>
                  <p><span class="font-semibold">Brand:</span> {{ clothe.brand }}</p>
                  <p><span class="font-semibold">Description:</span> {{ clothe.description }}</p>
                  <img 
                      v-if="clothe.image_url" 
                      :src="clothe.image_url" 
                      alt="Clothing Image" 
                      class="mt-4 w-48 h-48 object-cover rounded-lg" 
                  />
              </div>
              <div class="mt-6">
                  <Link :href="route('clothes.edit', clothe.id)" class="bg-blue-500 text-white px-4 py-2 rounded-md mr-2">
                      Edit
                  </Link>
                  <Link :href="route('clothes.index')" class="bg-gray-500 text-white px-4 py-2 rounded-md">
                      Back
                  </Link>
              </div>
          </div>
      </div>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
  clothe: Object,
});
</script>
