<template>
    <div class="p-6">
      <h1 class="text-2xl font-bold mb-4">My Wardrobe</h1>
      <div class="mb-6 flex space-x-4">
        <input
          v-model="filters.search"
          placeholder="Search by name or description..."
          class="p-2 border rounded-md flex-grow"
        />
        <select v-model="filters.category" class="p-2 border rounded-md">
          <option value="">All Categories</option>
          <option value="Shirt">Shirt</option>
          <option value="Pants">Pants</option>
          <option value="Shoes">Shoes</option>
        </select>
        <select v-model="filters.color" class="p-2 border rounded-md">
          <option value="">All Colors</option>
          <option value="Red">Red</option>
          <option value="Blue">Blue</option>
          <option value="Black">Black</option>
        </select>
        <select v-model="filters.size" class="p-2 border rounded-md">
          <option value="">All Sizes</option>
          <option value="S">Small (S)</option>
          <option value="M">Medium (M)</option>
          <option value="L">Large (L)</option>
        </select>
        <select v-model="filters.season" class="p-2 border rounded-md">
          <option value="">All Seasons</option>
          <option value="Summer">Summer</option>
          <option value="Winter">Winter</option>
          <option value="All-Season">All-Season</option>
        </select>
      </div>
      <Link :href="route('clothes.create')" class="bg-green-500 text-white px-4 py-2 rounded-md mb-4 inline-block">Add New Item</Link>
      <ul class="space-y-4">
        <li v-for="clothe in clothes.data" :key="clothe.id" class="p-4 bg-white shadow-md rounded-lg">
          <Link :href="route('clothes.show', clothe.id)" class="text-blue-500 hover:underline">{{ clothe.name }}</Link>
          <p class="text-gray-600">{{ clothe.description }}</p>
        </li>
      </ul>
      <div class="mt-6">
        <Pagination :links="clothes.links" />
      </div>
    </div>
  </template>
  
  <script setup>
  import { Link } from '@inertiajs/vue3';
  import { ref, watch } from 'vue';
  import Pagination from '@/Components/Pagination.vue'; // Assuming you have a Pagination component
  
  const props = defineProps({
    clothes: Object,
    filters: Object,
  });
  
  const filters = ref(props.filters);
  
  watch(filters, (value) => {
    Inertia.get(route('clothes.index'), value, { preserveState: true });
  });
  </script>