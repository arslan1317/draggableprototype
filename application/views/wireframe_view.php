<?php $this->view('masterpage/header.php'); ?>
<body id="wireframe-page">
<?php $this->view('masterpage/aside.php'); ?>
        <!-- Left Panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">
        <?php $this->view('masterpage/nav.php'); ?>
        <div class="breadcrumbs mt-10">
            <div class="col-sm-2 blue-border-left">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><span class="tweak">W</span>ireframes</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="page-header">
                    <div class="page-title">
                        <ol class="breadcrumb text-right float-right">
                            <li>
                                <select class="form-control" id="selectProject">
                                    <option value="0" data-status="-1">--Select Project--</option>
                                </select>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="page-header">
                    <div class="page-title">
                        <ol class="text-right wire-btn-box">
                            <button class="btn wire-btn main-btn" id="startWireframes">Start</button>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="float-right">
                    <div class="alert alert-danger text-center login-alert required-error" id="error-box" style="display:none">
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3 mb-5">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2 offset-md-3">
                        <div class="form-group">
                        <label for="projectID"><span class="tweak">S</span>elected <span class="tweak">A</span>ctivity</label>
                        <input type="text" readonly="" class="form-control" id="selected-activity">
                        <input type="hidden" id="selected-activity-id">
                    </div>
                    </div>
                    <div class="col-md-4">
                        <div class="wireframe-mobile">
                                <div class="mobile-top"></div>
                                <div class="mobile-inner"></div>
                                <div class="mobile-bottom"></div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="save-activity text-center">
                            <h2 class="activityHead"><span class="tweak">A</span>ctivities</h2>
                            <ul id="activity-name-show">
                            </ul>
                        </div>
                        <div class="assign-status mt-3">
                            <span>Progress <i class="far fa-circle" id="assign-progress"></i></span><br>
                            <span>Submitted <i class="far fa-circle" id="assign-submit"></i></span><br>
                            <span>Changing <i class="far fa-circle" id="assign-changed"></i></span><br>
                            <span>Approved <i class="far fa-circle" id="assign-approved"></i></span><br>
                        </div>
                        <input type="hidden" id="assign-id" value="-1">
                        <div class="save-button">
                            <button class="btn main-btn" id="save-wireframe">Save</button>
                            <button class="btn main-btn" id="submit-wireframe">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .content -->
    </div><!-- /#right-panel -->
    <div class="open-wireframe-box" style="display:none">
        <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#activity" style="width: 100%">Activity</button>
        <div id="activity" class="collapse in show">
          <div class="input-group mb-1 mt-1 p-2 pl-3 pr-3">
            <input type="text" id="activity_name" class="form-control" placeholder="Activity" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary main-btn mt-0 frame-open-padding" id="addactivity" type="button"><i class="fas fa-plus"></i></button>
            </div>
          </div>
        </div>
        <button type="button" class="btn btn-info mt-1" data-toggle="collapse" data-target="#components" style="width: 100%">Component</button>
        <div id="components" class="collapse in show mb-1 mt-1 p-2 pl-3 pr-3">
            <ul>
                <li><p id="labelDrop" class="border-on-icon"><i class="fas fa-font"><br><span>Label</span></i></p></li>
                <li><p id="inputDrop" class="border-on-icon"><i class="far fa-square"><br><span>Input</span></i></p></li>
                <li><p id="buttonDrop" class="border-on-icon"><i class="fas fa-square-full"><br><span>Button</span></i></p></li>
                <li><p id="imageDrop" class="border-on-icon"><i class="far fa-image"><br><span>Image</span></i></p></li>
                <li><p id="radioDrop" class="border-on-icon"><i class="far fa-circle"><br><span>Radio</span></i></p></li>
                <li><p id="checkboxDrop" class="border-on-icon"><i class="far fa-check-square"><br><span>Checkbox</span></i></p></li>
            </ul>

        </div>
        <button type="button" class="btn btn-info mt-1" data-toggle="collapse" data-target="#property" style="width: 100%">Properties</button>
        <div id="property" class="collapse in show">
            <div class="form-group row">
                <label for="inputID" class="col-form-label">ID</label>
                <div class="left-input">
                    <input type="text" class="form-control" id="inputID" placeholder="ID">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputWidth" class="col-form-label">Width</label>
                <div class="left-input">
                    <input type="text" class="form-control" id="inputWidth" placeholder="Width">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputHeight" class="col-form-label">Height</label>
                <div class="left-input">
                    <input type="text" class="form-control" id="inputHeight" placeholder="Height">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputTop" class="col-form-label">Top</label>
                <div class="left-input">
                    <input type="text" class="form-control" id="inputTop" placeholder="Top">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputLeft" class="col-form-label">Left</label>
                <div class="left-input">
                    <input type="text" class="form-control" id="inputLeft" placeholder="Left">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputRight" class="col-form-label">Right</label>
                <div class="left-input">
                    <input type="text" class="form-control" id="inputRight" placeholder="Right">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputBottom" class="col-form-label">Bottom</label>
                <div class="left-input">
                    <input type="text" class="form-control" id="inputBottom" placeholder="Bottom">
                </div>
            </div>
        </div>
    </div>
    <!-- Right Panel -->
<?php $this->view('masterpage/footer.php'); ?>