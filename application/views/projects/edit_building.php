<section class="content">
    <div class="container-fluid">

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Add Building
                        </h2>
                    </div>
                    <div class="body">
                        <form method="POST" id="editbuilding_form">
                            <input type="hidden" name="type" value="update">
                            <input type="hidden" name="id" value="<?php if(isset($get_building[0]['id'])){echo $get_building[0]['id'];} ?>">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="material-icons">home</i>
                                        </div>
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="project_name" id="project_name">
                                                <option value="">-- Please Select Project --</option>
                                                <?php if(!empty($all_projects)){
                                                    foreach ($all_projects as $project) {
                                                 ?>
                                                 <option value="<?= $project['id'] ?>" <?php if($project['id'] == $get_building[0]['project_id']){echo 'selected';} ?>><?= $project['project_name'] ?></option>
                                                 <?php }} ?>
                                            </select>
                                        </div>
                                        <span class="errors" id="project_name_err"></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">location_city</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control date" placeholder="Building Name" name="building_name" id="building_name" value="<?php if(isset($get_building[0]['building_name'])){echo $get_building[0]['building_name'];} ?>">
                                        </div>
                                        <span class="errors" id="building_name_err1"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="pull-right">
                                    <button type="button" class="btn btn-primary btn-lg" onclick='SaveBuildings("<?= base_url() ?>","editbuilding_form","all-buildings","save-buildings")'>UPDATE</button>
                                    <button type="button" class="btn btn-default btn-lg">CANCEL</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</section>