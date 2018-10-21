<?php $this->view('masterpage/header.php'); ?>
<body id="wireframe-page">
<?php $this->view('masterpage/aside.php'); ?>
        <!-- Left Panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">
        <?php $this->view('masterpage/nav.php'); ?>
        <div class="breadcrumbs mt-10">
            <div class="col-sm-2">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Wireframes</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="page-header">
                    <div class="page-title">
                        <ol class="breadcrumb text-right float-right">
                            <li>
                                <select class="form-control" id="selectProject">
                                    <option value="0">--Select Project--</option>
                                </select>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="page-header">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <button class="btn btn-custom wire-btn" id="startWireframes">Start</button>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="float-right">
                    <div class="alert alert-danger text-center login-alert required-error">
                        <p>Splash Activity Saved</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2 offset-md-3">
                        <div class="form-group">
                        <label for="projectID">Selected Activity</label>
                        <input type="text" placeholder="Splash Activity" readonly="" class="form-control">
                    </div>
                    </div>
                    <div class="col-md-3">
                        <div class="wireframe-mobile">
                                <div class="mobile-top"></div>
                                <div class="mobile-inner"></div>
                                <div class="mobile-bottom"></div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="save-activity text-center">
                            <h2 class="activityHead">Activities</h2>
                            <ul>
                                <li>Splash Activity</li>
                                <li>Main Activity</li>
                            </ul>
                        </div>
                        <div class="save-button mt-">
                            <button class="btn btn-custom">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .content -->
    </div><!-- /#right-panel -->
    <div class="open-wireframe-box" style="display:none">
        <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#activity" style="width: 100%">Activity</button>
        <div id="activity" class="collapse in show">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit,
          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </div>
        <button type="button" class="btn btn-info mt-1" data-toggle="collapse" data-target="#components" style="width: 100%">Component</button>
        <div id="components" class="collapse in show">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit,
          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </div>
        <button type="button" class="btn btn-info mt-1" data-toggle="collapse" data-target="#property" style="width: 100%">Component</button>
        <div id="property" class="collapse in show">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit,
          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </div>
    </div>
    <!-- Right Panel -->
<?php $this->view('masterpage/footer.php'); ?>