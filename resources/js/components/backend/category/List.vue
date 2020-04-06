<template>
    <div class="card">
        <div class="card-header">
            <h3>Category</h3>
        </div>
        <div class="card-body">
            <div class="card-title">
                <div class="row">
                    <h4>List</h4>
                    <router-link to="add-category" class="btn btn-primary ml-auto">Add Category</router-link>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(category,index) in allCategory" :key="category.id">
                            <th>{{index+1}}</th>
                            <td>{{category.cat_name}}</td>
                            <td>
                                <a href="#">Edit</a> | <a href="#">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:'List',
    mounted(){
        this.$store.dispatch('getAllCategory')
    },
    computed:{
        allCategory(){
            return this.$store.getters.getCategory
        }
    },
    methods:
    {

    }
}
</script>