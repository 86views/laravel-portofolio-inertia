<template>
    <Head title="Skill Index" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                All Skills
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-end m-2 p-2">
                    <Link
                        :href="route('skills.create')"
                        class="inline-block px-4 py-3 mb-4 text-white bg-blue-500 rounded"
                    >
                        Add New Skill</Link
                    >
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table
                        class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
                    >
                        <thead
                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                        >
                            <tr>
                                <th scope="col" class="px-6 py-3">Id</th>
                                <th scope="col" class="px-6 py-3">Name</th>
                                <th scope="col" class="px-6 py-3">Image</th>
                                <th scope="col" class="px-6 py-3">
                                    Created_At
                                </th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="skill in skills.data"
                                :key="skill.id"
                                class="bg-white border-b dark:bg-gray-900 dark:border-gray-700"
                            >
                                <th
                                    scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                >
                                    {{ skill.id }}
                                </th>
                                <td class="px-6 py-4">{{ skill.name }}</td>
                                <td class="px-6 py-4">
                                    <img
                                        :src="skill.image"
                                        class="w-16 h-16 rounded"
                                    />

                                    
                                </td>
                                <td class="px-6 py-4">
                                    {{ skill.created_at }}
                                </td>
                                <td class="px-6 py-4">
                                    <Link
                                        :href="route('skills.edit', skill.id)"
                                        class="px-2 py-1 bg-blue-600 text-white rounded font-bold uppercase mr-2"
                                        >Edit</Link
                                    >

                                    <!-- <button
                                        @click="destroy(skill.id)"
                                        type="button"
                                        class="px-2 py-1 bg-red-600 text-white rounded font-bold uppercase"
                                    >
                                        Delete
                                    </button> -->

                                    <Link
                                        :href="
                                            route('skills.destroy', skill.id)
                                        "
                                        method="delete"
                                        as="button"
                                        type="button"
                                        class="px-2 py-1 bg-red-600 text-white rounded font-bold uppercase"
                                    >
                                        Delete
                                    </Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, router } from "@inertiajs/vue3";

defineProps({
    skills: Object,
});

// const props = defineProps({
//     skills: {
//         type: Object,
//         default: () => ({}),
//     },
// });
</script>
