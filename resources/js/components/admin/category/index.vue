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
                                <div id="example2_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table  class="table table-bordered table-hover  "
                                                 >
                                                <thead>
                                                <tr role="row">
                                                     <th>Sl</th>
                                                     <th>Category Name</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>Gecko</td>
                                                    <td>Firefox 1.0</td>

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
        name: "index"
    }
</script>

<style scoped>

</style>
