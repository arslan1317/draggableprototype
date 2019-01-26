<?php $this->view('masterpage/header.php'); ?>
<style>
    #error-box p{
        margin-bottom: 0px !important;
    }
</style>
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
                        <h1><span class="tweak">W</span>ireframes</h1>
                    </div>
                </div>
            </div>
        </div>
        
                <?php if(empty($wireframe)) { ?>
                <div class="col-md-12 no-data-found bg-danger text-white p-2">
                    <span>No Data Found</span>
                </div>
                <?php }else{ ?>
                     <div class="content mt-3 mb-4">
                        <div class="col-md-12">
                            <table id="wireframe-submit-table" class="table table-condensed table-striped">
                                <thead>
                                    <tr>
                                        <td>No.</td>
                                        <td>Project Name</td>
                                        <td>Assign Detail</td>
                                        <td>Status</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody id="wireframe-submit-table-tbody">
                                    <?php $wireframeCount = 0; ?>
                                    <?php foreach ($wireframe as $data) { ?>
                                    <?php $wireframeCount++; ?>
                                    <tr>
                                        <td><?php echo $wireframeCount; ?></td>
                                        <td><?php echo $data->p_name; ?></td>
                                        <td><?php echo $data->a_detail; ?></td>
                                        <td>
                                            <?php
                                                if($data->a_status == 1){
                                                    echo 'Submitted';
                                                }else if($data->a_status == 2){
                                                    echo 'Approved';
                                                }else if($data->a_status == 3){
                                                    echo 'Changed';
                                                }
                                            ?>
                                        </td>
                                        <td><span onclick="openWireframeModel(<?php echo $data->p_id; ?>,1,<?php echo $data->a_id; ?>)" class="tweak pointer">View</span></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php }?>

        <div class="breadcrumbs mt-4">
            <div class="col-sm-4 blue-border-left">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><span class="tweak">M</span>ockups</h1>
                    </div>
                </div>
            </div>
        </div>

        <?php if(empty($supervising)) { ?>
            <div class="col-md-12 content mt-2">
                <div class="col-md-12 no-data-found bg-danger text-white p-2">
                    <span>No Data Found</span>
                </div>
        <?php }else { ?>
            <div class="col-md-12 content mt-4">
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
                        <h1><span class="tweak">P</span>rototype</h1>
                    </div>
                </div>
            </div>
        </div>

        </div> <!-- .content -->
        
    </div><!-- /#right-panel -->
    
<!-- OPEN WIREFRAME MODEL -->
<div class="col-12 pupopBg overflow-yscroll" id="pupop" style="display: none;">
    <div class="col-lg-offset-4 col-lg-6 col-md-offset-1 col-md-10 col-sm-offset-2 col-sm-8 col-11 boxes pupopInnerBox pb-4" style="margin-top:30px; margin-bottom:30px;">
        <div class="col-12 pt-3 overflow-hidden p-0 mt-2 mb-2">
            <input type="hidden" id="projectid">
            <h3 class="float-left col-5 blue-border-left pt-2 pb-2" id="wireframeProject"></h3>
            <div id="error-box" class="offset-md-1 col-5 alert mb-0 text-center" style="display:none;"></div>
            <p class="float-right pointer closePopopIcon tweak mr-4" onclick="closePupop()">X</p>
            <div class="clearfix"></div>
        </div>
        <div class="col-md-12 pb-3">
            <div class="col-md-7">
                <div class="wireframe-mobile">
                    <div class="mobile-top"></div>
                    <div class="mobile-inner ui-droppable"></div>
                    <div class="mobile-bottom"></div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="save-activity text-center">
                    <h2 class="activityHead"><span class="tweak">A</span>ctivities</h2>
                    <ul id="activity-name-show">
                    </ul>
                </div>
                <div class="form-group mt-3">
                    <label for="assignStatusMessage">Comment:</label>
                    <textarea class="form-control" rows="4" id="comment" style="height:auto !important"></textarea>
                </div>
                <div class="wireframe save-button text-center" style="margin:1rem auto 0rem">
                    <button class="btn main-btn" id="approved-wireframe">Approved</button>
                    <button class="btn main-btn" id="change-wireframe">Changed</button>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Right Panel -->
<?php $this->view('masterpage/footer.php'); ?>