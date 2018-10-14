<?php $this->view('masterpage/header.php'); ?>
<body id="assign-page">
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
                        <h1><span class="tweak">A</span>ssign <span class="tweak">T</span>o <span class="tweak">U</span>ser</h1>
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
                <!--assign/add_assign-->
                <div class="col-md-12">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="user-email" class="normal-bold">User Email</label>
                            <input type="text" class="form-control" id="user-email" name="user-email">
                            <input type="hidden" name="user-email-id" id="user-email-id">
                            <div class="user-email-show" id="user-email-show" style="display: none;">
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="projectName" class="normal-bold">Project Name</label>
                             <select class="form-control" id="projectName" name="projectName">
                                <option value="">--Select--</option>
                              </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="taskType" class="normal-bold">Task</label>
                            <select class="form-control" id="taskType" name="taskType">
                                <option value="">--Select--</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="assignStart" class="normal-bold">Assign Date Start</label>
                            <input type="text" class="form-control" id="projectStart" name="assignStart">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="assignEnd" class="normal-bold">Assign Date End</label>
                            <input type="text" class="form-control" id="projectEnd" name="assignEnd">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="assignDetail" class="normal-bold">Assign Details</label>
                            <textarea class="form-control" rows="1" id="assignDetail" name="assignDetail"></textarea>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="submit" class="form-control btn-custom" id="addAssign" value="Add" name="add-assign">
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .content -->
        <div class="breadcrumbs details-view">
            <div class="col-sm-4 blue-border-left">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><span class="tweak">A</span>ssign <span class="tweak">D</span>etails</h1>
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
                    <tbody id="assign-details-table-tbody">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
<?php $this->view('masterpage/footer.php'); ?>