<?php $this->view('masterpage/header.php'); ?>
<body id="task-page">
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
                        <h1><span class="tweak">T</span>ask</h1>
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
                <!-- task/add_task -->
                <div class="col-md-12">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="projectName" class="normal-bold">Project Name</label>
                            <select name="projectName" id="projectNameTask" class="form-control">
                                <option value="">--Select--</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="taskType" class="normal-bold">Task Type</label>
                              <select class="form-control" id="taskType" name="taskType">
                                <option value="">--Select--</option>
                                <option value="1">Wireframe</option>
                                <option value="2">Mockup</option>
                                <option value="3">Prototype</option>
                              </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="taskStart" class="normal-bold">Task Start</label>
                            <input type="text" class="form-control" id="projectStart" name="taskStart">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="taskEnds" class="normal-bold">Task End</label>
                            <input type="text" class="form-control" id="projectEnd" name="taskEnd">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="taskDetails" class="normal-bold">Task Details</label>
                            <textarea class="form-control" rows="1" id="taskDetail" name="taskDetail"></textarea>
                        </div>
                    </div>
                    <div class="col-md-3 col-md-offset-3">
                        <div class="form-group">
                            <input type="submit" class="main-btn form-btn col-12" id="addTask" value="Add" name="add-task">
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .content -->
        <div class="breadcrumbs details-view">
            <div class="col-sm-4 blue-border-left">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><span class="tweak">T</span>ask <span class="tweak">D</span>etails</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3 mb-4">
            <div class="col-md-12">
                <table id="task-details-table" class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>Id</td>
                            <td>Name</td>
                            <td>Type</td>
                            <td>Start</td>
                            <td>End</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody id="task-details-table-tbody">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- /#right-panel -->
    <!-- view Popup (By Waleed)-->
    <div class="col-12 pupopBg overflow-yscroll" id="pupop" style="display:none;">
        <div class="col-lg-offset-4 col-lg-4 col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 col-11 boxes pupopInnerBox pb-4" style="margin-top:30px; margin-bottom:30px;">
<div class="col-12 pt-3 overflow-hidden p-0 mt-2 mb-2">
<input type="hidden" id="taskid">
<h3 class="pull-left col-11 blue-border-left pt-2 pb-2">Task Details</h3>
<p class="pull-right pointer closePopopIcon tweak mr-4" onclick="closePupop()">X</p>
<div class="clearfix"></div>
<div id="popup_error" class="alert mb-0 mt-2" style="display:none;"></div>
</div>
<div class="col-12 pb-3">

<div class="form-group col-12 p-0"> 
    <label for="projectNameEdit" class="colorGreen">Project Name</label>
    <select class="icon-arrowPop form-control borderpuopInput marginicon" id="projectNameEdit">
        <option>-Select-</option>
    </select>  
  </div>
   <div class="form-group col-12 p-0">
    <label for="taskTypeEdit" class="colorGreen">Task Type</label>
    <select class="icon-arrowPop form-control borderpuopInput marginicon" id="taskTypeEdit">
                             <option value="">--Select--</option>
                                <option value="1">Wireframe</option>
                                <option value="2">Mockup</option>
                                <option value="3">Prototype</option>
    </select>                                
  </div>

    <div class="form-group col-12 p-0">
                            <label for="taskStartEdit" class="colorGreen">Task Start</label>
                            <input type="text" class="form-control icon-edit pupopBgPosition borderpuopInput" id="taskStartEdit" name="taskStartEdit">
   </div>

     <div class="form-group col-12 p-0">
                            <label for="taskEndEdit" class="colorGreen">Task End</label>
                            <input type="text" class="form-control icon-edit pupopBgPosition borderpuopInput" id="taskEndEdit" name="taskEndEdit">
    </div>
 
  

   <div class="form-group col-12 p-0"> 
    <label for="taskDetailsEdit" class="colorGreen">Task Details</label>
    <textarea type="text" class="form-control icon-edit2 borderpuopInput height-70px" id="taskDetailsEdit" style="padding-right:50px !important;"></textarea>
  </div>
  
  
   
 
  <div class="form-group col-12 p-0 m-auto">
      <input type="button" class="btn bg-green col-8 main-btn mt-1" value="UPDATE" onclick="updateTaskById()">
  </div>
      
</div>
</div>
</div>
 <!-- View_popup finished (by Waleed) -->
    <!-- Right Panel -->
<?php $this->view('masterpage/footer.php'); ?>