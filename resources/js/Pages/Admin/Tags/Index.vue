<script setup>
import AdminLayout from "../../../Layouts/AdminLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { ref, watch, defineProps } from "vue";
import Pagination from "../Components/Pagination.vue";
import { Inertia } from "@inertiajs/inertia";
import debounce from "lodash/debounce";
import { PencilSquareIcon, TrashIcon } from "@heroicons/vue/24/solid";

const props = defineProps({
    tags: Object, // pagination object.
    filters: Object,
});

const search = ref(props.filters.search);
const perPage = ref(5);
const orderBy = ref('ASC');

watch(
    search,
    debounce((value) => {
        Inertia.get(
            route("admin.tags.index"),
            { search: value, perPage: perPage.value },
            { preserveState: true, replace: true }
        );
    }, 300)
);

function getData() {
    Inertia.get(
        route("admin.tags.index"),
        { perPage: perPage.value, search: search.value, orderBy: orderBy.value },
        { preserveState: true, replace: true }
    );
}
</script>

<template>
    <AdminLayout title="Movies">
        <template #header>
            <h2 class="text-xl font-semibold text-gray-800 loading-tight">
                Tags
            </h2>
        </template>

        <div>
            <div class="mx-auto max-w-8xl sm:px-6 lg:px-8">
                <section class="container p-6 mx-auto font-mono">
                    <div class="flex justify-end w-full p-2 mb-4">
                        <Link
                            :href="route('admin.tags.create')"
                            class="px-4 py-2 text-white bg-blue-500 hover:bg-blue-700"
                            >Create Tag</Link
                        >
                    </div>

                    <div
                        class="w-full mb-8 overflow-hidden rounded-lg shadow-lg"
                    >
                        <div class="w-full p-5 bg-white shadow">
                            <div class="relative">
                                <div
                                    class="absolute flex items-center h-full ml-2"
                                >
                                    <svg
                                        class="w-4 h-4 fill-current text-primary-gray-dark"
                                        viewBox="0 0 16 16"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M15.8898 15.0493L11.8588 11.0182C11.7869 10.9463 11.6932 10.9088 11.5932 10.9088H11.2713C12.3431 9.74952 12.9994 8.20272 12.9994 6.49968C12.9994 2.90923 10.0901 0 6.49968 0C2.90923 0 0 2.90923 0 6.49968C0 10.0901 2.90923 12.9994 6.49968 12.9994C8.20272 12.9994 9.74952 12.3431 10.9088 11.2744V11.5932C10.9088 11.6932 10.9495 11.7869 11.0182 11.8588L15.0493 15.8898C15.1961 16.0367 15.4336 16.0367 15.5805 15.8898L15.8898 15.5805C16.0367 15.4336 16.0367 15.1961 15.8898 15.0493ZM6.49968 11.9994C3.45921 11.9994 0.999951 9.54016 0.999951 6.49968C0.999951 3.45921 3.45921 0.999951 6.49968 0.999951C9.54016 0.999951 11.9994 3.45921 11.9994 6.49968C11.9994 9.54016 9.54016 11.9994 6.49968 11.9994Z"
                                        ></path>
                                    </svg>
                                </div>

                                <input
                                    v-model="search"
                                    type="text"
                                    placeholder="Search by title"
                                    class="w-full px-8 py-3 text-sm bg-gray-100 border-transparent rounded-md md:w-2/6 focus:border-gray-500 focus:bg-white focus:ring-0"
                                />
                            </div>

                            <div class="flex justify-between mt-4">
                                <p class="font-medium">Filters</p>

                                <Link
                                    :href="route('admin.tags.index')"
                                    class="px-4 py-2 text-sm font-medium text-gray-800 bg-gray-100 rounded-md hover:bg-gray-200"
                                >
                                    Reset Filter
                                </Link>
                            </div>

                            <div>
                                <div
                                    class="flex justify-between mt-4 space-x-4"
                                >
                                    <select
                                        v-model="orderBy"
                                        @change="getData"
                                        class="w-full px-4 py-3 text-sm bg-gray-100 border-transparent rounded-md focus:border-gray-500 focus:bg-white focus:ring-0"
                                    >
                                        <option value="ASC">Asc</option>
                                        <option value="DESC">Desc</option>
                                    </select>

                                    <select
                                        v-model="perPage"
                                        @change="getData"
                                        class="w-full px-4 py-3 text-sm bg-gray-100 border-transparent rounded-md focus:border-gray-500 focus:bg-white focus:ring-0"
                                    >
                                        <option value="5">5 Per Page</option>
                                        <option value="10">10 Per Page</option>
                                        <option value="15">15 Per Page</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="w-full overflow-x-auto bg-white">
                            <table class="w-full">
                                <thead>
                                    <tr
                                        class="font-semibold tracking-wide text-left text-gray-900 uppercase bg-gray-100 border-b border-gray-600 text-md"
                                    >
                                        <th class="px-4 py-3">Name</th>
                                        <th class="px-4 py-3">Slug</th>
                                        <th class="px-4 py-3">Manage</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    <tr
                                        class="text-gray-700"
                                        v-for="tag in tags.data"
                                        :key="tag.id"
                                    >
                                        <td class="px-4 py-3 border">
                                            {{ tag.name }}
                                        </td>
                                        <td
                                            class="px-4 py-3 text-sm font-semibold border"
                                        >
                                            {{ tag.slug }}
                                        </td>

                                        <td
                                            class="flex px-4 py-3 text-sm border"
                                        >
                                            <Link
                                                :href="
                                                    route(
                                                        'admin.tags.edit',
                                                        tag.id
                                                    )
                                                "
                                                title="Edit"
                                            >
                                                <PencilSquareIcon
                                                    class="w-8 h-8 p-2 mx-1 text-white bg-green-500 rounded-md hover:bg-green-700"
                                                    title="Edit"
                                                />
                                            </Link>
                                            <Link
                                                :href="
                                                    route(
                                                        'admin.tags.destroy',
                                                        tag.id
                                                    )
                                                "
                                                method="delete"
                                                as="button"
                                                type="button"
                                                title="Delete"
                                            >
                                                <TrashIcon
                                                    class="w-8 h-8 p-2 mx-1 text-white bg-red-500 rounded-md hover:bg-red-700"
                                                />
                                            </Link>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="p-2 m-2">
                                <Pagination :links="tags.links" />
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </AdminLayout>
</template>
