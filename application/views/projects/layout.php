<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Project Layout</h2>
        	<a href="<?= base_url('add-layout') ?>" class="btn btn-primary pull-right m-b-10 btn-lg">Add layout</a>
		</div>
        
		<!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            All Layouts
                        </h2>                           
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>#</th>      
                                        <th>Project</th>
                                        <th>Layout</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($all_layouts)){
                                        $no = 0;
                                        foreach ($all_layouts as $layout) {
                                         $no++;   
                                     ?>
                                   <tr>
                                       <td><?= $no; ?></td>
                                       <td><?= $layout['project_name']; ?></td>
                                       <td><img src="<?= base_url('public/uploads/'.$layout['layout']) ?>" height="50" width="50"></td>
                                       <td>
                                            <a href="<?= base_url('edit-layout/'.$layout['id']) ?>">
                                                <i class="material-icons text-primary" role="button" data-toggle="tooltip" title="Edit" data-placement='bottom'>create</i>
                                            </a>
                                            <i class="material-icons text-danger" role="button" data-toggle="tooltip" title="Delete" data-placement='bottom' onclick="DeleteAll('<?= base_url() ?>','<?= $layout['id'] ?>','layouts_tbl')">delete</i>
                                            <?php if($layout['status'] == 1){ ?>
                                                <i class="material-icons text-danger" role="button" data-toggle="tooltip" title="Deactive" data-placement='bottom' onclick="Status_update('<?= base_url() ?>','<?= $layout['id'] ?>','deactive','layouts_tbl')">block</i>
                                            <?php }else{ ?>
                                                <i class="material-icons text-success" role="button" data-toggle="tooltip" title="Active" data-placement='bottom' onclick="Status_update('<?= base_url() ?>','<?= $layout['id'] ?>','active','layouts_tbl')">check</i>
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