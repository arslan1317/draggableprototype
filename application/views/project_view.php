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
                            <input type="submit" class="col-12 btn-custom main-btn form-btn" id="addProject" value="Add" name="add-project">
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
        <div class="content mt-3 mb-4">
            <div class="col-md-12">
                <table id="project-details-table" class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>Id</td>
                            <td>Name</td>
                            <td>Type</td>
                            <td>Start</td>
                            <td>End</td>
                            <td>Supervisor</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody id="project-details-table-tbody">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- /#right-panel -->
    <!-- Right Panel -->
    <!-- view Popup (By Waleed)-->
    <div class="col-12 pupopBg overflow-yscroll" id="pupop" style="display: none;">
        <div class="col-lg-offset-4 col-lg-4 col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 col-11 boxes pupopInnerBox pb-4" style="margin-top:30px; margin-bottom:30px;">
<div class="col-12 pt-3 overflow-hidden p-0 mt-2 mb-2">
<input type="hidden" id="projectid">
<h3 class="float-left col-11 blue-border-left pt-2 pb-2">Project Details</h3>
<p class="float-right pointer closePopopIcon tweak mr-4" onclick="closePupop()">X</p>
<div class="clearfix"></div>
<div id="popup_error" class="alert mb-0 mt-2" style="display:none;"></div>
</div>
<div class="col-12 pb-3">

<div class="form-group col-12 p-0"> 
    <label for="projectNameEdit" class="colorGreen">Project Name</label>
    <input type="text" class="form-control icon-edit pupopBgPosition borderpuopInput" id="projectNameEdit" aria-describedby="" placeholder=" ">
  </div>
   <div class="form-group col-12 p-0">
    <label for="projectTypeEdit" class="colorGreen">Project Type</label>
    <select class="icon-arrowPop form-control borderpuopInput marginicon" id="projectTypeEdit">
        <option>-Select-</option>
        <option value="Music">Music</option>
        <option value="Travel">Travel</option>
        <option value="Pick &amp; Drop">Pick &amp; Drop</option>
    </select>                                
  </div>

    <div class="form-group col-12 p-0">
                            <label for="projectStartEdit" class="colorGreen">Project Start</label>
                            <input type="text" class="form-control icon-edit pupopBgPosition borderpuopInput" id="projectStartEdit" name="projectStartEdit">
   </div>

     <div class="form-group col-12 p-0">
                            <label for="projectEndEdit" class="colorGreen">Project End</label>
                            <input type="text" class="form-control icon-edit pupopBgPosition borderpuopInput" id="projectEndEdit" name="projectEndEdit">
    </div>
<div class="form-group col-12 p-0">
                            <label for="user-emailEdit" class="colorGreen">Supervisor</label>
                            <input type="text" class="form-control icon-edit pupopBgPosition borderpuopInput" id="user-emailEdit">
                            <input type="hidden" name="supervisor" id="user-email-idEdit">
                            <div class="user-email-show-edit col-12" id="user-email-show-edit" style="border-bottom: 1px solid grey; display: none">
                                
                            </div>
 
  </div>

   <div class="form-group col-12 p-0"> 
    <label for="projectDetailsEdit" class="colorGreen">Project Details</label>
    <textarea type="text" class="form-control icon-edit2 borderpuopInput height-70px" id="projectDetailsEdit" style="padding-right:50px !important;"></textarea>
  </div>
  
  
   
 
  <div class="form-group col-12 p-0 m-auto">
      <input type="button" class="btn bg-green col-8 main-btn mt-1" value="UPDATE" onclick="updateProjectById()">
  </div>
      
</div>
</div>
</div>
 <!-- View_popup finished (by Waleed) -->
 
___________project_View________
 <!--Delete_popup (waleed)-->

 <div class="col-12 pupopBg" id="deleteBox" style="display: none;">
<div class="col-lg-3 col-md-4 col-sm-6 col-11 boxes pupopInnerBox">
<div class="col-12 pt-3 overflow-hidden">
<p class="text-center font-familyUniversLT pt-3 pb-3">Are you sure you want to delete this record?</p>
<input type="hidden" id="projectDeleteId">
<div class="form-group col-6 pull-left">
    <input type="button" class="btn bg-green col-12 cursor" id="changeActiveOrInactive" value="YES" onclick="inactiveProject()">
  </div>
  <div class="form-group col-6 pull-right">
    <input type="button" class="btn bg-green col-12 cursor" value="NO" onclick="closeDelPupop()">
  </div>
</div>
</div>
</div>

<!--Delete_popup-->


<?php $this->view('masterpage/footer.php'); ?>