<template>
    <div>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Category</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><router-link to="/home">Home</router-link></li>
                            <li class="breadcrumb-item active">Category</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row  justify-content-center">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add New Category</h3>
                            </div>

                            <form role="form" @submit.prevent="addCategory()">
                                <alert-error :form="form" message="There were some problems with your input."></alert-error>
                                 <div class="card-body">
                                    <div class="form-group">
                                        <label for="category_title">Category  Name</label>
                                        <input type="text" v-model="form.category_title" class="form-control" :class="{ 'is-invalid': form.errors.has('category_title') }" name="category_title" placeholder="Enter Category Name">
                                        <has-error :form="form" field="category_title"></has-error>
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
                    category_title: ''
                })
            }
        },
        methods:{
            addCategory(){
                this.form.post('/admin/category/store')
                    .then((response)=> {
                    Toast.fire({
                        icon: 'success',
                        title: 'Category  Added  successfully'
                    })
                      this.$router.push('/admin/categories')
                    })


             }
        }
    }
</script>

<style scoped>

</style>
