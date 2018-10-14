<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <div class="main-logo mt-4 mb-3">
                    <a href="index.html">
			<h2 id="index-logo" style="color:#6195FF; margin-bottom: 0px;border-bottom: 2px solid white;">D<span style="font-size: 20px; color:white">raggable</span> P<span style="font-size: 20px;color:white">rototype</span></h2>
                    </a>
                </div>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse no-padding">
                <div id="wireframe-box" style="display: none">
                    <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-th">
                            </span>Activities</a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table>
                                <tr>
                                    <td><input type="text" class="form-control" placeholder="Activity Name"></td>
                                    <td><button class="btn btn-default"><i class="fa fa-plus"></i></button></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-folder-close">
                            </span>Shapes</a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="shapes-box">
                                <button class="wireframes-btn" title="Circle"><i class="fa fa-circle-o"></i></button>
                                <button class="wireframes-btn" title="Rectangle"><i class="fa fa-square-o"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-user">
                            </span>Propertise</a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <a href="http://www.jquery2dotnet.com">Change Password</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="http://www.jquery2dotnet.com">Notifications</a> <span class="label label-info">5</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="http://www.jquery2dotnet.com">Import/Export</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-trash text-danger"></span><a href="http://www.jquery2dotnet.com" class="text-danger">
                                            Delete Account</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
                </div>
                <ul class="nav navbar-nav aside-bar-padding border-on-hover">
                    <li class="active">
                        <a href="<?php echo base_url();?>user">Dashboard </a>
                    </li>
                    <li class="active">
                        <a href="<?php echo base_url();?>user">Supervisor </a>
                    </li>
                    <h3 class="menu-title"><span class="tweak" style="font-size: 20px;">P</span>rovided <span class="tweak" style="font-size: 20px;">B</span>y <span class="tweak" style="font-size: 20px;">Y</span>ou</h3>
                    <li>
                        <a href="<?php echo base_url();?>project">Project </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>task">Task </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>assign">Assign </a>
                    </li>
                    <h3 class="menu-title"><span class="tweak" style="font-size: 20px;">A</span>ssign <span class="tweak" style="font-size: 20px;">T</span>o <span class="tweak" style="font-size: 20px;">Y</span>ou</h3>
                    <li>
                        <a href="<?php echo base_url();?>notification">Assigned Work </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>notification/main_notifier">Notification </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>wireframes">Wireframes </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>mockups">Mockups </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>prototypes">Prototype </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->