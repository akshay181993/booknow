<!DOCTYPE html>
<html>
<head>
	<title>Megapolis | Check Availability</title>
	<link href="<?= base_url() ?>public/assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/client_assets/css/availability.css">
</head>
<body>
	<div class="overflow" id="overlay">
		<svg width="100%"  height="110px"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-flickr" style="background: none;    top: 40%;position: absolute;"><circle ng-attr-cx="{{config.cx1}}" cy="50" ng-attr-fill="{{config.c1}}" ng-attr-r="{{config.radius}}" cx="61.9715" fill="#ed7d2f" r="20"><animate attributeName="cx" calcMode="linear" values="30;70;30" keyTimes="0;0.5;1" dur="1" begin="-0.5s" repeatCount="indefinite"></animate></circle><circle ng-attr-cx="{{config.cx2}}" cy="50" ng-attr-fill="{{config.c2}}" ng-attr-r="{{config.radius}}" cx="38.0285" fill="#337ab7" r="20"><animate attributeName="cx" calcMode="linear" values="30;70;30" keyTimes="0;0.5;1" dur="1" begin="0s" repeatCount="indefinite"></animate></circle><circle ng-attr-cx="{{config.cx1}}" cy="50" ng-attr-fill="{{config.c1}}" ng-attr-r="{{config.radius}}" cx="61.9715" fill="#ed7d2f" r="20"><animate attributeName="cx" calcMode="linear" values="30;70;30" keyTimes="0;0.5;1" dur="1" begin="-0.5s" repeatCount="indefinite"></animate><animate attributeName="fill-opacity" values="0;0;1;1" calcMode="discrete" keyTimes="0;0.499;0.5;1" ng-attr-dur="{{config.speed}}s" repeatCount="indefinite" dur="1s"></animate></circle></svg>
</div>
  <div class="tile">
  <div class="tile-header">
    <h2 style="color: #000; font-size: 2rem; display: flex; justify-content: center; align-items: center; height: 100%;">Flat Booking Availability</h2>
  </div>
  <!-- <hr> -->
  <div class="tile-body">
  	<form id="form">
	   	<div class="row form-group">
	   		<div class="col-md-3">
		      	<label class="form-input">Project</label>
		      	<select class="form-control" name="project_name" id="project_name" onchange="getBuildings('<?= base_url() ?>');">
					<option value="">Select Project</option>
					<?php 
						if(!empty($all_projects)){
							foreach ($all_projects as $project) {
						?>
							<option value="<?= $project['id'] ?>"><?= $project['project_name'] ?></option>
					<?php }} ?>
				</select>
	   		</div>
	   		<div class="col-md-3">
		      	<label class="form-input">Building</label>
		        <select class="form-control" name="building_name" id="building_name">
		        	<option value="">Select Building</option>
		        </select>
	   		</div>
	   		<div class="col-md-3">
		      	<label class="form-input">Flat Type</label>
		        <select class="form-control" name="flat_type" id="flat_type">
		        	<option value="">Select Flat Type</option>
		        </select>
	   		</div>
	   		<div class="col-md-3">
		      	<label class="form-input">Flat View</label>
		        <select class="form-control" name="flat_view" id="flat_view">
		        	<option value="">Select Flat View</option>
		        	<option value="Amenities" selected="selected">Amenities</option>
		        	<option value="Non Amenities">Non Amenities</option>
		        	<option value="Hill View">Hill View</option>
		        </select>
	   		</div>	
	   	</div>
   		<div class="row">
   			<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
   				<center>
   					<button class="btn" style="background: #68d8d6;" type="button" onclick="ChangeFlatStructure()"><h6>Check Availability</h6></button>
   				</center>
   			</div>
   		</div>
   	</form>
   		<div class="row">
   			<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
   				<center>
   					<h5>Available Flats : -206 (218)</h5>
   				</center>
   			</div>
   		</div>
   		<hr>
	   	<div class="row">
	   		<div class="col-md-4">
	   			<i class="material-icons available">business</i>
	   			<label class="hint">Available Flat</label>
	   		</div>
	   		<div class="col-md-4">
	   			<i class="material-icons booked">business</i>
	   			<label class="hint">Booked Flat</label>
	   		</div>
	   		<div class="col-md-4">
	   			<i class="material-icons disabled">business</i>
	   			<label class="hint">Disabled</label>
	   		</div>
	   	</div>
	   	<hr>
	   	<div class="row">
	   		<div class="col-md-4">
	   			<h4>Floors</h4>
	   		</div>
	   		<div class="col-md-4">
	   			<h4>Available Flats</h4>
	   		</div>
	   	</div>
	   	<div class="row">
	   		<div class="ScrollStyle" id="style-2">
		   	
	   			
	   		</div>
	   	</div>
	   	<div class="row">
	   		<div class="col-md-8 col-md-push-4">
   				<span style="font-size: 25px;margin-right: 33px;">(01)</span>
	   			<span style="font-size: 25px;margin-right: 33px;">(02)</span>
	   			<span style="font-size: 25px;margin-right: 33px;">(03)</span>	
	   			<span style="font-size: 25px;margin-right: 33px;">(04)</span>
	   		</div>
	   	</div>
   
  </div>
</div>
	<script src="<?= base_url() ?>public/assets/plugins/jquery/jquery.min.js"></script>
	<script src="<?= base_url() ?>public/assets/js/pages/ui/tooltips-popovers.js"></script>
	<script src="<?= base_url() ?>public/assets/plugins/bootstrap/js/bootstrap.js"></script>
 	<script type="text/javascript" src="<?= base_url() ?>public/client_assets/js/availability.js"></script>
 

</body>
</html>