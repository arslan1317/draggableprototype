<?php $this->view('masterpage/header.php'); ?>
<body id="prototype-page">
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
                        <h1><span class="tweak">P</span>rototype</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="page-header">
                    <div class="page-title">
                        <ol class="breadcrumb text-right float-right">
                            <li>
                                <select class="form-control" id="selectProjectForPrototype">
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
                            <button class="btn wire-btn main-btn" id="startPrototype">Start</button>
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
            <div class="checker-div clearfix">
                <div class="col-md-12 text-right save-button mt-0">
                    <span class="mr-3">Progress <i class="far fa-circle" id="assign-progress"></i></span>
                    <span class="mr-3">Submitted <i class="far fa-circle" id="assign-submit"></i></span>
                    <span class="mr-3">Changing <i class="far fa-circle" id="assign-changed"></i></span>
                    <span class="mr-3">Approved <i class="far fa-circle" id="assign-approved"></i></span>
                    <button class="btn main-btn wire-btn" id="submit-prototype">Submit</button>
                    <button class="btn main-btn wire-btn" id="preview-prototype">Preview</button>
                </div>
            </div>
            <div id="pro-box-screens" style="position: relative;">
                
            </div>
        </div> <!-- .content -->
    </div><!-- /#right-panel -->
    <!-- Right Panel -->

    <!-- select Activity Model -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Select Activity</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <label for="select-activity">Select Activity</label>
                <select class="form-control" id="select-activity">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" id="pro-click-button">
            <input type="hidden" id="pro-act-id">
            <input type="hidden" id="button-count">
            <input type="hidden" id="prototype-id">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn wire-btn main-btn" id="save-prototype-number">Save changes</button>
          </div>
        </div>
      </div>
    </div>

<?php $this->view('masterpage/footer.php'); ?>