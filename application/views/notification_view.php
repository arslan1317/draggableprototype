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
                        <h1>Notification</h1>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="content mt-3">
            <?php if(!empty($notification)): ?>
                <?php foreach($notification as $item){?>
                    <div class="col-md-12">
                        <div class="notify-box clearfix" style="background-color: <?php if($item->seen == 0){ echo '#ccc'; }else{echo '#fff';} ?>;border: <?php if($item->seen == 0){ echo '#ccc'; }else{echo '1px solid #302e2d';} ?>">
                            <div class="row">
                                <div class="col-md-9" value="<?php echo $item->a_id; ?>" id="notify-box">
                                    <div class="col-md-2">
                                        <img alt="avatar" src="<?php if($item->path == null){ echo 'http://www.homeworkhelp.novelguide.com/sites/default/files/pictures/default/default_user_image.jpg'; }else{ echo $item->path; }; ?>">
                                    </div>
                                    <div class="col-md-10">
                                        <div class="col-md-3">
                                            <u>User</u>
                                            <br><?php echo $item->u_fname . " " . $item->u_lname; ?>
                                        </div>
                                        <div class="col-md-4">
                                            <u>Work</u>
                                            <br>Assign the <?php if($item->t_type == 1){ echo "Wireframe"; }else if($item->t_type == 2){ echo "Mockup"; }else{ echo "Prototype"; } ?> of <?php echo $item->p_name; ?>
                                        </div>
                                        <div class="col-md-3">
                                            <u>Start Date</u>
                                            <br><?php echo $item->a_start; ?>
                                        </div>
                                        <div class="col-md-2">
                                            <u>End Date</u>
                                            <br><?php echo $item->a_end; ?>
                                        </div>
                                        <div class="col-md-12">
                                            <u>Assign Detail</u>
                                            <br><?php echo $item->a_detail; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <?php if($item->a_accept == 0){
                                        echo '<button class="btn btn-default btn-block btn-custom" style="margin-top: 0px !important" onclick="acceptNotification('.$item->a_id.', 1)">Accept</button>
                                        <button class="btn btn-default btn-block btn-custom" onclick="declineNotification('.$item->a_id.', 1)">Decline</button>';

                                    }else if($item->a_accept == 1){
                                        echo '<button class="btn btn-default btn-block btn-custom" style="margin-top: 0px !important;opacity:0.7">Accepted</button>
                                        <button class="btn btn-default btn-block btn-custom" onclick="declineNotification('.$item->a_id.', 1)">Decline</button>';
                                    }else{
                                        echo '<button class="btn btn-default btn-block btn-custom" style="margin-top: 0px !important" onclick="acceptNotification('.$item->a_id.', 1)">Accept</button>
                                        <button class="btn btn-default btn-block btn-custom" style="opacity:0.7">Declined</button>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>
            <?php endif; ?>
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
<?php $this->view('masterpage/footer.php'); ?>