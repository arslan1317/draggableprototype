<?php $this->view('masterpage/header.php'); ?>
<body id="project-page">
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
                        <h1><span class="tweak">P</span>roject</h1>
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
                <!--project/add_project-->
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
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="user-email" class="normal-bold">Supervisor</label>
                            <input type="text" class="form-control" id="user-email">
                            <input type="hidden" name="supervisor" id="user-email-id">
                            <div class="user-email-show" id="user-email-show" style="display: none;">
                                
                            </div>
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
                            <input type="submit" class="form-control btn-custom" id="addProject" value="Add" name="add-project">
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- .content -->
        <div class="breadcrumbs details-view">
            <div class="col-sm-4 blue-border-left">
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
                            <th>Supervisor</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody id="project-details-table-tbody">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- /#right-panel -->
    <!-- Right Panel -->
<?php $this->view('masterpage/footer.php'); ?>