<template>
    <div class="p-6 bg-white shadow-md rounded-lg">
      <h1 class="text-2xl font-bold mb-4">Edit Clothing Item</h1>
      <form @submit.prevent="submit" class="space-y-4">
        <input v-model="form.name" placeholder="Name" class="p-2 border rounded-md w-full" />
        <input v-model="form.category" placeholder="Category" class="p-2 border rounded-md w-full" />
        <input v-model="form.color" placeholder="Color" class="p-2 border rounded-md w-full" />
        <input v-model="form.size" placeholder="Size" class="p-2 border rounded-md w-full" />
        <input v-model="form.season" placeholder="Season" class="p-2 border rounded-md w-full" />
        <input v-model="form.brand" placeholder="Brand" class="p-2 border rounded-md w-full" />
        <textarea v-model="form.description" placeholder="Description" class="p-2 border rounded-md w-full"></textarea>
        <input v-model="form.image_url" placeholder="Image URL" class="p-2 border rounded-md w-full" />
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Update</button>
      </form>
    </div>
  </template>
  
  <script setup>
  import { useForm } from '@inertiajs/vue3';
  
  const props = defineProps({
    clothe: Object,
  });
  
  const form = useForm({
    name: props.clothe.name,
    category: props.clothe.category,
    color: props.clothe.color,
    size: props.clothe.size,
    season: props.clothe.season,
    brand: props.clothe.brand,
    description: props.clothe.description,
    image_url: props.clothe.image_url,
  });
  
  const submit = () => {
    form.put(route('clothes.update', props.clothe.id));
  };
  </script>