<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head } from '@inertiajs/vue3';

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
    </AuthenticatedLayout>
</template>
