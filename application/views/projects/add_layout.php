<section class="content">
    <div class="container-fluid">
        <div class="block-header">
           <h2>Layout</h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Add Layout</h2>
                    </div>
                    <div class="body">
                         <form id="addlayout_form" action="<?= base_url('save-layout') ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="type" id="type" value="insert">
                        
                            <div class="row clearfix">
                                 <div class="col-sm-4">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="material-icons">home</i>
                                        </div>
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="project_name" id="project_name">
                                                <option value="">-- Please select Project --</option>
                                               <?php if(!empty($all_projects)){ 
                                                    foreach ($all_projects as $project) {        
                                                ?>
                                                    <option value="<?= $project['id'] ?>"><?= $project['project_name'] ?></option>
                                               <?php }} ?>
                                            </select>
                                        </div>
                                        <span class="errors"><?= $this->session->flashdata('project_name') ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="material-icons">image</i>
                                        </div>
                                        <div class="form-line">
                                            <input type="file" class="form-control date"  name="project_layout" id="project_layout" required="required">
                                        </div>
                                        <span class="errors"><?= $this->session->flashdata('project_layout') ?></span>
                                    </div>
                                </div>
                               
                            </div>
                            <div class="form-group">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary btn-lg">ADD</button>
                                    <button type="button" class="btn btn-default btn-lg" onclick="window.location.reload();">CANCEL</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples --> 
    </div> 
</section>