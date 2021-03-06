export default {
    state:{
        //variables
        categorys:[],
        posts:[],
        post:[],
        latestPosts:[],
    },
    getters:{
        //Category method
        getCategory(state)
        {
            return state.categorys
        },
        //Post method
        getPost(state)
        {
            return state.posts
        },
        // Single Post
        singlePost(state)
        {
            return state.post
        },
        //Latest Posts
        latestPost(state)
        {
            return state.latestPosts;
        }
    },
    actions:{
        getAllCategory(context)
        {
            axios.get('/category')
                .then((response)=>{
                    context.commit('allCategory',response.data.allCategor)
                });
        },
        getPost(context)
        {
            axios.get('/post')
                .then((response)=>{
                    context.commit('getPost',response.data.posts)
                });
        },
        singlePost(context,id)
        {
            axios.get('/single-post/'+id)
            .then((response)=>{
                context.commit('singlePost',response.data.post)
            });
        },
        latestPost(context)
        {
            axios.get('latest-post')
                .then((response)=>{
                    context.commit('latestPost',response.data.posts)
                });
        },
        getCategoryPost(context,id)
        {
            axios.get('category-posts/'+id)
                .then((response)=>{
                    context.commit('categoryPost',response.data.category_posts)
                });
        },
        search(context,value)
        {
            axios.get('search?s='+value)
                .then((response)=>{
                    context.commit('search',response.data.search)
                });
        }
    },
    mutations:{
        allCategory(state,data)
        {
            return state.categorys = data;
        },
        getPost(state,data)
        {
            return state.posts = data;
        },
        singlePost(state,data)
        {
            return state.post = data;
        },
        latestPost(state,date)
        {
            return state.latestPosts = date;
        },
        categoryPost(state,data)
        {
            return state.posts = data;
        },
        search(state,data)
        {
            return state.posts = data;
        }
    }
}