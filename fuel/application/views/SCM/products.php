
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Products
            <img data-toggle="modal" data-target="#modal-default" src="<?php echo base_url(); ?>/assets/images/add.png" height="30" width="30"  alt="Create"/>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#" class="active">Products</a></li>
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
                                    <th>Category</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Description</th>                  
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($products as $row): ?>                    
                                    <tr>
                                        <td><?php echo $row->Name; ?></td>
                                        <td><?php echo $row->Category; ?></td>
                                        <td><?php echo $row->Quantity; ?></td>
                                        <td><?php echo $row->Price; ?></td>
                                        <td><?php echo $row->Description; ?></td>                                         
                                    </tr>                    
                                <?php endforeach; ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Description</th>                  
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
                <h4 class="modal-title">Create Product</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('scm/products/create'); ?>
                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Name" maxlength="100">
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" class="form-control"> 
                         <option value="">Select...</option> 
                         <?php foreach ($productcategories as $row): ?> 
                           <?php echo "<option value='$row->Id'> $row->Name </option>"; ?>
                        <?php endforeach; ?>
                        </select>                        
                    </div>
                     <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="text" name="quantity" class="form-control" placeholder="Quantity" >
                    </div>
                     <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" class="form-control" placeholder="Price" >
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" placeholder="Description" maxlength="500"></textarea>
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

