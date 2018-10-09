<?php $this->view('masterpage/header.php'); ?>
<body id="projectPage">
<?php $this->view('masterpage/aside.php'); ?>
        <!-- Left Panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <?php $this->view('masterpage/nav.php'); ?>

        <div class="breadcrumbs mt-10">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><span class="tweak">P</span>roject</h1>
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
            <?php echo form_open_multipart('project/add_project');?>
                <div class="col-md-12">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="projectName" class="normal-bold">Project Name</label>
                            <input type="text" class="form-control" id="projectName" name="projectName">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="projectType" class="normal-bold">Project Type</label>
                            <select class="form-control" id="projectType" name="projectType">
                                <option value="">--Select--</option>
                                <option value="Music">Music</option>
                                <option value="Travel">Travel</option>
                                <option value="Pick & Drop">Pick & Drop</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="projectStart" class="normal-bold">Project Start</label>
                            <input type="text" class="form-control" id="projectStart" name="projectStart">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="projectEnd" class="normal-bold">Project End</label>
                            <input type="text" class="form-control" id="projectEnd" name="projectEnd">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projectDetails" class="normal-bold">Project Details</label>
                            <textarea class="form-control" rows="1" id="projectDetails" name="projectDetails"></textarea>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="submit" class="form-control btn-custom" id="addProject" value="Add">
                        </div>
                    </div>
                </div>
            </form>

        </div> <!-- .content -->
        <div class="breadcrumbs details-view">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><span class="tweak">P</span>roject <span class="tweak">D</span>etails</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="col-md-12">
                <table id="project-details-table" class="table table-condensed table-striped">
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
                        <?php if(!empty($project_data)): ?>
                            <?php $i = 0; ?>
                            <?php foreach($project_data as $item){?>
                                <tr>
                                    <td><?php echo ($i+1); ?></td>
                                    <td><?php echo $item->p_id; ?></td>
                                    <td><?php echo $item->p_name; ?></td>
                                    <td><?php echo $item->p_type; ?></td>
                                    <td><?php echo $item->p_start; ?></td>
                                    <td><?php echo $item->p_end; ?></td>
                                    <td><span onclick="getProject(<?php echo $item->p_id; ?>)">View</span> | <span onclick="deleteProject(<?php echo $item->p_id; ?>)" data-toggle="modal" data-target="#delete-model">Delete</span></td>
                                </tr>
                                <?php $i++; ?>
                            <?php }?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="8"><hr><h3>NO PROJECT FOUND<h3><hr></td>
                                </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- /#right-panel -->
    <!-- Right Panel -->
<?php $this->view('masterpage/footer.php'); ?>