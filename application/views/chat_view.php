<?php $this->view('masterpage/header.php'); ?>
<body id="chat-page">
  <?php $this->view('masterpage/aside.php'); ?>
  <!-- Left Panel -->

  <!-- Left Panel -->

  <!-- Right Panel -->

  <div id="right-panel" class="right-panel">

    <?php $this->view('masterpage/nav.php'); ?>



    <!-- .content -->
    <div class="breadcrumbs mt-10">
      <div class="col-sm-4 blue-border-left">
        <div class="page-header float-left">
          <div class="page-title">
            <h1><span class="tweak">C</span>hat</h1>
          </div>
        </div>
      </div>
    </div>

    <div class="content mt-4 mb-4">
      <div class="col-md-12">
        <div class="messaging">
        <div class="inbox_msg">
          <div class="inbox_people">
            <div class="headind_srch">
              <div class="recent_heading">
                <h4>Recent</h4>
              </div>
              <div class="srch_bar">
                <div class="stylish-input-group">
                  <input type="text" class="search-bar"  placeholder="Search" >
                  <span class="input-group-addon">
                    <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                  </span>
                </div>
              </div>
            </div>
            <div class="inbox_chat" id="inbox_chat">
              
            </div>
          </div>
          <div class="mesgs">
            <div class="msg_history">
            </div>
            <div class="type_msg">
              <div class="input_msg_write">
                <input type="text" class="write_msg" id="message_text" name="message_text" placeholder="Type a message" />
                <button class="msg_send_btn" type="button" id="sms_send_button" name="sms_send_button"><i class="fas fa-paper-plane"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div><!-- /#right-panel -->
  <!-- Right Panel -->
  <!-- view Popup (By Waleed)-->


  <!--Delete_popup-->


  <?php $this->view('masterpage/footer.php'); ?>