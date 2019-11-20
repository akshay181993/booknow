<section class="content">
    <div class="container-fluid">
         <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Add Flats
                        </h2>
                    </div>
                    <div class="body">
                        <form method="POST" id="editflats_form">
                            <input type="hidden" name="type" value="update">
                            <input type="hidden" name="id" value="<?php if(isset($get_flat[0]['id'])){echo $get_flat[0]['id']; } ?>">
                            <input type="hidden" id="building_id" name="building_id" value="<?php if(isset($get_flat[0]['building_id'])){echo $get_flat[0]['building_id']; } ?>">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">location_city</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control date" placeholder="Enter Flat No" name="flat_no" id="flat_no" value="<?php if(isset($get_flat[0]['flat_no'])){ echo $get_flat[0]['flat_no'];} ?>">
                                        </div>
                                        <span class="errors" id="flat_no_err1"></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">home</i>
                                        </span>
                                        <div class="form-line" style="z-index: 4;">
                                            <select class="form-control show-tick" name="view" id="view">
                                                <option value="">-- Please Select View --</option>
                                                <option value="Podium" <?php if("Podium" == $get_flat[0]['flat_view']){echo "selected";} ?>>Podium View</option><option value="Non Podium" <?php if("Non Podium" == $get_flat[0]['flat_view']){echo "selected";} ?>>Non Podium View</option>
                                            </select>
                                            
                                        </div>
                                        <span class="errors" id="view_err1"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">home</i>
                                        </span>
                                        <div class="form-line" style="z-index: 4;">
                                            <select class="form-control show-tick" name="project_name" id="project_name" onchange="getBuildings('<?= base_url() ?>')">
                                                <option value="">-- Please Select Project --</option>
                                                <?php if(!empty($all_projects)){ $no = 1;
                                                    foreach ($all_projects as $project) {
                                                        
                                                ?>
                                                <option value="<?= $project['id'] ?>" <?php if($project['id'] == $get_flat[0]['project_id']){echo "selected";} ?>><?= $project['project_name'] ?></option>
                                                <?php }} ?>
                                            </select>
                                            
                                        </div>
                                        <span class="errors" id="project_name_err"></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">home</i>
                                        </span>
                                        <div class="form-line" style="z-index: 3;">
                                            <select class="form-control show-tick" name="building_name" id="building_name">
                                                
                                            </select>
                                        </div>
                                        <span class="errors" id="building_name_err1"></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">location_city</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control date" placeholder="Enter Floor No" name="floor_number" id="floor_number" value="<?php if(isset($get_flat[0]['floor_number'])){ echo $get_flat[0]['floor_number'];} ?>">
                                        </div>
                                        <span class="errors" id="floor_number1"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">home</i>
                                        </span>
                                        <div class="form-line" style="z-index: 3;">
                                            <select class="form-control show-tick" name="flat_type" id="flat_type">
                                                <option value="2 BHK" <?php if("2 BHK" == $get_flat[0]['flat_type']){echo "selected";} ?>>2 BHK</option>
                                                <option value="3 BHK" <?php if("3 BHK" == $get_flat[0]['flat_type']){echo "selected";} ?>>3 BHK</option>
                                            </select>
                                        </div>
                                        <span class="errors" id="flat_type_err1"></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">location_city</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control date" placeholder="Enter Flat Area" name="flat_area" id="flat_area" value="<?php if(isset($get_flat[0]['flat_area'])){ echo $get_flat[0]['flat_area'];} ?>">
                                        </div>
                                        <span class="errors" id="area_err1"></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">location_city</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control date" placeholder="Enter Flat Cost" name="flat_cost" id="flat_cost" value="<?php if(isset($get_flat[0]['flat_cost'])){ echo $get_flat[0]['flat_cost'];} ?>">
                                        </div>
                                        <span class="errors" id="cost_err1"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="pull-right">
                                    <button type="button" class="btn btn-primary btn-lg" onclick='SaveflatsData("<?= base_url() ?>","editflats_form","all-flats","save-flats")'>ADD</button>
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