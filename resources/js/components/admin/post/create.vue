<template>
    <div>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Post</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><router-link to="/home">Home</router-link></li>
                            <li class="breadcrumb-item active">Post</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row  justify-content-center">
                    <!-- left column -->
                    <div class="col-md-11">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add New Post</h3>
                            </div>

                            <form role="form" @submit.prevent="addPost()">
                                <alert-error :form="form" message="There were some problems with your input."></alert-error>
                                <div class="card-body" @mousemove="folderCheck()">
                                    <div class="form-group">
                                        <label for="post_title">Post  Name</label>
                                        <input id="post_title" @input="seoUrl()" type="text" v-model="form.post_title" class="form-control" :class="{ 'is-invalid': form.errors.has('post_title') }" name="post_title" placeholder="Enter Post  Name">
                                        <has-error :form="form" field="post_title"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label for="post_name">Post  Parmalink</label>
                                        <input id="post_name" type="text" v-model="form.post_name" class="form-control" :class="{ 'is-invalid': form.errors.has('post_name') }" name="post_name" placeholder="Enter Post  Parmalink">
                                        <has-error :form="form" field="post_name"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label for="post_name">Folder </label>
                                        <input id="folder" type="text" v-model="form.folder" class="form-control"   name="post_name" >
                                     </div>
                                </div>


                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>


                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>

    </div>

</template>
<script>
    export default {
        name: "create",
        data(){
            return {
                form: new Form({
                    post_title: '',
                    post_name: '',
                    post_name_check: '',
                    folder:0,
                })
            }
        },
        methods:{
            addPost(){

                this.form.post('/admin/post/store')
                    .then((response)=> {
                    Toast.fire({
                        icon: 'success',
                        title: 'Post  Added  successfully'
                    })
                    this.$router.push('/admin/posts')
                })


            },
            folderCheck(){
                axios.get('/post-foldercheck')
                    .then((response)=>{
                       return this.form.folder=response.data;

                })
            },
            seoUrl(){

               var text=this.form.post_title;
                var word = text.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
                this.form.post_name=word;

                axios.post('/post-urlcheck', {
                    post_name: word,

                })
                    .then(function (response) {
                        if(response.data=='yes'){
                        this.form.post_name_check='es'
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });


    },addSep(){
                var post=this.form.post_name_check;
                return this.form.post_name=post + es;
            }

        }
    }
</script>

<style scoped>

</style>
