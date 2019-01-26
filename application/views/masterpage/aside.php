<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <div class="main-logo mt-4 mb-3">
                    <a href="<?php echo base_url();?>user">
			<h2 id="index-logo" style="color:#6195FF; margin-bottom: 0px;border-bottom: 2px solid white;">D<span style="font-size: 20px; color:white">raggable</span> P<span style="font-size: 20px;color:white">rototype</span></h2>
                    </a>
                </div>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse no-padding">
                <ul class="nav navbar-nav aside-bar-padding border-on-hover">
                    <li>
                        <a href="<?php echo base_url();?>user">Dashboard </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>user">Supervisor </a>
                    </li>
                    <li <?php if($this->uri->segment(2)=="submittedwork"){echo 'class="active"';}?>>
                        <a href="<?php echo base_url();?>user/submittedwork">Submitted Work </a>
                    </li>
                    <h3 class="menu-title"><span class="tweak" style="font-size: 20px;">P</span>rovided <span class="tweak" style="font-size: 20px;">B</span>y <span class="tweak" style="font-size: 20px;">Y</span>ou</h3>
                    <li <?php if($this->uri->segment(1)=="project"){echo 'class="active"';}?>>
                        <a href="<?php echo base_url();?>project">Project </a>
                    </li>
                    <li <?php if($this->uri->segment(1)=="task"){echo 'class="active"';}?>>
                        <a href="<?php echo base_url();?>task">Task </a>
                    </li>
                    <li <?php if($this->uri->segment(1)=="assign"){echo 'class="active"';}?>>
                        <a href="<?php echo base_url();?>assign">Assign </a>
                    </li>
                    <h3 class="menu-title"><span class="tweak" style="font-size: 20px;">A</span>ssign <span class="tweak" style="font-size: 20px;">T</span>o <span class="tweak" style="font-size: 20px;">Y</span>ou</h3>
                    <li>
                        <a href="<?php echo base_url();?>notification">Assigned Work </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>notification/main_notifier">Notification </a>
                    </li>
                    <li <?php if($this->uri->segment(1)=="wireframes"){echo 'class="active"';}?>>
                        <a href="<?php echo base_url();?>wireframes">Wireframes </a>
                    </li>
                    <li <?php if($this->uri->segment(1)=="mockups"){echo 'class="active"';}?>>
                        <a href="<?php echo base_url();?>mockups">Mockups </a>
                    </li>
                    <li <?php if($this->uri->segment(1)=="prototypes"){echo 'class="active"';}?>>
                        <a href="<?php echo base_url();?>prototypes">Prototype </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->