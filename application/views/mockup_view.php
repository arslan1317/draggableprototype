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
                            <button class="btn wire-btn main-btn" id="startWireframes">Start</button>
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

        <div class="content mt-3">
            
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
<?php $this->view('masterpage/footer.php'); ?>