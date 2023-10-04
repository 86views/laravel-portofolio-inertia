<template>
    <Head title="Project Index" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                All Project
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-end m-2 p-2">
                    <Link
                        :href="route('projects.create')"
                        class="inline-block px-4 py-3 mb-4 text-white bg-blue-500 rounded"
                    >
                        Add New Projecs</Link
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
                                <th scope="col" class="px-6 py-3">Skill</th>
                                <th scope="col" class="px-6 py-3">Image</th>
                                <th scope="col" class="px-6 py-3">
                                    Project Url
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Created_At
                                </th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="project in projects.data"
                                :key="project.id"
                                class="bg-white border-b dark:bg-gray-900 dark:border-gray-700"
                            >
                                <th
                                    scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                >
                                    {{ project.id }}
                                </th>
                                <td class="px-6 py-4">{{ project.name }}</td>
                                <td class="px-6 py-4">
                                    {{ project.skill.name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ project.project_url }}
                                </td>
                                <td class="px-6 py-4">
                                    <img
                                        :src="project.image"
                                        class="w-16 h-16 rounded"
                                    />
                                </td>
                                <td class="px-6 py-4">
                                    {{ project.created_at }}
                                </td>
                                <td class="px-6 py-4">
                                    <Link
                                        :href="
                                            route('projects.edit', project.id)
                                        "
                                        class="px-2 py-1 bg-blue-600 text-white rounded font-bold uppercase mr-2"
                                        >Edit</Link
                                    >

                                    <Link
                                        :href="
                                            route(
                                                'projects.destroy',
                                                project.id
                                            )
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
    projects: Object,
});
</script>
