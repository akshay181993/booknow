<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-3">
                <div class="card profile-card">
                    <div class="profile-header">&nbsp;</div>
                    <div class="profile-body">
                        <div class="image-area">
                            <img src="<?= base_url() ?>public/assets/images/megapolis.png" alt="Admin MP - Profile Image" />
                        </div>
                        <div class="content-area">
                            <h3><?= $user_data[0]['name'] ?></h3>
                            <p>Administrator</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-9">
                <div class="card">
                    <div class="body">
                        <div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Profile Settings</a></li>
                                <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Password</a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="profile_settings">
                                    <form class="form-horizontal" method="POST" id="updateprofile">
                                        <input type="hidden" name="type" value="update">
                                        <input type="hidden" name="id" value="<?= $user_data[0]['id'] ?>">
                                        <div class="form-group">
                                            <label for="NameSurname" class="col-sm-2 control-label">Name</label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name Surname" value="<?= $user_data[0]['name'] ?>">
                                                </div>
                                                <span class="errors" id="name_err"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Email" class="col-sm-2 control-label">Email</label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= $user_data[0]['email'] ?>">
                                                </div>
                                                <span class="errors" id="email_err"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="mobile_no" class="col-sm-2 control-label">Mobile No</label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="mobile_no" name="mobile_no" placeholder="Moible No" value="<?= $user_data[0]['mobile_no'] ?>">
                                                </div>
                                                <span class="errors" id="mobile_no_err"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="InputExperience" class="col-sm-2 control-label">Password</label>

                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                                        <i class="material-icons text-muted pull-right pass-eye" role="button" id="toggel" onclick="toggle('password','toggel')">visibility</i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="button" class="btn btn-primary" onclick='profile("<?=  base_url() ?>","updateprofile","dashboard","update-setting")'>SUBMIT</button>  
                                                <button type="button" class="btn btn-default">CANCEL</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                    <form class="form-horizontal" method="POST" id="updatepass">
                                        <div class="form-group">
                                            <label for="OldPassword" class="col-sm-3 control-label">Old Password</label>
                                            <div class="col-sm-9">
                                                <div class="form-line">
                                                    <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Old Password">
                                                    <i class="material-icons text-muted pull-right pass-eye" role="button" id="toggel1" onclick="toggle('old_password','toggel1')">visibility</i>
                                                </div>
                                                <span class="errors" id="old_password_err"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="NewPassword" class="col-sm-3 control-label">New Password</label>
                                            <div class="col-sm-9">
                                                <div class="form-line">
                                                    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password">
                                                    <i class="material-icons text-muted pull-right pass-eye" role="button" id="toggel2" onclick="toggle('new_password','toggel2')">visibility</i>
                                                </div>
                                                <span class="errors" id="new_password_err"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="NewPasswordConfirm" class="col-sm-3 control-label">New Password (Confirm)</label>
                                            <div class="col-sm-9">
                                                <div class="form-line">
                                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="New Password (Confirm)">
                                                    <i class="material-icons text-muted pull-right pass-eye" role="button" id="toggel3" onclick="toggle('confirm_password','toggel3')">visibility</i>
                                                </div>
                                                <span class="errors" id="confirm_password_err"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <button type="button" onclick='profile("<?= base_url() ?>","updatepass","admin-login","change-password")' class="btn btn-primary">SUBMIT</button>
                                                <button type="button" class="btn btn-default">CANCEL</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>