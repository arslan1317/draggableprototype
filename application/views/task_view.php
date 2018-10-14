<?php $this->view('masterpage/header.php'); ?>
<body id="task-page">
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
                        <h1><span class="tweak">T</span>ask</h1>
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

        <div class="content mt-3">
            <div class="upper-form-box">
                <!-- task/add_task -->
                <div class="col-md-12">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="projectName" class="normal-bold">Project Name</label>
                            <select name="projectName" id="projectName" class="form-control">
                                <option value="">--Select--</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="taskType" class="normal-bold">Task Type</label>
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
                            <label for="taskStart" class="normal-bold">Task Start</label>
                            <input type="text" class="form-control" id="projectStart" name="taskStart">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="taskEnds" class="normal-bold">Task End</label>
                            <input type="text" class="form-control" id="projectEnd" name="taskEnd">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="taskDetails" class="normal-bold">Task Details</label>
                            <textarea class="form-control" rows="1" id="taskDetail" name="taskDetail"></textarea>
                        </div>
                    </div>
                    <div class="col-md-3 col-md-offset-3">
                        <div class="form-group">
                            <input type="submit" class="form-control btn-custom" id="addTask" value="Add" name="add-task">
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .content -->
        <div class="breadcrumbs details-view">
            <div class="col-sm-4 blue-border-left">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><span class="tweak">T</span>ask <span class="tweak">D</span>etails</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="col-md-12">
                <table id="task-details-table" class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>Id</td>
                            <td>Name</td>
                            <td>Type</td>
                            <td>Start</td>
                            <td>End</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody id="task-details-table-tbody">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
<?php $this->view('masterpage/footer.php'); ?>