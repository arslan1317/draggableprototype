<header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-6">
                    <!-- <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a> -->
                    <div class="header-left mt-1">
                        <!-- SUPERVISOR NOTIFICATION -->
                        <div class="main-supervisor-box">
                            <div class="dropdown for-supervisor mr-3">
                             <button class="btn btn-secondary dropdown-toggle" type="button" id="notification">
                                 <i class="fa fa-user open-dropdown-box" style="font-size: 25px"></i>
                                 <span class="count supervisor-count">0</span>
                             </button>
                           </div>
                            <div class="dropdown-boxes" style="display:none" id="supervisor-box">
                            </div>
                        </div>
                        <!-- ASSING -->
                        <div class="main-supervisor-box">
                            <div class="dropdown for-supervisor mr-3">
                             <button class="btn btn-secondary dropdown-toggle" type="button" id="notification">
                                 <i class="fa fa-plus open-dropdown-box" style="font-size: 25px"></i>
                                 <span class="count assign-count">0</span>
                             </button>
                           </div>
                            <div class="dropdown-boxes" style="display:none" id="assign-box">
                            </div>
                        </div>
                        <!-- NOTIFICATION -->
                        <div class="main-supervisor-box">
                            <div class="dropdown for-supervisor mr-3">
                             <button class="btn btn-secondary dropdown-toggle" type="button" id="notification">
                                 <i class="fa fa-bell open-dropdown-box" style="font-size: 25px"></i>
                                 <span class="count notification-count">0</span>
                             </button>
                           </div>
                            <div class="dropdown-boxes" style="display:none" id="notification-box">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span id="showUserName">Hi <?php echo $this->session->userdata('u_fname'); echo " " . $this->session->userdata('u_lname'); ?></span>
                            <img id="hideShowDropDown"
                            <?php
                                if(!empty($this->session->userdata('path'))){
                                    echo 'src="'. $this->session->userdata('path') .'"';
                                }else{
                                    echo 'src="http://www.homeworkhelp.novelguide.com/sites/default/files/pictures/default/default_user_image.jpg"';
                                }
                            ?>
                            class="user-avatar rounded-circle hideShowDropDown">
                            <!-- <img class="user-avatar rounded-circle" src="<?php echo base_url(); ?>assets/automated/img/admin.jpg" alt="User Avatar"> -->
                        </a>

                        <div class="user-menu dropdown-menu">
                                <a class="nav-link" href="<?php echo base_url(); ?>user/profile"><i class="fa fa- user"></i>My Profile</a>

                                <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>

                                <a class="nav-link" href="<?php echo base_url(); ?>setting"><i class="fa fa -cog"></i>Settings</a>
                                <?php echo form_open('user/logout', 'id="logout_form"'); ?>
                                    <a class="nav-link" href="#" onclick="document.getElementById('logout_form').submit();"><i class="fa fa-power -off"></i>Logout</a>
                                <!-- <form action="Admin/logout" method="post" id="logout_form">
                                </form> -->
                                <?php echo form_close(); ?>
                        </div>
                    </div>

                    <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-us"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language" >
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-fr"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-it"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->