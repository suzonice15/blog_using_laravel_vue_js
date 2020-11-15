<template>
    <div>
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h3>Category</h3>

                        </div>
                        <div class="col-sm-6">
                            <button class="btn btn-success">
                                <router-link to="/admin/category/create" style="color:white">Add Category</router-link>

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
                                <div id="example2_wrapper" class="container-fluid dt-bootstrap4">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table  class="table table-bordered table-hover"
                                                 >
                                                <thead>
                                                <tr role="row">
                                                     <th>Sl</th>
                                                     <th>Category Name</th>
                                                     <th>Created Date</th>
                                                     <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr v-for="(category,index) in getAllCategory" :key="category.category_id">
                                                    <td>{{++index}}</td>
                                                    <td> {{category.category_title}}</td>
                                                    <td> {{category.registered_date | dateformate}}</td>
                                                    <td>
                                                        <router-link :to="`/admin/category/edit/${category.category_id}`" class="btn btn-success">Edit</router-link>
                                                        <a href="" @click.prevent="CategoryDelete(category.category_id)" class="btn btn-danger">Delete</a>

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
              this.$store.dispatch("allcategory")
        },
        computed:{
            getAllCategory() {
          return this.$store.getters.getCategory
            }
        },
        methods:{
            CategoryDelete(id){
                axios.get('/admin/category/delete/'+id)
                    .then((response)=>{
                    this.$store.dispatch("allcategory")
                    Toast.fire({
                        icon: 'success',
                        title: 'Category  Deleted  successfully'
                    })
                })
            }

        }
    }
</script>

<style scoped>

</style>
