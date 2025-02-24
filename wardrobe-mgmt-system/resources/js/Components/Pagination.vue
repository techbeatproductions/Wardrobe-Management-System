<template>
    <div class="flex justify-center mt-6">
      <nav class="inline-flex rounded-md shadow-sm">
        <Link
          v-for="link in links"
          :key="link.label"
          :href="link.url ?? '#'"
          :class="{
            'px-4 py-2 border rounded-l-md': !link.url,
            'px-4 py-2 border': link.url,
            'bg-blue-500 text-white': link.active,
            'bg-white text-gray-700 hover:bg-gray-50': !link.active,
          }"
          v-html="link.label"
        />
      </nav>
    </div>
  </template>
  
  <script setup>
  import { Link } from '@inertiajs/vue3';
  
  defineProps({
    links: Array,
  });
  </script>