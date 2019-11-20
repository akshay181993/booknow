<section class="content">
    <div class="container-fluid">
        <div class="block-header">
           <h2>Users</h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Edit User</h2>
                    </div>
                    <div class="body">
                         <form id="edituser_form" method="POST">
                            <input type="hidden" name="type" value="update">
                            <input type="hidden" name="id" value="<?= $user[0]['id'] ?>">
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </div>
                                        <div class="form-line">
                                            <input type="text" class="form-control date" placeholder="User Name" name="name" id="name" value="<?= $user[0]['name'] ?>">
                                        </div>
                                        <span class="errors" id="name_err"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="material-icons">phone</i>
                                        </div>
                                        <div class="form-line">
                                            <input type="text" class="form-control date" placeholder="Mobile No." name="mobile_no" id="mobile_no" value="<?= $user[0]['mobile_no'] ?>">
                                        </div>
                                        <span class="errors" id="mobile_no_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="material-icons">email</i>
                                        </div>
                                        <div class="form-line">
                                            <input type="text" class="form-control date" placeholder="Email Address" name="email" id="email" value="<?= $user[0]['email'] ?>">
                                        </div>
                                        <span class="errors" id="email_err"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="material-icons">lock</i>
                                        </div>
                                        <div class="form-line">
                                            <input type="password" class="form-control date" placeholder="Password" name="password" id="password">
                                        </div>
                                        <span class="errors" id="password_err"></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="material-icons">place</i>
                                        </div>
                                        <div class="form-line">
                                            <select class="form-control show-tick" name="role" id="role">
                                                <option value="">-- Please select Role --</option>
                                                <option value="SM" <?php if("SM" == $user[0]['role']){echo 'selected';} ?>>Sales Manager</option>
                                            </select>
                                        </div>
                                        <span class="errors" id="role_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="pull-right">
                                    <button type="button" onclick='profile("<?=  base_url() ?>","edituser_form","cp-sm","update-setting")' class="btn btn-primary btn-lg">ADD</button>
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