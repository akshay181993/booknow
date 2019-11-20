<section class="content">
    <div class="container-fluid">
         
        <div class="block-header">
            <h2>Sales Manager</h2>
        	<a href="<?= base_url('add-cp-sm') ?>" class="btn btn-primary pull-right m-b-10 btn-lg">Add</a>
		</div>
        
		<!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            All Sales Manager
                        </h2>                           
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>#</th>      
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile No</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        if(!empty($all_sm)){
                                        $no = 0;
                                        foreach ($all_sm as $sm) {
                                        $no++;
                                     ?>
                                   <tr>
                                       <td><?= $no; ?></td>
                                       <td><?= $sm['name'] ?></td>
                                       <td><?= $sm['email'] ?></td>
                                       <td><?= $sm['mobile_no'] ?></td>
                                       <td>
                                            <a href="<?= base_url('edit-cp-sm/'.$sm['id']) ?>">
                                                <i class="material-icons text-primary" role="button" data-toggle="tooltip" title="Edit" data-placement='bottom'>create</i>
                                            </a>
                                            <i class="material-icons text-danger" role="button" data-toggle="tooltip" title="Delete" data-placement='bottom' onclick="DeleteAll('<?= base_url() ?>','<?= $sm['id'] ?>','users_tbl')">delete</i>
                                        <?php if($sm['status'] == 1){ ?>
                                                <i class="material-icons text-danger" role="button" data-toggle="tooltip" title="Deactive" data-placement='bottom' onclick="Status_update('<?= base_url() ?>','<?= $sm['id'] ?>','deactive','users_tbl')">block</i>
                                            <?php }else{ ?>
                                                <i class="material-icons text-success" role="button" data-toggle="tooltip" title="Active" data-placement='bottom' onclick="Status_update('<?= base_url() ?>','<?= $sm['id'] ?>','active','users_tbl')">check</i>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php }} ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples --> 
    </div> 
</section>