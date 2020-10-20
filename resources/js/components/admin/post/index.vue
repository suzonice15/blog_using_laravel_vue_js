<template>
    <div>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3>Post</h3>

                    </div>
                    <div class="col-sm-6">
                        <button class="btn btn-success">
                            <router-link to="/admin/post/create" style="color:white">Add Post</router-link>

                        </button>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example2_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <table  class="table table-bordered table-hover  "
                                        >
                                            <thead>
                                            <tr role="row">
                                                <th>Sl</th>
                                                <th>Post Name</th>
                                                <th>Created Date</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr v-for="(post,index) in getAllPost" :key="post.post_id">
                                                <td>{{++index}}</td>
                                                <td> {{post.post_title}}</td>
                                                <td> {{post.created_time | dateformate}}</td>
                                                <td>
                                                    <router-link :to="`/admin/post/edit/${post.post_id}`" class="btn btn-success">Edit</router-link>
                                                    <a href="" @click.prevent="CategoryDelete(post.post_id)" class="btn btn-danger">Delete</a>

                                                </td>

                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

</template>

<script>
    export default {
        name: "index",
        mounted(){
            this.$store.dispatch("allpost")
        },
        computed:{
            getAllPost() {
                return this.$store.getters.getPost
            }
        },
        methods:{
            CategoryDelete(id){
                axios.get('/admin/post/delete/'+id)
                    .then((response)=>{
                    this.$store.dispatch("allpost")
                    Toast.fire({
                        icon: 'success',
                        title: 'Post  Deleted  successfully'
                    })
                })
            }

        }
    }
</script>

<style scoped>

</style>
