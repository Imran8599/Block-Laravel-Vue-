<template>
    <div class="card">
        <div class="card-header">
            <h3>Category</h3>
        </div>
        <div class="card-body">
            <h4 class="card-title">Edit Category</h4>
            <div class="basic-form">
                <form class="mt-5" @submit.prevent="updateCategory()">
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" class="form-control" name="cat_name" v-model="form.cat_name" :class="{ 'is-invalid': form.errors.has('cat_name') }" placeholder="Category Name">
                        <has-error :form="form" field="cat_name"></has-error>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-primary ml-auto mr-3">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:'Edit',
    mounted()
    {
        axios.get(`/edit-category/${this.$route.params.id}`)
            .then((response)=>{
                this.form.fill(response.data.row)
            })
    },
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
        updateCategory(){
            this.form.post(`/update-category/${this.$route.params.id}`)
                .then((response)=>{
                    Toast.fire({
                        icon: 'success',
                        title: 'Category update successfully.'
                    })
                    this.$router.push('/category-list')
                })
        }
    }
}
</script>
