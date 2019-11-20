<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <a href="<?= base_url('booking-details') ?>"><button class="btn btn-primary pull-right m-b-10 btn-lg">Clear Filters</button></a>
            <a href="<?= base_url('export') ?>" id="exportbtn"><button class="btn btn-primary pull-right btn-lg m-l-10 m-r-10">Export</button></a>
        	<a type="button" data-toggle="collapse" data-target="#collapsefilters" aria-expanded="false" aria-controls="collapsefilters" class="btn btn-primary pull-right m-b-10 btn-lg">Filters</a>

		</div>
		<!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="collapse m-b-10" id="collapsefilters">
                    <div class="card">
                        <div class="header">
                            <h2>Filters</h2>
                        </div>
                        <div class="body">
                             <form action="<?= base_url('booking-details') ?>" id="fliter_form" method="GET">
                                <div class="row clearfix">
                                     <div class="col-sm-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">home</i>
                                            </span>
                                            <div class="form-line">
                                                <select class="form-control show-tick" name="project_name" id="project_name">
                                                    <option value="">-- Please select Project --</option>
                                                    <?php 
                                                        if(count($all_projects) >=1 )
                                                        {
                                                            foreach ($all_projects as $project) {
                                                     ?>
                                                        <option value="<?= $project['id'] ?>" <?php if($project['id'] == $this->input->get('project_name')) 
                                                        { echo "selected = 'selected'";} ?>><?= $project['project_name']  ?></option>
                                                     <?php }} ?>
                                                </select>
                                            </div>
                                            <span class="errors" id="project_err"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-daterange input-group" id="datepicker">
                                            <div class="form-line">
                                                <input type="text" class="input-sm form-control date" name="start_date" placeholder="Start Date" value="<?php if($this->input->get('start_date')){echo $this->input->get('start_date');} ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="input-daterange input-group" id="datepicker">
                                            <div class="form-line">
                                                <input type="text" class="input-sm form-control date" name="end_date" placeholder="End Date" value="<?php if($this->input->get('end_date')){echo $this->input->get('end_date');} ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary btn-lg" id="apply">APPLY</button>
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
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="bookingdata">
                                <thead>
                                    <tr>
                                        <th>#</th> 
                                        <th>RefID</th> 
                                        <th>CP Code</th>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Flat</th>     
                                        <th>Project</th>
                                        <th>Building</th>                    
                                        <th>Booking Status</th>                    
                                        <th>Payment Status</th>                    
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($all_bookedflats))
                                        {
                                            $no = 0;
                                            foreach ($all_bookedflats as $flats) {
                                                $no++;
                                     ?>
                                        
                                   <tr>
                                       <td><?= $no; ?></td>
                                       <td><?= $flats['tid'] ?></td>
                                       <td><?= $flats['agent_code'] ?></td>
                                       <td><?= $flats['customer_name'] ?></td>
                                       <td><?= $flats['customer_mobile'] ?></td>
                                       <td><?= $flats['customer_email'] ?></td>
                                       <td><?= $flats['flat_no'] ?></td>
                                       <td><?= $flats['project_name'] ?></td>
                                       <td><?= $flats['building_name'] ?></td>
                                       <td><?= $flats['booking_status'] ?></td>
                                       <td><?= $flats['payment_status'] ?></td>
                                       <td>
                                            <i class="material-icons text-danger" role="button" data-toggle="tooltip" title="Delete" data-placement='bottom' onclick="DeleteAll('<?= base_url() ?>','<?= $flats['id'] ?>','booked_flats_tbl')">delete</i>
                                            
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