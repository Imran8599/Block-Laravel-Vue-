<template>
    <div class="card">
        <div class="card-header">
            <h3>Post</h3>
        </div>
        <div class="card-body">
            <div class="card-title">
                <div class="row">
                    <h4>List</h4>
                    <router-link to="/add-post" class="btn btn-primary ml-auto">Add Post</router-link>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Detail</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(post,index) in getPost" :key="post.id">
                            <td>{{index+1}}</td>
                            <td v-if="post.user">{{post.user.name}}</td>
                            <td v-if="post.category">{{post.category.cat_name}}</td>
                            <td v-if="post.title">{{post.title | limit(20,'...')}}</td>
                            <td v-if="post.description">{{post.description | limit(30,'...')}}</td>
                            <td v-if="post.photo"><img :src="img(post.photo)" alt="" width="75" height="55"></td>
                            <td><a href="#">Edit</a> | <a href="#">Delete</a></td>
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
    mounted()
    {
        this.$store.dispatch('getPost')
    },
    computed:
    {
        getPost(){
            return this.$store.getters.getPost;
        }
    },
    methods:
    {
        img(img)
        {
            return 'img/'+img;
        }
    }
}
</script>