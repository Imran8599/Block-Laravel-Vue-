export default {
    state:{
        //variables
        category:[],
    },
    getters:{
        //methods
        getCategory(state)
        {
            return state.category
        }
    },
    actions:{
        getAllCategory(context)
        {
            axios.get('/category')
            .then((response)=>{
                context.commit('allCategory',response.data.allCategor)
            });
        }
    },
    mutations:{
        allCategory(state,data)
        {
            return state.category = data
        }
    }
}