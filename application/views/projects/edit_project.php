<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Projects</h2>        	
		</div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Edit Project
                            </h2>
                        </div>
                         <div class="body">
                            <form method="POST" id="editproject_form">
                                <input type="hidden" name="type" value="update">
                                <input type="hidden" name="table" value="projects_tbl">
                                <input type="hidden" name="rules" value="projects_rules">
                                <input type="hidden" name="id" value="<?php if(isset($get_project[0]['id'])){echo $get_project[0]['id'];} ?>">
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">home</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control date" placeholder="Project Name" name="project_name" id="project_name" value="<?php if(isset($get_project[0]['project_name'])){echo $get_project[0]['project_name'];} ?>">
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
                                        <option value="Pune" <?php if("Pune" == $get_project[0]['city_name']){ echo 'selected';} ?>>Pune</option>
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
                                        <option value="Hinjewadi" <?php if("Hinjewadi" == $get_project[0]['location']){ echo 'selected';} ?>>Hinjewadi</option>
                                    </select>
                                </div>
                                    <span class="errors" id="location_err"></span>
                                </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="pull-right">
                                    <button type="button" class="btn btn-primary btn-lg" onclick='SaveData("<?= base_url() ?>","editproject_form","all-projects")'>UPDATE</button>
                                    <button type="button" class="btn btn-default btn-lg" onclick="window.history.back();">CANCEL</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input Group -->
    </div> 
</section>