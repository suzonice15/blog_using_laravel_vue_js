export default {
    state: {
        category: [],
        post: [],
    },
    getters: {
        getCategory(state) {
            return state.category;
        },
        getPost(state) {
            return state.post;
        }
    },
    actions: {
        allcategory(context) {
            axios.get('/categories')
                .then((response) => {
                context.commit('categories', response.data.categories);

        });
        },
        allpost(context) {
            axios.get('/admin/posts/list')
                .then((response) => {
                context.commit('posts', response.data.posts);

        });
        }
    },
    mutations: {
        categories(state, data) {
            return state.category = data;

        },
        posts(state, data) {
            return state.post = data;

        }
    }
}
