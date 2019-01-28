<?php $this->view('masterpage/header.php'); ?>
<body>
    <?php $this->view('masterpage/aside.php'); ?>
    <!-- Left Panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">
        <?php $this->view('masterpage/nav.php'); ?>
        <div class="breadcrumbs mt-10">
            <div class="col-sm-4 blue-border-left">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><span class="tweak">P</span>roject <span class="tweak">O</span>wner</h1>
                    </div>
                </div>
            </div>
        </div>

        <?php if(empty($all_data)) { ?>
            <div class="col-md-12 content mt-2" style="padding-bottom: 0px !important;">
                <div class="col-md-12 no-data-found alert alert-danger p-2">
                    <span>No Data Found</span>
                </div>
            <?php }else{ ?>
                <div class="col-md-12 content mt-4" style="padding-bottom: 0px !important;">
                    <?php foreach ($all_data as $data) { ?>
                        <div class="col-md-4">
                            <div class="all-data-box">
                                <div class="product-name">
                                    <p><span class="tweak">N</span>ame: <?php echo $data->p_name; ?></p>
                                    <p><span class="tweak">T</span>ype: <?php echo $data->p_type; ?></p>
                                </div>
                                <div class="supervisor-name">
                                    <p><span class="tweak">S</span>upervisor Name: <?php echo $data->u_fname . ' ' . $data->u_lname; ?>
                                    <?php 
                                    if($data->s_status == 0){
                                        echo '<i class="far fa-eye-slash text-primary"></i>';
                                    }else if($data->s_status == 1){
                                        echo '<i class="fas fa-check text-success""></i>';
                                    }else{
                                        echo '<i class="fas fa-times text-danger"></i>';
                                    }
                                    ?>
                                </p>
                            </div>
                            <div class="task-box">
                                <?php foreach ($data->task as $task) { ?>
                                    <p><?php
                                    if($task->t_type == 1){
                                        echo '<span class="tweak">W</span>ireframe';
                                    }else if($task->t_type == 2){
                                        echo '<span class="tweak">M</span>ockup';
                                    }else{
                                        echo '<span class="tweak">P</span>rototype';
                                    }
                                    ?>: <?php echo $task->u_fname . ' ' . $task->u_lname; ?>
                                    <?php 
                                    if($task->a_accept == 0){
                                        echo '<i class="far fa-eye-slash text-primary"></i>';
                                    }else if($task->a_accept == 1){
                                        echo '<i class="fas fa-check text-success""></i>';
                                    }else{
                                        echo '<i class="fas fa-times text-danger"></i>';
                                    }
                                    ?>
                                </p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php }?>
    </div>

    <div class="breadcrumbs mt-4">
        <div class="col-sm-4 blue-border-left">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1><span class="tweak">S</span>upervising</h1>
                </div>
            </div>
        </div>
    </div>

    <?php if(empty($supervising)) { ?>
        <div class="col-md-12 content mt-2" style="padding-bottom: 0px !important;">
            <div class="col-md-12 no-data-found alert alert-danger p-2">
                <span>No Data Found</span>
            </div>
        <?php }else { ?>
            <div class="col-md-12 content mt-4" style="padding-bottom: 0px !important;">
                <?php foreach ($supervising as $data) { ?>
                    <div class="col-md-4">
                        <div class="all-data-box">
                            <div class="product-name">
                                <p><span class="tweak">N</span>ame: <?php echo $data->p_name; ?></p>
                                <p><span class="tweak">T</span>ype: <?php echo $data->p_type; ?></p>
                            </div>
                            <div class="supervisor-name">
                                <p><span class="tweak">P</span>roject Owner: <?php echo $data->u_fname . ' ' . $data->u_lname; ?><i class="fas fa-check text-success"></i>
                                </p>
                            </div>
                            <div class="task-box">
                                <?php foreach ($data->task as $task) { ?>
                                    <p><?php
                                    if($task->t_type == 1){
                                        echo '<span class="tweak">W</span>ireframe';
                                    }else if($task->t_type == 2){
                                        echo '<span class="tweak">M</span>ockup';
                                    }else{
                                        echo '<span class="tweak">P</span>rototype';
                                    }
                                    ?>: <?php echo $task->u_fname . ' ' . $task->u_lname; ?>
                                    <?php 
                                    if($task->a_accept == 0){
                                        echo '<i class="far fa-eye-slash text-primary"></i>';
                                    }else if($task->a_accept == 1){
                                        echo '<i class="fas fa-check text-success""></i>';
                                    }else{
                                        echo '<i class="fas fa-times text-danger"></i>';
                                    }
                                    ?>
                                </p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>

    <div class="breadcrumbs mt-4">
        <div class="col-sm-4 blue-border-left">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1><span class="tweak">W</span>ireframe</h1>
                </div>
            </div>
        </div>
    </div>

    <?php if(empty($wireframe)) { ?>
        <div class="col-md-12 content mt-2" style="padding-bottom: 0px !important;">
            <div class="col-md-12 no-data-found alert alert-danger p-2">
                <span>No Data Found</span>
            </div>
        <?php }else { ?>
            <div class="col-md-12 content mt-4" style="padding-bottom: 0px !important;">
                <?php foreach ($wireframe as $data) { ?>
                    <div class="col-md-4">
                        <div class="all-data-box">
                            <div class="product-name">
                                <p><span class="tweak">N</span>ame: <?php echo $data->p_name; ?></p>
                                <p><span class="tweak">T</span>ype: <?php echo $data->p_type; ?></p>
                            </div>
                            <div class="supervisor-name">
                                <p><span class="tweak">P</span>roject Owner: <?php echo $data->owner[0]->u_fname . ' ' . $data->owner[0]->u_lname; ?>
                                </p>
                            </div>
                            <div class="supervisor-name">
                                <p><span class="tweak">S</span>pervisor: <?php echo $data->supervisor[0]->u_fname . ' ' . $data->supervisor[0]->u_lname; ?>
                                </p>
                            </div>
                            <div class="task-box">
                                <?php foreach ($data->task as $task) { ?>
                                    <p><?php
                                    if($task->t_type == 1){
                                        echo '<span class="tweak">W</span>ireframe';
                                    }else if($task->t_type == 2){
                                        echo '<span class="tweak">M</span>ockup';
                                    }else{
                                        echo '<span class="tweak">P</span>rototype';
                                    }
                                    ?>: <?php echo $task->u_fname . ' ' . $task->u_lname; ?>
                                    <?php 
                                    if($task->a_accept == 0){
                                        echo '<i class="far fa-eye-slash text-primary"></i>';
                                    }else if($task->a_accept == 1){
                                        echo '<i class="fas fa-check text-success""></i>';
                                    }else{
                                        echo '<i class="fas fa-times text-danger"></i>';
                                    }
                                    ?>
                                </p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>

    <div class="breadcrumbs mt-4">
        <div class="col-sm-4 blue-border-left">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1><span class="tweak">M</span>ockup</h1>
                </div>
            </div>
        </div>
    </div>

    <?php if(empty($mockup)) { ?>
        <div class="col-md-12 content mt-2" style="padding-bottom: 0px !important;">
            <div class="col-md-12 no-data-found alert alert-danger p-2">
                <span>No Data Found</span>
            </div>
        <?php }else { ?>
            <div class="col-md-12 content mt-4" style="padding-bottom: 0px !important;">
                <?php foreach ($mockup as $data) { ?>
                    <div class="col-md-4">
                        <div class="all-data-box">
                            <div class="product-name">
                                <p><span class="tweak">N</span>ame: <?php echo $data->p_name; ?></p>
                                <p><span class="tweak">T</span>ype: <?php echo $data->p_type; ?></p>
                            </div>
                            <div class="supervisor-name">
                                <p><span class="tweak">P</span>roject Owner: <?php echo $data->owner[0]->u_fname . ' ' . $data->owner[0]->u_lname; ?>
                                </p>
                            </div>
                            <div class="supervisor-name">
                                <p><span class="tweak">S</span>pervisor: <?php echo $data->supervisor[0]->u_fname . ' ' . $data->supervisor[0]->u_lname; ?>
                                </p>
                            </div>
                            <div class="task-box">
                                <?php foreach ($data->task as $task) { ?>
                                    <p><?php
                                    if($task->t_type == 1){
                                        echo '<span class="tweak">W</span>ireframe';
                                    }else if($task->t_type == 2){
                                        echo '<span class="tweak">M</span>ockup';
                                    }else{
                                        echo '<span class="tweak">P</span>rototype';
                                    }
                                    ?>: <?php echo $task->u_fname . ' ' . $task->u_lname; ?>
                                    <?php 
                                    if($task->a_accept == 0){
                                        echo '<i class="far fa-eye-slash text-primary"></i>';
                                    }else if($task->a_accept == 1){
                                        echo '<i class="fas fa-check text-success""></i>';
                                    }else{
                                        echo '<i class="fas fa-times text-danger"></i>';
                                    }
                                    ?>
                                </p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>


    <div class="breadcrumbs mt-4">
        <div class="col-sm-4 blue-border-left">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1><span class="tweak">P</span>rototype</h1>
                </div>
            </div>
        </div>
    </div>
    <?php if(empty($prototype)) { ?>
        <div class="col-md-12 content mt-2" style="padding-bottom: 0px !important;">
            <div class="col-md-12 no-data-found alert alert-danger p-2">
                <span>No Data Found</span>
            </div>
        <?php }else { ?>
            <div class="col-md-12 content mt-4" style="padding-bottom: 0px !important;">
                <?php foreach ($prototype as $data) { ?>
                    <div class="col-md-4">
                        <div class="all-data-box">
                            <div class="product-name">
                                <p><span class="tweak">N</span>ame: <?php echo $data->p_name; ?></p>
                                <p><span class="tweak">T</span>ype: <?php echo $data->p_type; ?></p>
                            </div>
                            <div class="supervisor-name">
                                <p><span class="tweak">P</span>roject Owner: <?php echo $data->owner[0]->u_fname . ' ' . $data->owner[0]->u_lname; ?>
                                </p>
                            </div>
                            <div class="supervisor-name">
                                <p><span class="tweak">S</span>pervisor: <?php echo $data->supervisor[0]->u_fname . ' ' . $data->supervisor[0]->u_lname; ?>
                                </p>
                            </div>
                            <div class="task-box">
                                <?php foreach ($data->task as $task) { ?>
                                    <p><?php
                                    if($task->t_type == 1){
                                        echo '<span class="tweak">W</span>ireframe';
                                    }else if($task->t_type == 2){
                                        echo '<span class="tweak">M</span>ockup';
                                    }else{
                                        echo '<span class="tweak">P</span>rototype';
                                    }
                                    ?>: <?php echo $task->u_fname . ' ' . $task->u_lname; ?>
                                    <?php 
                                    if($task->a_accept == 0){
                                        echo '<i class="far fa-eye-slash text-primary"></i>';
                                    }else if($task->a_accept == 1){
                                        echo '<i class="fas fa-check text-success""></i>';
                                    }else{
                                        echo '<i class="fas fa-times text-danger"></i>';
                                    }
                                    ?>
                                </p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>


</div> <!-- .content -->

</div><!-- /#right-panel -->

<!-- Right Panel -->
<?php $this->view('masterpage/footer.php'); ?>