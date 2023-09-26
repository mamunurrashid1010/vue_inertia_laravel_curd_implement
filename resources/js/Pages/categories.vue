<template>
    <app-layout>
        <Head title="Category" />
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Manage Category
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

                    <!--   category list   -->
                    <button @click="openModal()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3 float-right">Create New Category</button>
                    <h3 class="font-bold">Category List</h3>
                    <table class="table-fixed w-full">
                        <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 w-20">No.</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Description</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="row in data">
                            <td class="border px-4 py-2">{{ row.id }}</td>
                            <td class="border px-4 py-2">{{ row.name }}</td>
                            <td class="border px-4 py-2">{{ row.description }}</td>
                            <td class="border px-4 py-2">
                                <button @click="edit(row)" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1">Edit</button>
                                <button @click="deleteRow(row)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </app-layout>

</template>

<script>
import AppLayout from "../Layouts/AppLayout.vue";
import {Head} from "@inertiajs/vue3";

export default {
    name:'categories',
    props: ['data'],
    data(){
        return{
            editMode: false,
            isOpen: false,
            form: {
                name: null,
                description: null,
            },
        }
    },
    methods:{

    },
    components:{
        Head,
        AppLayout

    }
}
</script>

<style scoped>

</style>
