<?php $this->view('masterpage/header.php'); ?>
<body>
<?php $this->view('masterpage/aside.php'); ?>
        <!-- Left Panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">
        <?php $this->view('masterpage/nav.php'); ?>
        <div class="breadcrumbs">
            <div class="col-md-12">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Profile</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="col-md-12">
                <div class="col-md-2">
                    
                </div>
                <div class="col-md-4 col-md-offset-2 text-right">
                    <hr><p>First Name </p><hr>
                    <p>Last Name </p><hr>
                    <p>Email Address </p><hr>
                </div>
                <div class="col-md-4">
                    <hr><p> Daniyal</p><hr>
                    <p> Hussain</p><hr>
                    <p> daniyalbutt785@gmail.com</p><hr>
                </div>
            </div>

        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
<?php $this->view('masterpage/footer.php'); ?>