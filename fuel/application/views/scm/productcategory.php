

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Product Category
            <img data-toggle="modal" data-target="#modal-default" src="<?php echo base_url(); ?>/assets/images/add.png" height="30" width="30"  alt="Create"/>

        </h1>
        <ol class="breadcrumb">
            <li><a href="/krishisanskar/scm/home"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#" class="active">Product Category</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">          
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Created Date</th>
                                    <th>Created By</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($productCategory as $row): ?>                    
                                    <tr>
                                        <td><?php echo $row->Name; ?></td>
                                        <td><?php echo $row->Description; ?></td>
                                        <td><?php echo $row->CreatedDate; ?></td>
                                        <td><?php echo $row->CreatedBy; ?></td>
                                    </tr>                    
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Created Date</th>
                                    <th>Created By</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Create Product Category</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('scm/productcategory/create'); ?>
                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Name" maxlength="100">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" id="exampleInputPassword1" placeholder="Description" maxlength="500"></textarea>
                    </div>                
                </div>
                <!-- /.box-body -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


