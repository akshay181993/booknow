  <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>
            <?php 
                if($user_count != false){
                    $cp_count = $sm_count = 0;
                    foreach ($user_count as $ucount) {
                        if($ucount['role'] == 'CP')
                        {
                            $cp_count =  $ucount['user_count'];
                        }
                        if($ucount['role'] == 'SM'){
                            $sm_count = $ucount['user_count'];
                        }
                    }
                    // var_dump($cp_count);die();
                }
             ?>
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">Total Bookings</div>
                            <div class="number count-to" data-from="0" data-to="<?= $all_bookings;?>" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">home</i>
                        </div>
                        <div class="content">
                            <div class="text">All Projects</div>
                            <div class="number count-to" data-from="0" data-to="<?= count($all_projects); ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">location_city</i>
                        </div>
                        <div class="content">
                            <div class="text">All Buildings</div>
                            <div class="number count-to" data-from="0" data-to="<?= $all_buildings; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">location_city</i>
                        </div>
                        <div class="content">
                            <div class="text">All Flats</div>
                            <div class="number count-to" data-from="0" data-to="<?= $all_flats;?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
            <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            All Sales Manager
                            <?php if($this->session->userdata('role') == 'admin'){ ?>
                                <a href="<?= base_url('add-cp-sm') ?>"><button class="btn btn-primary pull-right">Add</button></a> 
                            <?php } ?> 
                        </h2>      

                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>#</th>      
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile No</th>
                            <?php if($this->session->userdata('role') == 'admin'){ ?>
                                        <th>Action</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($all_cp)){
                                        $no = 0;
                                        foreach ($all_cp as $cp) {
                                            $no++;
                                     ?>
                                     <tr>
                                       <td><?= $no; ?></td>
                                       <td><?= $cp['name'] ?></td>
                                       <td><?= $cp['email'] ?></td>
                                       <td><?= $cp['mobile_no'] ?></td>
                            <?php if($this->session->userdata('role') == 'admin'){ ?>

                                       <td>
                                            <a href="<?= base_url('edit-cp-sm/'.$cp['id']) ?>">
                                                <i class="material-icons text-primary" role="button" data-toggle="tooltip" title="Edit" data-placement='bottom'>create</i>
                                            </a>
                                            <i class="material-icons text-danger" role="button" data-toggle="tooltip" title="Delete" data-placement='bottom' onclick="DeleteAll('<?= base_url() ?>','<?= $cp['id'] ?>','users_tbl')">delete</i>
                                            <?php 
                                                if($cp['status'] == 1){
                                             ?>
                                                <i class="material-icons text-danger" role="button" data-toggle="tooltip" title="Deactive" data-placement='bottom' onclick="Status_update('<?= base_url() ?>','<?= $cp['id'] ?>','deactive','users_tbl')">block</i>
                                            <?php }else{ ?>
                                                <i class="material-icons text-success" role="button" data-toggle="tooltip" title="Active" data-placement='bottom' onclick="Status_update('<?= base_url() ?>','<?= $cp['id'] ?>','active','users_tbl')">check</i>
                                            <?php } ?>
                                        </td>
                                        <?php } ?>
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
        </div>
    </div>
</section>