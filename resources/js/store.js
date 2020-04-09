export default {
    state:{
        //variables
        category:[],
        post:[],
    },
    getters:{
        //Category method
        getCategory(state)
        {
            return state.category
        },
        //Post method
        getPost(state)
        {
            return state.post
        },
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
        }
    },
    mutations:{
        allCategory(state,data)
        {
            return state.category = data;
        },
        getPost(state,data)
        {
            return state.post = data;
        }
    }
}