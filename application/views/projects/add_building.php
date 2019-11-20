<section class="content">
    <div class="container-fluid">
		  <!-- Input Group -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                             No. of Buildings ?
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
                                        <input type="text" class="form-control date" placeholder="Enter No. of buildings to add" name="no_of_buildings" id="no_of_buildings">
                                    </div>
                                    <span class="errors" id="no_of_buildings_err"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <button type="button" class="btn btn-primary btn-lg" onclick="GenerateRows('no_of_buildings','buildingsrows')">GENERATE</button>     
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
                            Add Building
                        </h2>
                    </div>
                    <div class="body">
                        <form method="POST" id="addbuilding_form">
                            <input type="hidden" name="type" value="insert">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="material-icons">home</i>
                                        </div>
                                        <div class="form-line" style="z-index: 3">
                                            <select class="form-control show-tick" name="project_name" id="project_name">
                                                <option value="">-- Please Select Project --</option>
                                                <?php if(!empty($all_projects)){
                                                    foreach ($all_projects as $project) {
                                                 ?>
                                                 <option value="<?= $project['id'] ?>"><?= $project['project_name'] ?></option>
                                                 <?php }} ?>
                                            </select>
                                        </div>
                                        <span class="errors" id="project_name_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix" id="addrandomb">
                            </div> 
                            <div class="form-group">
                                <div class="pull-right">
                                    <button type="button" class="btn btn-primary btn-lg" onclick='SaveBuildings("<?= base_url() ?>","addbuilding_form","all-buildings","save-buildings")'>ADD</button>
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