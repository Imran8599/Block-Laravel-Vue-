<template>
    <div class="card">
        <div class="card-header">
            <h3>Post</h3>
        </div>
        <div class="card-body">
            <h4 class="card-title">Add New Post</h4>
            <div class="basic-form">
                <form role="form" class="mt-5" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="cat_id">Post Category</label>
                        <select class="form-control" name="cat_id" id="cat_id" v-model="form.cat_id" :class="{ 'is-invalid': form.errors.has('cat_id') }">
                            <option value="" disabled>Select Category</option>
                            <option v-for="category in allCategory" :key="category.id" :value="category.id">{{category.cat_name}}</option>
                        </select>
                        <has-error :form="form" field="cat_id"></has-error>
                    </div>
                    <div class="form-group">
                        <label for="title">Post Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Post Title" v-model="form.title" :class="{ 'is-invalid': form.errors.has('title') }">
                        <has-error :form="form" field="title"></has-error>
                    </div>
                    <div class="form-group">
                        <label for="description">Post Description</label>
                        <textarea class="form-control" name="description" id="description" placeholder="Post Description" rows="6" v-model="form.description" :class="{ 'is-invalid': form.errors.has('description') }"></textarea>
                        <has-error :form="form" field="description"></has-error>
                    </div>
                    <div class="form-group">
                        <label for="photo">Post Photo</label>
                        <input type="file" class="form-control" name="photo" id="photo" @change="changePhoto($event)" :class="{ 'is-invalid': form.errors.has('photo') }">
                        <has-error :form="form" field="photo"></has-error>
                    </div>
                        <img v-if="form.photo!=''" :src="form.photo" alt="" width="300px" height="175px">

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
                cat_id: '',
                title: '',
                description: '',
                photo: ''
            })
        }
    },
    mounted()
    {
        this.$store.dispatch('getAllCategory')
    },
    computed:
    {
        allCategory(){
            return this.$store.getters.getCategory
        }
    },
    methods:
    {
        addPost()
        {
            this.form.post('/add-post')
                .then((response)=>{
                    Toast.fire({
                        icon: 'success',
                        title: 'Post added successfully.'
                    })
                    this.$router.push('/post-list')
                })
        },

        changePhoto(event)
        {
            console.log('success');
            let file = event.target.files[0];
            let reader = new FileReader();
            reader.onload = event => {
                this.form.photo = event.target.result
            };
            reader.readAsDataURL(file);
        }
    }
}
</script>