<section class="content">
    <div class="container-fluid">
        <div class="block-header">
        	<a href="<?= base_url('add-building') ?>" class="btn btn-primary pull-right m-b-10 btn-lg">Add Building</a>
		</div>
		<!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            All Buildings
                        </h2>                           
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>#</th>      
                                        <th>Project Name</th>
                                        <th>Building Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    if (!empty($all_buildings)) {
                                        $no = 0;
                                        foreach ($all_buildings as $building) {
                                            $no++;
                                    ?>
                                       <tr>
                                           <td><?= $no ?></td>
                                           <td><?= $building['project_name'] ?></td>
                                           <td><?= $building['building_name'] ?></td>
                                           <td>
                                                <a href="<?= base_url() ?>edit-building/<?= $building['id'] ?>">
                                                    <i class="material-icons text-primary" role="button" data-toggle="tooltip" title="Edit" data-placement='bottom'>create</i>
                                                </a>
                                                <i class="material-icons text-danger" role="button" data-toggle="tooltip" title="Delete" data-placement='bottom' onclick="DeleteAll('<?= base_url() ?>','<?= $building['id'] ?>','buildings_tbl')">delete</i>
                                                <?php if($building['status'] == 1){ ?>
                                                <i class="material-icons text-danger" role="button" data-toggle="tooltip" title="Deactive" data-placement='bottom' onclick="Status_update('<?= base_url() ?>','<?= $building['id'] ?>','deactive','buildings_tbl')">block</i>
                                                <?php }else{ ?>
                                                <i class="material-icons text-success" role="button" data-toggle="tooltip" title="Active" data-placement='bottom' onclick="Status_update('<?= base_url() ?>','<?= $building['id'] ?>','active','buildings_tbl')">check</i>
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