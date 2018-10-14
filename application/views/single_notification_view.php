<?php $this->view('masterpage/header.php'); ?>
<body>
<?php $this->view('masterpage/aside.php'); ?>
        <!-- Left Panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">
        <?php $this->view('masterpage/nav.php'); ?>
        <?php if(!empty($single_notification)): ?>
        <?php foreach($single_notification as $item){?>
        <div class="breadcrumbs">
            <div class="col-md-12">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Notification -- Assign the <?php if($item->t_type == 1){ echo "Wireframe"; }else if($item->t_type == 2){ echo "Mockup"; }else{ echo "Prototype"; } ?> of <?php echo $item->p_name; ?></h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
                <div class="col-md-12">
                    <div class="col-md-3">
                        <img src="<?php if($item->path == null){ echo 'http://www.homeworkhelp.novelguide.com/sites/default/files/pictures/default/default_user_image.jpg'; }else{ echo $item->path; }; ?>" alt="" class="img-responsive">
                    </div>
                    <div class="col-md-6">
                        <p>First Name : <?php echo $item->u_fname; ?></p>
                        <p>Last Name : <?php echo $item->u_lname; ?></p>
                        <p>Email Address : <?php echo $item->u_email; ?></p>
                        <hr>
                        <p>Project Name : <?php echo $item->p_name; ?></p>
                        <p>Project Type : <?php echo $item->p_type; ?></p>
                        <p>Project Start : <?php echo $item->p_start; ?></p>
                        <p>Project End : <?php echo $item->p_end; ?></p>
                        <p>Project Detail : <?php echo $item->p_detail; ?></p>
                        <hr>
                        <p>Assign Type : <?php if($item->t_type == 1){ echo "Wireframe"; }else if($item->t_type == 2){ echo "Mockup"; }else{ echo "Prototype"; } ?></p>
                        <p>Asiign Start : <?php echo $item->a_start; ?></p>
                        <p>Asiign End : <?php echo $item->a_end; ?></p>
                        <p>Asiign Detail : <?php echo $item->a_detail; ?></p>
                    </div>
                    <div class="col-md-3">
                        <?php if($item->a_accept == 0): ?>
                            <button class="btn btn-default btn-block btn-custom" onclick="acceptNotification(<?php echo $item->a_id ?>, 1)">Accept</button>   
                            <button class="btn btn-default btn-block btn-custom" onclick="declineNotification(<?php echo $item->a_id ?>, 1)">Decline</button>
                        <?php elseif($item->a_accept == 1): ?>
                            <button class="btn btn-default btn-block btn-custom" style="opacity: 0.7">Accepted</button>
                            <button class="btn btn-default btn-block btn-custom" onclick="declineNotification(<?php echo $item->a_id ?>, 1)">Decline</button>
                        <?php else: ?>
                            <button class="btn btn-default btn-block btn-custom" onclick="acceptNotification(<?php echo $item->a_id ?>, 1)">Accept</button>
                            <button class="btn btn-default btn-block btn-custom" style="opacity: 0.7">Declined</button>
                        <?php endif; ?>
                    </div>
                </div>
            <?php }?>
        </div> <!-- .content -->
        <?php endif; ?>
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
<?php $this->view('masterpage/footer.php'); ?>