<section class="content">
    <div class="container-fluid">
        <div class="block-header">
        	<a type="button" data-toggle="collapse" data-target="#collapseproject" aria-expanded="false" aria-controls="collapseproject" class="btn btn-primary pull-right m-b-10 btn-lg">Add Project</a>
		</div>
		<!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="collapse m-b-10" id="collapseproject">
                    <div class="card">
                        <div class="header">
                            <h2>Add Project</h2>
                        </div>
                        <div class="body">
                             <form id="addproject_form" method="POST">
                                <input type="hidden" name="type" value="insert">
                                <input type="hidden" name="table" value="projects_tbl">
                                <input type="hidden" name="rules" value="projects_rules">
                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">home</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control date" placeholder="Project Name" name="project_name" id="project_name">
                                            </div>
                                            <span class="errors" id="project_name_err"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">place</i>
                                            </span>
                                            <div class="form-line">
                                        <select class="form-control show-tick" name="city_name" id="city_name">
                                            <option value="">-- Please select City --</option>
                                            <option value="Pune">Pune</option>
                                        </select>
                                    </div>
                                        <span class="errors" id="city_name_err"></span>
                                    </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">streetview</i>
                                            </span>
                                            <div class="form-line">
                                        <select class="form-control show-tick" name="location" id="location">
                                            <option value="">-- Please select Location --</option>
                                            <option value="Hinjewadi">Hinjewadi</option>
                                        </select>
                                    </div>
                                        <span class="errors" id="location_err"></span>
                                    </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="pull-right">
                                        <button type="button" onclick='SaveData("<?= base_url() ?>","addproject_form","all-projects")' class="btn btn-primary btn-lg">ADD</button>
                                        <button type="button" class="btn btn-default btn-lg" onclick="window.location.reload();">CANCEL</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="header">
                        <h2>
                            All Projects
                        </h2>                           
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>#</th>      
                                        <th>Project Name</th>
                                        <th>City</th>
                                        <th>Location</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($all_projects)){
                                        $no = 1;
                                        foreach ($all_projects as $project) {
                                            $no++;
                                     ?>
                                       <tr>
                                           <td><?= $no; ?></td>
                                           <td><?= $project['project_name'] ?></td>
                                           <td><?= $project['city_name'] ?></td>
                                           <td><?= $project['location'] ?></td>
                                           <td>
                                                <a href="<?= base_url()?>edit-project/<?= $project['id'] ?>">
                                                    <i class="material-icons text-primary" role="button" data-toggle="tooltip" title="Edit" data-placement='bottom'>create</i>
                                                </a>
                                                <i class="material-icons text-danger" role="button" data-toggle="tooltip" title="Delete" data-placement='bottom' onclick="DeleteAll('<?= base_url() ?>','<?= $project['id'] ?>','projects_tbl')">delete</i>
                                                <?php if($project['status'] == 1){ ?>
                                                    <i class="material-icons text-danger" role="button" data-toggle="tooltip" title="Deactive" data-placement='bottom' onclick="Status_update('<?= base_url() ?>','<?= $project['id'] ?>','deactive','projects_tbl')">block</i>
                                                <?php }else{ ?>
                                                    <i class="material-icons text-success" role="button" data-toggle="tooltip" title="Active" data-placement='bottom' onclick="Status_update('<?= base_url() ?>','<?= $project['id'] ?>','active','projects_tbl')">check</i>
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