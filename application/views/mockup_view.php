<?php $this->view('masterpage/header.php'); ?>
<body>
<?php $this->view('masterpage/aside.php'); ?>
        <!-- Left Panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">
        <?php $this->view('masterpage/nav.php'); ?>
        <div class="breadcrumbs">
            <div class="col-sm-2">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Mockups</h1>
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
                                    <option value="1">Pick & Drop</option>
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
                            <button class="btn btn-custom wire-btn" id="startMockups">Start</button>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-sm-5 clearfix">
                <div class="float-left">
                    <div class="alert alert-danger text-center login-alert required-error mockups-error">
                        <p>Wireframes Pending</p>
                    </div>
                </div>
                <div class="float-right">
                    <div class="alert alert-danger text-center login-alert required-error mockups-error">
                        <p>Splash Activity Saved</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
<?php $this->view('masterpage/footer.php'); ?>