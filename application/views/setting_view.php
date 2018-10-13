<?php $this->view('masterpage/header.php'); ?>
<body>
<?php $this->view('masterpage/aside.php'); ?>
        <!-- Left Panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <?php $this->view('masterpage/nav.php'); ?>

        <div class="breadcrumbs">
            <div class="col-md-12">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Setting</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="update-profile-picture clearfix">
                <div class="col-md-12">
                    <div class="breadcrumbs sub-breadcrumbs">
                        <div class="col-sm-4">
                            <div class="page-header float-left">
                                <div class="page-title">
                                    <h3>Profile Picture</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="float-right">
                                <div class="alert text-center mt-1 mb-1" style="display: none" id="error-box">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-3">
                        <img 
                        <?php 
                            if(!empty($image)){
                                echo 'src=" '.$image.'" ';
                            }else if(!empty($this->session->userdata('path'))){
                                echo 'src="'. $this->session->userdata('path') .'"';
                            }
                            else{
                                echo 'src="http://www.homeworkhelp.novelguide.com/sites/default/files/pictures/default/default_user_image.jpg"';
                            } 
                        ?>
                        class="img-responsive">
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <!-- <?php print_r($error); ?> -->
                            <?php echo form_open_multipart('setting/do_upload');?>
                                <input type="file" name="userfile" size="20" />
                                <br /><br />
                                <input type="submit" class="btn btn-custom" value="upload" />
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="change-name clearfix">
                <div class="col-md-12">
                    <div class="breadcrumbs sub-breadcrumbs">
                        <div class="col-sm-4">
                            <div class="page-header float-left">
                                <div class="page-title">
                                    <h3>Update Name</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="float-right">
                               
                            </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                   <!-- <?php echo form_open('setting/changeName'); ?> -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="f-name">First Name</label>
                                <input type="text" class="form-control" id="f-name" name="f-name" placeholder="<?php echo $this->session->userdata('u_fname'); ?>" value="<?php echo $this->session->userdata('u_fname'); ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="l-name">Last Name</label>
                                <input type="text" class="form-control" id="l-name" name="l-name" placeholder="<?php echo $this->session->userdata('u_lname') ?>" value="<?php echo $this->session->userdata('u_lname') ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" placeholder="<?php echo $this->session->userdata('u_email') ?>" readonly="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="submit" class="form-control btn-custom" id="updateName" value="Update">
                            </div>
                        </div>
                  <!--  </form> -->
                </div>
            </div>

            <div class="change-password clearfix">
                <div class="col-md-12">
                    <div class="breadcrumbs sub-breadcrumbs">
                        <div class="col-sm-4">
                            <div class="page-header float-left">
                                <div class="page-title">
                                    <h3>Update Password</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="float-right">
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="current-pass">Current Password</label>
                            <input type="text" class="form-control" id="current-pass">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="new-password">New Password</label>
                            <input type="text" class="form-control" id="new-password">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="con-password">Confirm Password</label>
                            <input type="text" class="form-control" id="con-password">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="button" class="form-control btn-custom" id="updatePassword" value="Update">
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
<?php $this->view('masterpage/footer.php'); ?>