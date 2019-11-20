<?php 
$MERCHANT_KEY = "IEpj1TUm"; //change  merchant with yours
$SALT = "pSwH7iYjoF";  //change salt with yours 
	        //optional udf values 
$PAYU_BASE_URL = "https://secure.payu.in";		// For Sandbox Mode
$action = $PAYU_BASE_URL . '/_payment';
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Megapolis | Flat Booking</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	
	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="<?= base_url()?>public/client_assets/css/style.css" />

	<link rel="stylesheet" type="text/css" href="https://fiddle.jshell.net/css/result-light.css">
	<link href="<?= base_url() ?>public/assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
	
	<link href="<?= base_url() ?>public/client_assets/css/custom.css" rel="stylesheet">
	<link href="<?= base_url() ?>public/client_assets/css/normalize.css" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="<?= base_url()?>public/client_assets/css/bootstrap.min.css" />

</head>

<style type="text/css"></style>

<body>
	<div class="overflow">
			<svg width="100%"  height="110px"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-flickr" style="background: none;    top: 40%;position: absolute;"><circle ng-attr-cx="{{config.cx1}}" cy="50" ng-attr-fill="{{config.c1}}" ng-attr-r="{{config.radius}}" cx="61.9715" fill="#ed7d2f" r="20"><animate attributeName="cx" calcMode="linear" values="30;70;30" keyTimes="0;0.5;1" dur="1" begin="-0.5s" repeatCount="indefinite"></animate></circle><circle ng-attr-cx="{{config.cx2}}" cy="50" ng-attr-fill="{{config.c2}}" ng-attr-r="{{config.radius}}" cx="38.0285" fill="#337ab7" r="20"><animate attributeName="cx" calcMode="linear" values="30;70;30" keyTimes="0;0.5;1" dur="1" begin="0s" repeatCount="indefinite"></animate></circle><circle ng-attr-cx="{{config.cx1}}" cy="50" ng-attr-fill="{{config.c1}}" ng-attr-r="{{config.radius}}" cx="61.9715" fill="#ed7d2f" r="20"><animate attributeName="cx" calcMode="linear" values="30;70;30" keyTimes="0;0.5;1" dur="1" begin="-0.5s" repeatCount="indefinite"></animate><animate attributeName="fill-opacity" values="0;0;1;1" calcMode="discrete" keyTimes="0;0.499;0.5;1" ng-attr-dur="{{config.speed}}s" repeatCount="indefinite" dur="1s"></animate></circle></svg>
	</div>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="booking-cta">
							<h1>Book your Home today</h1>
							<span class="control-label"></span>
							<select class="form-control" id="change">
								 <option value="" disabled selected>View Layout</option>
								<?php if(!empty($all_projects)){
									foreach ($all_projects as $project_layout) {								
								 ?>
								 <option class="changesrc" value="<?= $project_layout['project_name'] ?> Layout" data-img="<?= $project_layout['layout'] ?>"><?= $project_layout['project_name'] ?></option>
								 <?php }} ?>
							</select>
							<span class="select-arrow"></span>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="
							#instructions_modal">
							 View Instructions
							</button>
						</div>
					</div>
					<div class="col-md-7 col-md-offset-1">
						<div class="booking-form">
							<div class="stepwizard">
								<div class="stepwizard-row setup-panel">
									<div class="stepwizard-step col-xs-2"> 
										<a href="#step-1" id="step1" type="button" class="btn btn-success btn-circle">1</a>
										<p><small>User Details</small></p>
									</div>
									<div class="stepwizard-step col-xs-2"> 
										<a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled" id="step2">2</a>
										<p><small>OTP</small></p>
									</div>
									<div class="stepwizard-step col-xs-2"> 
										<a href="#step-3" id="step3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
										<p><small>Select Flat</small></p>
									</div>
									<div class="stepwizard-step col-xs-2"> 
										<a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
										<p><small>Payment</small></p>
									</div>
									
									</div>
								</div>
								<div class="loader" id="overlay">
						   			<svg width="100%"  height="110px"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-flickr" style="background: none;    top: 40%;position: absolute;"><circle ng-attr-cx="{{config.cx1}}" cy="50" ng-attr-fill="{{config.c1}}" ng-attr-r="{{config.radius}}" cx="61.9715" fill="#ed7d2f" r="20"><animate attributeName="cx" calcMode="linear" values="30;70;30" keyTimes="0;0.5;1" dur="1" begin="-0.5s" repeatCount="indefinite"></animate></circle><circle ng-attr-cx="{{config.cx2}}" cy="50" ng-attr-fill="{{config.c2}}" ng-attr-r="{{config.radius}}" cx="38.0285" fill="#337ab7" r="20"><animate attributeName="cx" calcMode="linear" values="30;70;30" keyTimes="0;0.5;1" dur="1" begin="0s" repeatCount="indefinite"></animate></circle><circle ng-attr-cx="{{config.cx1}}" cy="50" ng-attr-fill="{{config.c1}}" ng-attr-r="{{config.radius}}" cx="61.9715" fill="#ed7d2f" r="20"><animate attributeName="cx" calcMode="linear" values="30;70;30" keyTimes="0;0.5;1" dur="1" begin="-0.5s" repeatCount="indefinite"></animate><animate attributeName="fill-opacity" values="0;0;1;1" calcMode="discrete" keyTimes="0;0.499;0.5;1" ng-attr-dur="{{config.speed}}s" repeatCount="indefinite" dur="1s"></animate></circle></svg>
								</div>
									<div class="panel panel-primary setup-content" id="step-1">
										<div class="panel-heading">
											<h3 class="panel-title">User Details</h3>
										</div>	
										<form id="user-form" method="POST">
											<div class="panel-body">
												<div class="form-group">
													<label class="control-label"> Name</label>
													<input type="text" name="name" id="name" required="required" class="form-control" placeholder="Enter First Name" />
												</div>
												<div class="form-group">
													<label class="control-label">Mobile</label>
													<input type="text" required="required" class="form-control" name="mobile_no" id="mobile_no" placeholder="Enter Last Name" />
												</div>
												<div class="form-group">
													<label class="control-label"> Email</label>
													<input type="email" required="required" class="form-control" name="email" id="email" placeholder="Enter Last Name" />
												</div>

												<label for="chkPassport">
													<input type="checkbox" id="chkPassport" name="agentchk" value="1" />
													Do you have CP code?
												</label>
												<div id="dvPassport" style="display: none">
													<div class="form-group">
														<label class="control-label"> CP code</label>
														<input type="text" class="form-control" placeholder="Enter CP Code" name="token" id="token" />
													</div>
												</div>

												<button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
											</div>
										</form>
									</div>


									<div class="panel panel-primary setup-content" id="step-2">
										<div class="panel-heading">
											<h3 class="panel-title">OTP</h3>
										</div>
										<form id="otp-form" method="POST">
											<div class="panel-body">
												<span id="otp-sent" class="text-success"></span>
												<div class="form-group">
													<label class="control-label">Enter OTP</label>
													<input type="text" required="required" class="form-control" placeholder="Enter OTP" name="otp" id="otp"/>
												</div>

												<button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
											</div>
										</form>
									</div>
									
									<div class="panel panel-primary setup-content" id="step-3">
										<div class="panel-heading">
											<h3 class="panel-title">Select Flat</h3>
										</div>
										<form id="flat-form" method="POST">
											<input type="hidden" name="booked_id" id="booked_id">
											<input type="hidden" name="slectedflat" id="slectedflat">
											<input type="hidden" name="flat_id" id="flat_id">
										<div class="panel-body">
											<div class="row">
												<div class="col-md-3">
													<div class="form-group">
														<span class="control-label">Select Project</span>
														<select class="form-control" name="project_name" id="project_name" onchange="getBuildings('<?= base_url() ?>');ChangeFlatStructure()">
															<option value="">Select Project</option>
															<?php 
																if(!empty($all_projects)){
																	foreach ($all_projects as $project) {
																?>
																	<option value="<?= $project['id'] ?>"><?= $project['project_name'] ?></option>
															<?php }} ?>
														</select>
														<span class="select-arrow"></span>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<span class="control-label">Select Tower</span>
														<select class="form-control" name="building_name" id="building_name" onchange="getFlats('<?= base_url() ?>');ChangeFlatStructure()">
														</select>
														<span class="select-arrow"></span>
													</div>
												</div>

												<div class="col-md-3">
													<div class="form-group">
														<span class="control-label">Select Flat Type</span>

														<select class="form-control" name="flat_type" id="flat_type" onchange="ChangeFlatStructure()">
														</select>
														<span class="select-arrow"></span>

													</div>
												</div>


												<div class="col-md-3">
													<div class="form-group">
														<span class="control-label">Select View</span>
														<select class="form-control" name="flat_view" id="flat_view" onchange="ChangeFlatStructure()">
															<option value="Amenities" selected="selected">Amenities</option>
															<option value="Non Amenities">Non Amenities</option>
															<option value="Hill View">Hill View</option>
														</select>
														<span class="select-arrow"></span>
													</div>
												</div>

												<div class="col-md-12">
													<div class="form-group" >
														<span class="control-label" style="font-weight: 800;font-size: 16px;">Select Flat</span>
														<div class="clearfix"></div>
														<ul class="flat-details">
															<li class="floorr gray" >
																<span class="floor-number" style="margin-top: 0;">Floor</span>				
																<ul class="flat title" style="width: 68%;margin-left: 22px;">
																	<li class="flat-noo">Flat No.</li>

																</ul>
															</li><div class="clearfix"></div>
															<li class="floor gray" id="addflats">
																
															</li>
															<span id="flat_no" class="has-error"></span>
														</div>
														<ul class="but-color">
															<li class="available btn-success">Available</li>
															<!-- <li class="block">Blocked</li> -->
															<li class="book">Booked</li>
														</ul>
														
													</div>
												</div>
												<span id="flat_no_err"></span>
												<br>
												<label for="t_and_c">
													<input type="checkbox" name="t_and_c" id="t_and_c" value="1"> Agree to terms and conditions <br>
													<span id="tc"></span>
												</label>
												<button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
											</div>
										</form>
										</div>
										<div class="panel panel-primary setup-content" id="step-4">
											<div class="panel-heading">
												<h3 class="panel-title">Confirm Booking Details</h3>
											</div>
											<div class="panel-body">
												<div class="row">
													<div class="col-md-6">
														<strong>Name :- </strong><span class="confirmdetails" id="cname"></span><br>
														<strong>Email :- </strong><span class="confirmdetails" id="cemail"></span><br>
														<strong>Mobile No :- </strong><span class="confirmdetails" id="cmobile"></span><br>
														<!-- <strong>Agent Name :- </strong><span class="confirmdetails" id="cpname"></span><br>
														<strong>Agent No :- </strong><span class="confirmdetails" id="cagent_no"></span><br> -->
														<strong>Flat Area :- </strong><span class="confirmdetails" id="cflat_area"></span><br>
														<strong>Payable Amount :- </strong><span id="pamount">51,000 /-</span><br>
													</div>
													<div class="col-md-6">
														<strong>Project Name :- </strong><span class="confirmdetails" id="cproject"></span><br>
														<strong>Building Name :- </strong><span class="confirmdetails" id="cbuilding"></span><br>
														<strong>Flat No :- </strong><span class="confirmdetails" id="cflat_no"></span><br>
														<strong>Flat View :- </strong><span class="confirmdetails" id="cflat_view"></span><br>
														<strong>Flat Cost :- </strong><span class="confirmdetails" id="cflat_cost"></span><br>
													</div>
												</div>
												<br>
												<form action="<?= $action ?>" method="post" name="payuForm">
													<input type="hidden" name="amount" value="51000">
													<input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
												    <input type="hidden" name="hash" id="hash"/>
												    <input type="hidden" name="txnid" id="txnid" />
													<input type="hidden" name="email" id="customer_email">
													<input type="hidden" name="phone" id="customer_mobile">
													<input type="hidden" name="firstname" id="customer_name">
													<input type="hidden" name="surl" id="surl" value="<?= base_url('success') ?>">
													<input type="hidden" name="furl" id="furl" value="<?= base_url('failure') ?>">
													<input type="hidden" name="service_provider" value="payu_paisa"/>
													<input type="hidden"
													name="productinfo" value="Flat">
													<div class="pull-right">
														<button class="btn btn-success" type="submit">Confirm Booking</button>
														<button class="btn btn-danger" type="button" onclick="UserCancelled('<?= base_url() ?>')">Cancel Booking</button>
													</div>
												</form>
											</div>
										</div>
										<span>Help-line : +91-9595330033</span>
										<a href="<?= base_url() ?>public/client_assets/uploads/terms&conditions.pdf" class="pull-right" target="_blank">T & C Apply</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- The Modal -->
					<div class="modal fade" id="myModal">
					  <div class="modal-dialog">
					    <div class="modal-content">

					      <!-- Modal Header -->
					      <div class="modal-header">
					        <h4 class="modal-title" id="layout_head">Layout</h4>
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					      </div>

					      <!-- Modal body -->
					      <div class="modal-body">
					        <img src="" width="100%" id="layoutimg">
					      </div>

					      <!-- Modal footer -->
					      <div class="modal-footer">
					        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
					      </div>

					    </div>
					  </div>
					</div>
					<!-- The Modal -->
					<div class="modal fade" id="instructions_modal">
					  <div class="modal-dialog">
					    <div class="modal-content">

					      <!-- Modal Header -->
					      <div class="modal-header">
					        <h4 class="modal-title">Instructions</h4>
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					      </div>

					      <!-- Modal body -->
					      <div class="modal-body">
					      	<ul style="list-style: square;margin-left: 10px;">
					      		<li>Book your flat with 4 easy steps.</li>
					      		<li>Register with your name, mobile and email id on the adjacent form.</li>
					      		<li>In case a channel partner(agent) is assisting your booking- tick checkbox to fill his details.
							click Next.</li>
								<li>you will be directed to OTP window. OTP SMS will be sent to your registered mobile.</li>
								<li>Once Verified otp.</li>
								<li>click on next</li>
								<li>Flat availability chart will open.</li>
								<li>Select the project name</li>
								<li>Select the building name</li>
								<li>Select the view.</li>
								<li>Select the Flat number.</li>
								<li>click next</li>
								<li>you will be directed to Checkout window to confirm booking.</li>
								<li>Once you clicked on confirm booking you will be directed to payment window.</li>
								<li>After successful payment You will receive the confirmation of your flat by SMS as well as email.</li>
								<li>If your payment get failed due to some reasons. Contact Sales Staff.</li>
								<!-- <li>Sales staff will contact you to make the payment of booking amount within 24 hrs.</li>
								<li>Failing to make the payment in specified time will release the booking.</li> -->
					      	</ul>
					      </div>

					      <!-- Modal footer -->
					      <div class="modal-footer">
					        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
					      </div>

					    </div>
					  </div>
					</div>
					<script src="<?= base_url() ?>public/assets/plugins/jquery/jquery.min.js"></script>
					<script src="<?= base_url() ?>public/assets/plugins/bootstrap/js/bootstrap.js"></script>
					<script src="<?= base_url() ?>public/client_assets/js/custom.js"></script>

				</body>
				</html>