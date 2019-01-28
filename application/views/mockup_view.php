<?php $this->view('masterpage/header.php'); ?>
<body id="mockup-page">
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
                        <h1><span class="tweak">M</span>ockups</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="page-header">
                    <div class="page-title">
                        <ol class="breadcrumb text-right float-right">
                            <li>
                                <select class="form-control" id="selectProjectForMockup">
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
                        <ol class="text-right wire-btn-box">
                            <button class="btn wire-btn main-btn" id="startMockups">Start</button>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="float-right">
                    <div class="alert alert-danger text-center login-alert required-error" id="error-box" style="display:none"></div>
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
                            <div class="mobile-inner ui-droppable" id="forMockupClick"></div>
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
            <?php $this->view('masterpage/rightfooter.php'); ?>
        </div>
    </div><!-- /#right-panel -->
    <div class="open-mockup-box" style="display:none">
        <button type="button" class="btn btn-info mt-1" data-toggle="collapse" data-target="#selected-component" style="width: 100%">Selected Item</button>
        <div id="selected-component" class="collapse in show">
            <div class="form-group row" style="margin-bottom: 0px">
                <label for="inputID" class="col-form-label">ID</label>
                <div class="left-input">
                    <input type="text" class="form-control" id="inputID" placeholder="ID" readonly="">
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-info mt-1" data-toggle="collapse" data-target="#property" style="width: 100%">Properties</button>
        <div id="property" class="collapse in show setting-width-mockups">
            <div class="form-group row">
                <label for="inputImage" class="col-form-label">Select Image</label>
                <div class="left-input">
                    <input type="file" class="form-control" id="inputImage">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputFontSize" class="col-form-label">Font Size(px)</label>
                <div class="left-input">
                    <input type="text" class="form-control" id="inputFontSize" placeholder="Font Size">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputFontWeight" class="col-form-label">Font Weight</label>
                <div class="left-input">
                    <input type="text" class="form-control" id="inputFontWeight" placeholder="Font Weight">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputColor" class="col-form-label">Color</label>
                <div class="left-input">
                    <input type="text" class="form-control" id="inputColor" placeholder="Color">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputBgColor" class="col-form-label">Bg Color</label>
                <div class="left-input">
                    <input type="text" class="form-control" id="inputBgColor" placeholder="Bg Color">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputMargin" class="col-form-label">Margin (px)</label>
                <div class="left-input">
                    <input type="text" class="form-control" id="inputMargin" placeholder="T R B L">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPadding" class="col-form-label">Padding (px)</label>
                <div class="left-input">
                    <input type="text" class="form-control" id="inputPadding" placeholder="T R B L">
                </div>
            </div>
        </div>
    </div>
    <!-- Right Panel -->
    <?php $this->view('masterpage/footer.php'); ?>