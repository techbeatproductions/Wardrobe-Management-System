<template>
  <Head title="Add Clothing Item" />

  <AuthenticatedLayout>
      <template #header>
          <h2 class="text-xl font-semibold leading-tight text-gray-800">
              Add New Clothing Item
          </h2>
      </template>

      <div class="max-w-7xl mx-auto px-6 py-6">
          <div class="bg-white shadow-md rounded-lg max-w-2xl mx-auto p-6">
              <form @submit.prevent="submit" class="space-y-4">
                  <input v-model="form.name" placeholder="Name" class="p-2 border rounded-md w-full" />
                  <input v-model="form.category" placeholder="Category" class="p-2 border rounded-md w-full" />
                  <input v-model="form.color" placeholder="Color" class="p-2 border rounded-md w-full" />
                  <input v-model="form.size" placeholder="Size" class="p-2 border rounded-md w-full" />
                  <input v-model="form.season" placeholder="Season" class="p-2 border rounded-md w-full" />
                  <input v-model="form.brand" placeholder="Brand" class="p-2 border rounded-md w-full" />
                  <textarea v-model="form.description" placeholder="Description" class="p-2 border rounded-md w-full"></textarea>
                  <input v-model="form.image_url" placeholder="Image URL" class="p-2 border rounded-md w-full" />
                  <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Save</button>
              </form>
          </div>
      </div>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
  name: '',
  category: '',
  color: '',
  size: '',
  season: '',
  brand: '',
  description: '',
  image_url: '',
});

const submit = () => {
  form.post(route('clothes.store'));
};
</script>
