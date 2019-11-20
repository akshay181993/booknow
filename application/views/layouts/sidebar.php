<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="<?= base_url() ?>public/assets/images/user.png" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
               
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $this->session->userdata('name') ?></div>
                <div class="email"><?= $this->session->userdata('email') ?></div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li>
                            <a href="<?= base_url('profile-setting') ?>">
                                <i class="material-icons">build</i>Settings
                            </a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="<?= base_url('logout') ?>">
                                <i class="material-icons">input</i>Sign Out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MENU</li>
                <li class="active">
                    <a href="<?= base_url('dashboard') ?>">
                        <i class="material-icons">dashboard</i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <?php if($this->session->userdata('role') == 'admin'){ ?>
                    <li>
                        <a href="<?= base_url('all-projects') ?>">
                            <i class="material-icons">home</i>
                            <span>All Projects</span>
                        </a>
                    </li>
                     <li>
                        <a href="<?= base_url('project-layout') ?>">
                            <i class="material-icons">image</i>
                            <span>Layout</span> 
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('all-buildings') ?>">
                            <i class="material-icons">location_city</i>
                            <span>All Building</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('all-flats') ?>">
                            <i class="material-icons">list</i>
                            <span>All Flats</span>
                        </a>
                    </li>
                    
                <?php } ?>
                <li>
                    <a href="<?= base_url('booking-details') ?>">
                        <i class="material-icons">details</i>
                        <span>Booking Details</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; <?= date('Y'); ?> <a href="https://www.megapolis.co.in/" target="_blank">Admin - megapolis.co.in/booknow</a>.
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->       
</section>