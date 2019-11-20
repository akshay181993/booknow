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
                         <form id="editlayout_form" action="<?= base_url('save-layout') ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="type" id="type" value="update">
                            <input type="hidden" name="id" value="<?= $layout_data[0]['id'] ?>">
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
                                                    <option value="<?= $project['id'] ?>" <?php if($layout_data[0]['project_id'] == $project['id']){echo 'selected="selected"';} ?>><?= $project['project_name'] ?></option>
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
                                            <input type="file" class="form-control date"  name="project_layout" id="project_layout">
                                            <input type="hidden" name="image" value="<?= $layout_data[0]['layout']; ?>">
                                        </div>
                                        <span class="errors"><?= $this->session->flashdata('project_layout') ?></span>
                                    </div>
                                </div>
                               <div class="col-sm-4">
                                   <img src="<?= base_url('public/uploads/'.$layout_data[0]['layout']) ?>" width='50' height='50'>
                               </div>
                            </div>
                            <div class="form-group">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary btn-lg">UPDATE</button>
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