<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head } from '@inertiajs/vue3';

defineProps(['ranks']);

const form = useForm({
    name: '',
    description: '',
    tag: '',
});
</script>

<template>
    <Head title="Ranks" />

    <AuthenticatedLayout>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="form.post(route('ranks.store'), { onSuccess: () => form.reset() })">
                <label for="name">Name</label>
                <input id="name" v-model="form.name"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" />
                <InputError :message="form.errors.name" class="mt-2" />

                <label for="description">Description</label>
                <input id="description" v-model="form.description"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" />
                <InputError :message="form.errors.description" class="mt-2" />

                <label for="tag">Tag</label>
                <input id="tag" v-model="form.tag"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" />
                <InputError :message="form.errors.tag" class="mt-2" />
                <PrimaryButton class="mt-4">Ranks</PrimaryButton>
            </form>
        </div>

        <h1>Ranks:</h1>
        <table v-if="ranks.length > 0" class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th v-for="(value, key) in ranks[0]" :key="key"
                        class="px-4 py-2 text-left font-semibold text-gray-700 border-b">{{ key }}</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in ranks" :key="index" class="transition-colors hover:bg-gray-100">
                    <td v-for="(value, key) in item" :key="key" class="px-4 py-2 text-gray-600 border-b">{{ value }}</td>
                </tr>
            </tbody>
        </table>

    </AuthenticatedLayout>
</template>
