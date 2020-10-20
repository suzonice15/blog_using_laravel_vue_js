export default{
    state:{
        category:[],
    },
    getters:{
        getCategory(state){
return state.category;
        }
    },
    actions:{
        allcategory(context){
            axios.get('/categories')
                .then((response)=>{
                context.commit('categories',response.data.categories);

            });
        }
    },
    mutations:{
        categories(state,data){
            return state.category=data;

        }
    }
}
