<section class="content">
    <div class="container-fluid">
		  <!-- Input Group -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                             No. of Flats ?
                        </h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">  
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">location_city</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control date" placeholder="Enter total No. of flats to add per floor" name="no_of_flats" id="no_of_flats">
                                    </div>
                                    <span class="errors" id="no_of_flats_err"></span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">location_city</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control date" placeholder="Total Floors" name="no_of_floors" id="no_of_floors">
                                    </div>
                                    <span class="errors" id="no_of_floors_err"></span>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="input-group">
                                    <button type="button" class="btn btn-primary btn-lg" onclick="GenerateFlats()">GENERATE</button>     
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!-- #END# Input Group -->

         <div class="row clearfix" style="display: none;" id="buildingsrows">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Add Flats
                        </h2>
                    </div>
                    <div class="body">
                        <form method="POST" id="addflats_form">
                            <input type="hidden" name="type" value="insert">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">home</i>
                                        </span>
                                        <div class="form-line" style="z-index: 3;">
                                            <select class="form-control show-tick" name="project_name" id="project_name" onchange="getBuildings('<?= base_url() ?>')">
                                                <option value="">-- Please Select Project --</option>
                                                <?php if(!empty($all_projects)){ $no = 1;
                                                    foreach ($all_projects as $project) {
                                                        
                                                ?>
                                                <option value="<?= $project['id'] ?>"><?= $project['project_name'] ?></option>
                                                <?php }} ?>
                                            </select>
                                            
                                        </div>
                                        <span class="errors" id="project_name_err"></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">home</i>
                                        </span>
                                        <div class="form-line" style="z-index: 3;">
                                            <select class="form-control show-tick" name="building_name" id="building_name">
                                                
                                            </select>
                                        </div>
                                        <span class="errors" id="building_name_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix" id="addrandomb">
                            </div>
                            <div class="form-group">
                                <div class="pull-right">
                                    <button type="button" class="btn btn-primary btn-lg" onclick='SaveflatsData("<?= base_url() ?>","addflats_form","all-flats","save-flats")'>ADD</button>
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