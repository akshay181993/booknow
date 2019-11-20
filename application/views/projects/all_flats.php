<section class="content">
    <div class="container-fluid">
        <div class="block-header">
        	<a href="<?= base_url('add-flats') ?>" class="btn btn-primary pull-right m-b-10 btn-lg">Add Flats</a>
		</div>
		<!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            All Flats
                        </h2>                           
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>#</th> 
                                        <th>Flat</th>     
                                        <th>Project</th>
                                        <th>Building</th>
                                        <th>View</th>
                                        <th>Flat Type</th>
                                        <th>Area</th>
                                        <th>Cost</th>
                                        <th>Booked</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($all_flats))
                                        {
                                            $no = 0;
                                            foreach ($all_flats as $flats) {
                                                $no++;
                                     ?>
                                        
                                   <tr>
                                       <td><?= $no; ?></td>
                                       <td><?= $flats['flat_no'] ?></td>
                                       <td><?= $flats['project_name'] ?></td>
                                       <td><?= $flats['building_name'] ?></td>
                                       <td><?= $flats['flat_view'] ?></td>
                                       <td><?= $flats['flat_type'] ?></td>
                                       <td><?= $flats['flat_area'] ?></td>
                                       <td><?= $flats['flat_cost'] ?></td>
                                        <td>
                                           <div class="switch">
                                               <label>
                                                <form id="flatstatus_form" method="post">
                                                  <input type="checkbox" name="flat_status" id="flat_status<?= $flats['id'] ?>" <?=  ($flats['flat_status']=='Booked') ? "checked":"" ;?> onchange="UpdateFlatStatus('<?= base_url() ?>','<?= $flats['id'] ?>')"><span class="lever switch-col-red"></span>
                                                </form> 
                                               </label>
                                           </div>
                                       </td>
                                       <td>
                                            <a href="<?= base_url() ?>edit-flat/<?= $flats['id'] ?>">
                                                <i class="material-icons text-primary" role="button" data-toggle="tooltip" title="Edit" data-placement='bottom'>create</i>
                                            </a>
                                            <i class="material-icons text-danger" role="button" data-toggle="tooltip" title="Delete" data-placement='bottom' onclick="DeleteAll('<?= base_url() ?>','<?= $flats['id'] ?>','flats_tbl')">delete</i>
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