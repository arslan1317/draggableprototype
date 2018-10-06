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
                        <h1>Task</h1>
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
            <?php echo form_open_multipart('task/add_task');?>
                <div class="col-md-12">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="projectName">Project Name</label>
                            <select name="projectName" id="projectName" class="form-control">
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
                            <label for="taskType">Task Type</label>
                              <select class="form-control" id="taskType" name="taskType">
                                <option value="">--Select--</option>
                                <option value="1">Wireframe</option>
                                <option value="2">Mockup</option>
                                <option value="3">Prototype</option>
                              </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="taskStart">Task Start</label>
                            <input type="text" class="form-control" id="projectStart" name="taskStart">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="taskEnds">Task End</label>
                            <input type="text" class="form-control" id="projectEnd" name="taskEnd">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="taskDetails">Task Details</label>
                            <textarea class="form-control" rows="1" id="taskDetail" name="taskDetail"></textarea>
                        </div>
                    </div>
                    <div class="col-md-3 col-md-offset-3">
                        <div class="form-group">
                            <input type="submit" class="form-control btn-custom" id="addTask" value="Add">
                        </div>
                    </div>
                </div>
            </form>
        </div> <!-- .content -->
        <div class="breadcrumbs details-view">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Task Details</h1>
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
                            <th>ID</th>
                            <th>NAME</th>
                            <th>TYPE</th>
                            <th>START</th>
                            <th>END</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($task_data)): ?>
                            <?php $i = 0; ?>
                            <?php foreach($task_data as $item){?>
                                <tr>
                                    <td><?php echo ($i+1); ?></td>
                                    <td><?php echo $item->t_id; ?></td>
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
                                    <td><?php echo $item->t_start; ?></td>
                                    <td><?php echo $item->t_end; ?></td>
                                    <td><span onclick="getProject(<?php echo $item->t_id; ?>)">View</span> | <span onclick="deleteProject(<?php echo $item->t_id; ?>)" data-toggle="modal" data-target="#delete-model">Delete</span></td>
                                </tr>
                                <?php $i++; ?>
                            <?php }?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="8"><hr><h3>NO TASK FOUND<h3><hr></td>
                                </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
<?php $this->view('masterpage/footer.php'); ?>