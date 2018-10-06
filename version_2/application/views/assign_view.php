<?php $this->view('masterpage/header.php'); ?>
<body>
<?php $this->view('masterpage/aside.php'); ?>
        <!-- Left Panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <?php $this->view('masterpage/nav.php'); ?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Assign To User</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="float-right">
                    <?php
                        if(!empty($error)){
                            echo'<div class="alert alert-danger text-center login-alert required-error">
                                    <p>'. $error .'</p>
                                </div>';
                        }
                    ?>
                    <?php
                        if(!empty($success)){
                            echo'<div class="alert alert-success text-center login-alert required-error">
                                    <p>'. $success .'</p>
                                </div>';
                        }
                    ?>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <?php echo form_open_multipart('assign/add_assign');?>
                <div class="col-md-12">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="user-email">User Email</label>
                            <input type="text" class="form-control" id="user-email" name="user-email">
                            <input type="hidden" name="user-email-id" id="user-email-id">
                            <div class="user-email-show" id="user-email-show" style="display: none;">
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="projectName">Project Name</label>
                             <select class="form-control" id="projectName" name="projectName">
                                <option value="">--Select--</option>
                                <?php if(!empty($project_name)): ?>
                                    <?php foreach($project_name as $item){?>
                                        <option value="<?php echo $item->p_id; ?>"><?php echo $item->p_name; ?></option>
                                    <?php }?>
                                <?php endif; ?>
                              </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="taskType">Task</label>
                            <select class="form-control" id="taskType" name="taskType">
                                <option value="">--Select--</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="assignStart">Assign Date Start</label>
                            <input type="text" class="form-control" id="projectStart" name="assignStart">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="assignEnd">Assign Date End</label>
                            <input type="text" class="form-control" id="projectEnd" name="assignEnd">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="assignDetail">Assign Details</label>
                            <textarea class="form-control" rows="1" id="assignDetail" name="assignDetail"></textarea>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="submit" class="form-control btn-custom" id="addAssign" value="Add">
                        </div>
                    </div>
                </div>
            </form>
        </div> <!-- .content -->
        <div class="breadcrumbs details-view">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Assign Details</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="col-md-12">
                <table id="task-details-table" class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>User</th>
                            <th>PROJECT NAME</th>
                            <th>TASK TYPE</th>
                            <th>START</th>
                            <th>END</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($assign_work)): ?>
                            <?php $i = 0; ?>
                            <?php foreach($assign_work as $item){?>
                                <tr>
                                    <td><?php echo ($i+1); ?></td>
                                    <td><?php echo $item->u_email; ?></td>
                                    <td><?php echo $item->p_name; ?></td>
                                    <td>
                                        <?php 
                                            if($item->t_type == 1){
                                                echo "Wireframe";
                                            }else if($item->t_type == 2){
                                                echo "Mockup";
                                            }else{
                                                echo "Prototype";
                                            }
                                        ?>        
                                    </td>
                                    <td><?php echo $item->a_start; ?></td>
                                    <td><?php echo $item->a_end; ?></td>
                                    <td>
                                        <?php 
                                            if($item->a_status == 0){
                                                echo "Pending";
                                            }else{
                                                echo "Prototype";
                                            }
                                        ?>    
                                    </td>
                                    <td><span>View</span> | <span>Delete</span></td>
                                </tr>
                                <?php $i++; ?>
                            <?php }?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="8"><hr><h3>NO ASSIGN WORK FOUND<h3><hr></td>
                                </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
<?php $this->view('masterpage/footer.php'); ?>