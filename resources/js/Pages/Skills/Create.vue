<template>
    <Head title="Skill Crate" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Skills
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-end m-2 p-2">
                    <Link
                        :href="route('skills.index')"
                        class="inline-block px-4 py-3 mb-4 text-white bg-blue-500 rounded"
                    >
                        View All Skill</Link
                    >
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <form class="px-4" @submit.prevent="submit">
                        <div>
                            <InputLabel for="name" class="mt-2" value="Name" />

                            <TextInput
                                id="name"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.name"
                            />

                            <InputError
                                class="mt-2"
                                :message="form.errors.name"
                            />
                        </div>

                        <div class="mt-2">
                            <InputLabel
                                for="image"
                                class="mt-2"
                                value="Skill Image"
                            />

                            <TextInput
                                id="image"
                                type="file"
                                @input="form.image = $event.target.files[0]"
                                class="mt-1 block w-full"
                            />

                            <InputError
                                class="mt-2"
                                :message="form.errors.image"
                            />
                        </div>
                        <progress
                            v-if="form.progress"
                            :value="form.progress.percentage"
                            max="full"
                        >
                            {{ form.progress.percentage }}%
                        </progress>

                        <div
                            class="flex items-center justify-end mt-4 py-4 px-4"
                        >
                            <PrimaryButton
                                class="mr-4"
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                            >
                                Submit
                            </PrimaryButton>

                            <Link
                                :href="route('skills.index')"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                            >
                                Cancel
                            </Link>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, router, useForm } from "@inertiajs/vue3";

const form = useForm({
    name: "",
    image: null,
});

const submit = () => {
    form.post(route("skills.store"));
};
</script>
