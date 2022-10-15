<script setup>
import AdminLayout from "../../../Layouts/AdminLayout.vue";
import { Link, useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    tag: Object,
});

// Tag object.
const updatedTag = useForm({
    name: props.tag.name,
});

// Submit tag form.
function updateTag() {
    updatedTag.patch(route("admin.tags.update", props.tag), {
        onError: (error) => {
            console.log(error);
        }
    });
}
</script>

<template>
    <AdminLayout title="Movies">
        <template #header>
            <h2 class="text-xl font-semibold text-gray-800 loading-tight">
                Tags - Edit
            </h2>
        </template>

        <div class="py-2">
            <div class="mx-auto max-w-8xl sm:px-6 lg:px-8">
                <section class="container p-6 mx-auto font-mono">
                    <div class="flex justify-end w-full p-2 mb-4">
                        <Link
                            :href="route('admin.tags.index')"
                            class="px-4 py-2 text-white bg-blue-500 hover:bg-blue-700"
                            >Back</Link
                        >
                    </div>

                    <section class="flex place-items-center">
                        <form @submit.prevent="updateTag" class="flex-initial w-1/2 mx-auto">
                            <div class="overflow-hidden shadow sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="w-full">
                                        <div class="">
                                            <label
                                                for="first-name"
                                                class="block text-sm font-medium text-gray-700"
                                                >Tag name</label
                                            >
                                            <input
                                                v-model="updatedTag.name"
                                                type="text"
                                                autocomplete="given-name"
                                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            />

                                            <div
                                                class="my-1 text-sm text-red-500"
                                                v-if="updatedTag.errors.name"
                                                v-text="updatedTag.errors.name"
                                            ></div>
                                        </div>

                                        <div class="mt-4">
                                            <button
                                                class="px-4 py-2 text-white bg-indigo-500 rounded-sm hover:bg-indigo-700"
                                            >
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>
                </section>
            </div>
        </div>
    </AdminLayout>
</template>
