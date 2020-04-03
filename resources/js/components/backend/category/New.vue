<template>
    <div class="card">
        <div class="card-header">
            <h3>Category</h3>
        </div>
        <div class="card-body">
            <h4 class="card-title">Add New Category</h4>
            <div class="basic-form">
                <form class="mt-5" @click.prevent="addCategory()">
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" class="form-control" name="cat_name" v-model="form.cat_name" :class="{ 'is-invalid': form.errors.has('cat_name') }" placeholder="Category Name">
                        <has-error :form="form" field="cat_name"></has-error>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-primary ml-auto mr-3">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data()
    {
        return {
            form: new Form({
                cat_name: '',
            })
        }
    },
    methods:
    {
        addCategory(){
            this.form.post('/add-category')
                .then((response)=>{
                    this.$router.push('category-list')
                    //console.log(response.data)
                })
        }
    }
}
</script>
