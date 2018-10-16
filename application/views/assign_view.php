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
                            <input type="submit" class="btn-custom main-btn form-btn" id="addAssign" value="Add" name="add-assign">
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
                <table id="assign-details-table" class="table table-condensed table-striped">
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
<!-- view Popup (By Waleed)-->
    <div class="col-12 pupopBg overflow-yscroll" id="pupop" style="display:none;">
        <div class="col-lg-offset-4 col-lg-4 col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 col-11 boxes pupopInnerBox pb-4" style="margin-top:30px; margin-bottom:30px;">
<div class="col-12 pt-3 overflow-hidden p-0 mt-2 mb-2">
<h3 class="pull-left col-11 blue-border-left pt-2 pb-2">Assign Details</h3>
<p class="pull-right pointer closePopopIcon tweak mr-4" onclick="closePupop()">X</p>
<div class="clearfix"></div>
<div id="empeupdate" class="alert-danger" style="display:none;">Please fill-in all the mandatory fields.</div>
</div>
<div class="col-12 pb-3">

    <div class="form-group col-12 p-0">
                            <label for="user-emailEdit" class="colorGreen">User Email</label>
                            <input type="text" class="form-control icon-edit pupopBgPosition borderpuopInput" id="user-emailEdit">
                            <input type="hidden" name="supervisor" id="user-email-idEdit">
                            <div class="user-email-show-edit col-12" id="user-email-show-edit" style="border-bottom: 1px solid grey; display: none">
                                
                            </div>
 
  </div>

<div class="form-group col-12 p-0"> 
    <label for="projectNameEdit" class="colorGreen">Project Name</label>
    <select class="icon-arrowPop form-control borderpuopInput marginicon" id="projectNameEdit">
        <option>-Select-</option>
    </select>  
  </div>
   <div class="form-group col-12 p-0">
    <label for="taskTypeEdit" class="colorGreen">Task </label>
    <select class="icon-arrowPop form-control borderpuopInput marginicon" id="taskTypeEdit">
                             <option value="">--Select--</option>
                                <option value="1">Wireframe</option>
                                <option value="2">Mockup</option>
                                <option value="3">Prototype</option>
    </select>                                
  </div>

    <div class="form-group col-12 p-0">
                            <label for="assignStartEdit" class="colorGreen">Task Date Start </label>
                            <input type="text" class="form-control icon-edit pupopBgPosition borderpuopInput" id="assignStartEdit" name="assignStartEdit">
   </div>

     <div class="form-group col-12 p-0">
                            <label for="assignEndEdit" class="colorGreen">Task Date End </label>
                            <input type="text" class="form-control icon-edit pupopBgPosition borderpuopInput" id="assignEndEdit" name="assignEndEdit">
    </div>
 
  

   <div class="form-group col-12 p-0"> 
    <label for="assignDetailsEdit" class="colorGreen">Assign Details</label>
    <textarea type="text" class="form-control icon-edit2 borderpuopInput height-70px" id="assignDetailsEdit" style="padding-right:50px !important;"></textarea>
  </div>
  
  
   
 
  <div class="form-group col-12 p-0 m-auto">
      <input type="button" class="btn bg-green col-8 main-btn mt-1" value="UPDATE" onclick="updateEmp()">
  </div>
      
</div>
</div>
</div>
 <!-- View_popup finished (by Waleed) -->

    <!-- Right Panel -->
<?php $this->view('masterpage/footer.php'); ?>