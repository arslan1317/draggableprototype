<header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-1">
                    <!-- <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a> -->
                    <div class="header-left">

                        <!-- <div class="dropdown for-notification">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                            <span class="count bg-danger">5</span>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="notification">
                            <p class="red">You have 3 Notification</p>
                            <a class="dropdown-item media bg-flat-color-1" href="#">
                                <i class="fa fa-check"></i>
                                <p>Server #1 overloaded.</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-4" href="#">
                                <i class="fa fa-info"></i>
                                <p>Server #2 overloaded.</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-5" href="#">
                                <i class="fa fa-warning"></i>
                                <p>Server #3 overloaded.</p>
                            </a>
                          </div>
                        </div> -->

                        <div class="dropdown for-message">
                          <button class="btn btn-secondary dropdown-toggle" type="button"
                                id="message"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-tasks" style="font-size: 25px"></i>
                            <!-- <i class="fa fa-bell"></i> -->
                            <span class="count" id="count">9</span>
                          </button>
                          <div class="dropdown-menu custom-border-top" aria-labelledby="message" id="dropdown-notification">
                            <p class="red">You have 4 Mails</p>
                            <div id="main-notifier" class="main-notifier">
                            </div>
                            <div class="see-more">
                                <div class="text-center">
                                    <a href="<?php echo base_url(); ?>notification">See All
                                    </a>
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="header-left">
                        <div class="dropdown for-notifier-message">
                              <button class="btn btn-secondary dropdown-toggle" type="button"
                                    id="message-notifier"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell" style="font-size: 25px"></i>
                                <span class="count" id="message-count"></span>
                              </button>
                              <div class="dropdown-menu custom-border-top" aria-labelledby="message-notifier" id="message-dropdown-notification">
                                <p class="red">You have 4 Mails</p>
                                <div id="main-message-notifier" class="main-message-notifier">
                                </div>
                                <div class="see-more">
                                    <div class="text-center">
                                        <a href="<?php echo base_url(); ?>notification">See All
                                        </a>
                                    </div>
                                </div>
                              </div>
                            </div>
                        </div>
                </div>

                <div class="col-sm-5">
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