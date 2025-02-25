<template>
  <Head title="Wardrobe Wizard" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        Wardrobe Wizard
      </h2>
    </template>

    <div class="max-w-7xl mx-auto px-6 py-6">
      <!-- Search & Filters -->
      <div class="mb-6 flex flex-wrap gap-4">
        <input
          v-model="filters.search"
          @keyup.enter="applyFilters"
          placeholder="Search by name or description..."
          class="p-2 border rounded-md flex-grow min-w-[200px]"
        />

        <select v-model="filters.category" @change="applyFilters" class="p-2 border rounded-md w-full sm:w-auto">
          <option value="">All Categories</option>
          <option v-for="category in categories" :key="category" :value="category">
            {{ category }}
          </option>
        </select>

        <select v-model="filters.color" @change="applyFilters" class="p-2 border rounded-md w-full sm:w-auto">
          <option value="">All Colors</option>
          <option v-for="color in colors" :key="color" :value="color">
            {{ color }}
          </option>
        </select>

        <select v-model="filters.size" @change="applyFilters" class="p-2 border rounded-md w-full sm:w-auto">
          <option value="">All Sizes</option>
          <option v-for="size in sizes" :key="size" :value="size">
            {{ size }}
          </option>
        </select>

        <select v-model="filters.season" @change="applyFilters" class="p-2 border rounded-md w-full sm:w-auto">
          <option value="">All Seasons</option>
          <option v-for="season in seasons" :key="season" :value="season">
            {{ season }}
          </option>
        </select>
      </div>

      <!-- Add New Item Button -->
      <Link
        :href="route('clothes.create')"
        class="bg-green-500 text-white px-4 py-2 rounded-md mb-4 inline-block"
      >
        Add New Item
      </Link>

      <!-- Clothing List -->
      <ul class="space-y-4">
        <li v-for="clothe in clothes.data" :key="clothe.id" class="p-4 bg-white shadow-md rounded-lg flex justify-between items-center">
          <div>
            <Link :href="route('clothes.show', clothe.id)" class="text-blue-500 hover:underline">
              {{ clothe.name }}
            </Link>
            <p class="text-gray-600">{{ clothe.description }}</p>
          </div>
          <!-- Delete Button -->
          <button 
            @click="deleteClothe(clothe.id)" 
            class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">
            Delete
          </button>
        </li>
      </ul>

      <!-- Pagination -->
      <div class="mt-6">
        <Pagination :links="clothes.links" />
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import Pagination from '@/Components/Pagination.vue';
import { Inertia } from '@inertiajs/inertia';
import { useToast } from 'vue-toastification';

const toast = useToast();

const props = defineProps({
  clothes: Object,
  filters: Object,
  categories: Array,
  colors: Array,
  sizes: Array,
  seasons: Array,
});

const filters = ref({ ...props.filters });

// Function to apply filters
const applyFilters = () => {
  Inertia.get(route('clothes.index'), filters.value, {
    preserveState: true,
    replace: true,
  });
};

// Function to delete a clothing item
const deleteClothe = (id) => {
  if (confirm("Are you sure you want to delete this item?")) {
    Inertia.delete(route('clothes.destroy', id), {
      preserveState: true,
      onSuccess: () => toast.success("Item deleted successfully!"),
      onError: () => toast.error("Failed to delete item. Try again."),
    });
  }
};
</script>
