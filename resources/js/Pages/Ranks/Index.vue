<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import { useForm, Head } from "@inertiajs/vue3";
import { ref, watch } from "vue";

const props = defineProps(["ranks"]);
const editing = ref(false);
const editingId = ref(null);

const form = useForm({
    name: "",
    description: "",
    tag: "",
});

function submit() {
    if (editing && editingId.value) {
        form.put(route("ranks.update", { rank: editingId.value }), {
            onSuccess: () => alert("Record updated successfully."),
        });
    } else {
        form.post(route("ranks.store"), {
            onSuccess: () => alert("Record created successfully."),
        });
    }
}

function startEditing(item) {
    editing.value = true;
    window.scrollTo(0, 0);

    editingId.value = item.id;
    form.name = item.name;
    form.description = item.description;
    form.tag = item.tag;
}
</script>

<template>
    <Head title="Ranks" />

    <AuthenticatedLayout>
        {{ editingId }}
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="submit">
                <label for="name">Name</label>
                <input
                    id="name"
                    v-model="form.name"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                />
                <InputError :message="form.errors.name" class="mt-2" />

                <label for="tag">Tag</label>
                <input
                    id="tag"
                    v-model="form.tag"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                />
                <InputError :message="form.errors.tag" class="mt-2" />

                <label for="description">Description</label>
                <textarea
                    id="description"
                    v-model="form.description"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                />
                <InputError :message="form.errors.description" class="mt-2" />
                <PrimaryButton type="submit" v-if="!editing" class="mt-4"
                    >Create</PrimaryButton
                >
                <SecondaryButton type="submit" v-else class="mt-4"
                    >Edit</SecondaryButton
                >
            </form>
        </div>

        <h1>Ranks:</h1>
        <table
            v-if="ranks.length > 0"
            class="min-w-full bg-white border border-gray-200 h-1/3"
        >
            <thead>
                <tr>
                    <th
                        v-for="(value, key) in ranks[0]"
                        :key="key"
                        class="px-4 py-2 text-left font-semibold text-gray-700 border-b border-r"
                    >
                        {{ key }}
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr
                    v-for="(item, index) in ranks"
                    :key="index"
                    class="transition-colors hover:bg-gray-100"
                >
                    <td
                        v-for="(value, key) in item"
                        :key="key"
                        class="px-4 py-2 text-gray-600 border-b border-r"
                    >
                        {{ value }}
                    </td>
                    <td class="px-4 py-2 text-gray-600 border-b border-r">
                        <button @click="startEditing(item)">Edit</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </AuthenticatedLayout>
</template>
