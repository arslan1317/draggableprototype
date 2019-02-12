// $.noConflict();
var GLOBALREQUEST;
var USER_APPROVED_GLOBAL_ACTIVITY_RESULT;
jQuery(document).ready(function($) {
        //Notication VIew
        GLOBALREQUEST = new Array();
        $(document).on('keydown', function(e) {
            if((e.target.id != 'inputWidth') && (e.target.id != 'inputHeight') && (e.target.id != 'inputTop') && (e.target.id != 'inputLeft') && (e.target.id != 'inputRight') && (e.target.id != 'inputBottom') && ($(e.target).attr('class') != 'form-control no-select') && ($(e.target).attr('class') != 'no-select')){
                if ((e.keyCode == 46) || (e.keyCode == 8)) {
                        $('.mobile-inner .selected').remove();
                }
            }
        });

        $('.open-dropdown-box').click(function(e) {
                var openDropBox = $(e.target).parent().parent().siblings()
                $(openDropBox).fadeToggle('fast', 'linear', function() {
                        return false;
                });
        });

        $(document).click(function(e) {
                $('.dropdown-boxes').fadeOut();
                var targetId = $(e.target).attr('id');

                if ((targetId == 'hideShowDropDown') || (targetId == 'showUserName')) {
                        $('.user-menu').fadeIn();
                } else {
                        $('.user-menu').fadeOut();
                }
        });

        $('.open-dropdown-box, .dropdown-boxes').click(function() {
                return false; // DO NOTHING WHEN CONTAINER IS CLICKED.
        });

        var bodyId = $('body').attr('id');
        if (bodyId == "project-page") {
                loadAllProjectsFromDatabase();
                initDatapickerOnProjectDateField();
                editDatapickerOnProjectDateField();
        } else if (bodyId == 'task-page') {
                loadAllTasksFromDatabase();
                initDatapickerOnTaskDateField();
                editDatapickerOnTaskDateField();
        } else if (bodyId == 'assign-page') {
                getProjectNameHavingTask();
                getAllAssignWithDatabase();
                initDatapickerOnProjectDateField();
        } else if (bodyId == 'wireframe-page') {
                allWireframesMethods();
        } else if (bodyId == 'mockup-page') {
                allMockupsMethods();
        } else if (bodyId == 'prototype-page') {
                allPrototypeMethods();
        }else if(bodyId == 'chat-page'){
                allProjectCreatedChat();
        }

        $("#labelDrop, #inputDrop, #buttonDrop, #imageDrop, #radioDrop, #checkboxDrop").draggable({
                revert: 'invalid',
                cursor: 'move',
                appendTo: "body",
                helper: 'clone',
                zIndex: 9999999
        });

        var dropLabel = 0;
        var dropInput = 0;
        var dropButton = 0;
        var dropImage = 0;
        var dropRadio = 0;
        var dropCheckbox = 0;

        $(".mobile-inner").droppable({
                accept: '#labelDrop, #inputDrop, #buttonDrop, #imageDrop, #radioDrop, #checkboxDrop',
                hoverClass: "drop-hover",
                drop: function(event, ui) {
                        $('.mobile-inner').children().removeClass('selected');
                        var draggable = ui.draggable;
                        var getID = draggable.prop("id");
                        var dragged = draggable.clone();
                        $('.item').removeClass('selected');
                        $(dragged).addClass('item selected');
                        $(dragged).removeClass("ui-draggable");
                        $(ui.helper).remove();
                        $(dragged).draggable({
                                containment: 'parent'
                        });
                        var newPosY = ui.offset.top - $(this).offset().top;
                        var newPosX = ui.offset.left - $(this).offset().left;
                        $(dragged).css({ 'margin-bottom': '0px', 'position': 'absolute', 'top': newPosY, 'left': newPosX }).appendTo('.mobile-inner');
                        if (getID == 'labelDrop') {
                                dropLabel++;
                                $(dragged).html('Text');
                                var newDropId = 'text_view_' + dropLabel;
                                addSomeAttributes(dragged, newDropId);
                        } else if (getID == 'inputDrop') {
                                dropInput++;
                                $(dragged).css({ 'padding': '4px', 'border': '0px', width: '10%', height: '8%' });
                                $(dragged).html('');
                                $(dragged).append('<input type="text" style="width:-webkit-fill-available;height:100% !important">');
                                var newDropId = 'edit_text_' + dropInput;
                                addSomeAttributes(dragged, newDropId);
                        } else if (getID == 'buttonDrop') {
                                dropButton++;
                                $(dragged).css({ 'padding': '4px', 'border': '0px', width: '20%', height: '8%' });
                                $(dragged).html('');
                                $(dragged).append('<input type="button" style="width:-webkit-fill-available;height:100% !important" value="Button">');
                                var newDropId = 'Button_' + dropButton;
                                addSomeAttributes(dragged, newDropId);
                        } else if (getID == 'imageDrop') {
                                dropImage++;
                                (dragged).css({ 'padding': '4px', 'border': '0px', width: '20%', height: '8%' });
                                $(dragged).html('');
                                $(dragged).append('<img src="' + baseURL + 'assets/images/image.png" style="width:-webkit-fill-available;height:100% !important">');
                                var newDropId = 'image_' + dropImage;
                                addSomeAttributes(dragged, newDropId);
                        } else if (getID == 'radioDrop') {
                                dropRadio++;
                                (dragged).css({ 'padding': '4px', 'border': '0px', width: '10%', height: '8%' });
                                $(dragged).html('');
                                $(dragged).append('<input type="radio" style="width:-webkit-fill-available;height:100% !important">');
                                var newDropId = 'radio_' + dropRadio;
                                addSomeAttributes(dragged, newDropId);
                        } else if (getID == 'checkboxDrop') {
                                dropCheckbox++;
                                (dragged).css({ 'padding': '4px', 'border': '0px', width: '10%', height: '8%' });
                                $(dragged).html('');
                                $(dragged).append('<input type="checkbox" style="width:-webkit-fill-available;height:100% !important">');
                                var newDropId = 'checkbox_' + dropCheckbox;
                                addSomeAttributes(dragged, newDropId);
                        }
                        $(dragged).resizable({
                                containment: 'parent'
                        });

                        $(".item").mousedown(function() {
                                $('.mobile-inner').children().removeClass('selected');
                                $('.item').removeClass('selected');
                                $(this).addClass('selected');
                                var id = $(this).attr('id');
                                addSomeAttributes(this, id);
                        });
                }
        });

        $('#startWireframes').click(function() {
                var selectedProject = $('#selectProject').val();
                if (selectedProject == 0) {
                        errorBox('<p>Please Select Project Name</p>');
                } else {
                        $('.open-wireframe-box').fadeIn('slow');
                }
        });

        $('#startPrototype').click(function() {
                $('#protoype-view-box').html('');
                var selectedProject = $('#selectProjectForPrototype').val();
                if (selectedProject == 0) {
                        errorBox('<p>Please Select Project Name</p>');
                } else {
                    $("#preview-prototype").prop('disabled', false);
                    if($('#selectProjectForPrototype option:selected').attr('data-assign-id') != 0){
                        $("#submit-prototype").prop('disabled', false);
                        $('#first-activity').prop('disabled', false);
                    }
                    var assignId = $('#selectProjectForPrototype option:selected').attr('data-assign-id');
                    $('#assign-id').val(assignId);
                    printPrototype(selectedProject);
                }
        });

        $('#save-prototype-number').click(function(){
            var button = $('#pro-click-button').val();
            var activity_id = $('#select-activity').val();
            var activity_name = $("#select-activity option:selected").text();
            var id = $('#pro-act-id').val();
            var checkerId = $('#prototype-id').val();
            var buttonCount = $('#button-count').val();
            if(checkerId != ''){
                //update
                 $.ajax({
                        url: baseURL + 'prototypes/updateButtonSequence',
                        method: 'post',
                        type: 'post',
                        data: { button: button, activity_id:activity_id, activity_name:activity_name, id:id, buttonCount:buttonCount, checkerId:checkerId},
                        dataType: 'json',
                        success: function(response) {
                            if(response == true){
                                $('#exampleModal').modal('hide');
                                successBox('<p>Sequence Of Prototype Updated</p>');
                                printPrototype($("#selectProjectForPrototype option:selected").val());
                            }
                        }
                });
            }else{
                //insert
                $.ajax({
                        url: baseURL + 'prototypes/storeButtonSequence',
                        method: 'post',
                        type: 'post',
                        data: { button: button, activity_id:activity_id, activity_name:activity_name, id:id, buttonCount:buttonCount},
                        dataType: 'json',
                        success: function(response) {
                            if(response == true){
                                successBox('<p>Sequence Of Prototype Inserted</p>');
                            }
                        }
                });
            }
        });

        $('#selectProject').change(function() {
                var selectedProject = $('#selectProject').val();
                if (selectedProject != 0) {
                        $.ajax({
                                url: baseURL + 'wireframes/getWireframeStatus',
                                method: 'post',
                                type: 'post',
                                data: { projectid: selectedProject },
                                dataType: 'json',
                                success: function(response) {
                                        console.log(response);
                                        var statusOfWireframe = response[0]['a_status'];
                                        $('#assign-id').val(response[0]['a_id']);
                                        console.log(statusOfWireframe);
                                        if (statusOfWireframe == 0) {
                                                errorBox('<p>Wireframe is in Progress State</p>');
                                                getAllActivities(selectedProject);
                                                assingStatusFunction(0);
                                        } else if (statusOfWireframe == 1) {
                                                errorBox('<p>Wireframe is in Submit State</p>');
                                                assingStatusFunction(1);
                                        } else if (statusOfWireframe == 2) {
                                                errorBox('<p>Wireframe is Approved</p>');
                                                assingStatusFunction(2);
                                        } else {
                                                getAllActivities(selectedProject);
                                                //assignstatus
                                                //0 progress
                                                //1 submit
                                                //2 approved
                                                //3 change
                                                var assignId = $(this).children("option:selected").data('assign-id');
                                                $('#assign-id').val(assignId);
                                                var assignStatus = $(this).children("option:selected").data('status');
                                                assingStatusFunction(assignStatus);
                                                successBox('<p>Prototype Can Start</p>');
                                                var a = $('#selectProjectForPrototype').find(':selected').data('status-id');
                                                if (a == 0) {
                                                        $('#assign-progress').css({ 'background-color': 'blue', 'border-radius': '50px' });
                                                }
                                        }
                                }
                        });
                } else {
                        $('#activity-name-show').html('');
                }
        });

        $('#first-activity').change(function(){
            var value = $(this).val();
            var projectId = $('#selectProjectForPrototype option:selected').val();
            if(value != 0){
                $.ajax({
                        url: baseURL + 'activity/update_first_activity',
                        method: 'post',
                        type: 'post',
                        dataType: 'json',
                        data: { value: value, projectId:projectId },
                        dataType: 'json',
                        success: function(response) {
                                GLOBAL_ACTIVITY_RESULT = response;
                                console.log(response);
                                successBox('<p>First Activity Saved Successfully</p>');
                        }
                });
            }
        });

        $('#submit-prototype').click(function(){
            var activityId = $('#assign-id').val();
            if (activityId == -1) {
                    errorBox('<p>No Project Selected</p>');
            } else {
                    $.ajax({
                            url: baseURL + 'assign/update_status',
                            method: 'post',
                            type: 'post',
                            dataType: 'json',
                            data: { activityId: activityId },
                            dataType: 'json',
                            success: function(response) {
                                    successBox('<p>Prototype Submitted Successfully</p>');
                                    assingStatusFunction(1);
                            }
                    });
            }
        });

        function assingStatusFunction(assignStatus) {
                $('#assign-progress').css('background-color', 'white');
                $('#assign-submit').css('background-color', 'white');
                $('#assign-approved').css('background-color', 'white');
                if (assignStatus == 0) {
                        //not action is taken
                        $('#assign-progress').css({ 'background-color': 'blue', 'border-radius': '50px' });
                } else if (assignStatus == 1) {
                        //when submited
                        $('#assign-submit').css({ 'background-color': 'blue', 'border-radius': '50px' });
                        $('#startWireframes').attr("disabled", "disabled");
                        $('#activity-name-show i').attr("disabled", "disabled");
                        $('.save-button button').attr("disabled", "disabled");
                } else if (assignStatus == 2) {
                        //when approved
                        $('#startWireframes').attr("disabled", "disabled");
                        $('#assign-approved').css({ 'background-color': 'blue', 'border-radius': '50px' });
                        $('.save-button button').attr("disabled", "disabled");
                } else {
                        //when change is occured

                }
        }

        $('#submit-wireframe').click(function() {
                var activityId = $('#assign-id').val();
                if (activityId == -1) {
                        errorBox('<p>No Project Selected</p>');
                } else {
                        $.ajax({
                                url: baseURL + 'assign/update_status',
                                method: 'post',
                                type: 'post',
                                dataType: 'json',
                                data: { activityId: activityId },
                                dataType: 'json',
                                success: function(response) {
                                        successBox('<p>Wireframe Submitted Successfully</p>');
                                        assingStatusFunction(1);
                                }
                        });
                }
        });

        $('#submit-mockup').click(function() {
                var activityId = $('#assign-id').val();
                if (activityId == -1) {
                        errorBox('<p>No Project Selected</p>');
                } else {
                        $.ajax({
                                url: baseURL + 'assign/update_status',
                                method: 'post',
                                type: 'post',
                                dataType: 'json',
                                data: { activityId: activityId },
                                dataType: 'json',
                                success: function(response) {
                                        successBox('<p>Mockup Submitted Successfully</p>');
                                        assingStatusFunction(1);
                                }
                        });
                }
        });

        $('#addactivity').click(function() {
                var activityname = $('#activity_name').val();
                var projectid = $('#selectProject').val();
                $.ajax({
                        url: baseURL + 'activity/insert_activity',
                        method: 'post',
                        type: 'post',
                        dataType: 'json',
                        data: { activityname: activityname, projectid: projectid },
                        dataType: 'json',
                        success: function(response) {
                                if (response) {
                                        var selectedProject = $('#selectProject').val();
                                        getAllActivities(selectedProject);
                                        $('#activity_name').val('');
                                }
                        }
                });
        });

        $('#save-wireframe').click(function() {
                var activityName = $('#selected-activity').val();
                var activityId = $('#selected-activity-id').val();
                if (activityName == '') {
                        errorBox('<p>Please Select the Activity</p>')
                } else {
                        var xmlHeader = '<?xml version="1.0" encoding="utf-8"?><android.support.constraint>';
                        var xmlFooter = '</android.support>';
                        $('.mobile-inner p').resizable('destroy');
                        // var getWireframeCode = $('.mobile-inner').html();
                        var getWireframeCode = $('.mobile-inner').html();
                        $('.mobile-inner').children().removeClass('selected');
                        $.ajax({
                                url: baseURL + 'activity/insert_wireframe_code',
                                method: 'post',
                                type: 'post',
                                dataType: 'json',
                                data: { activityId: activityId, getWireframeCode: getWireframeCode },
                                dataType: 'json',
                                success: function(response) {
                                        if (response == 1) {
                                                successBox('<p>Wireframe Saved Successfully</p>');
                                        }
                                }
                        });
                }
        });

        //for mockupsave
        $('#save-mockup').click(function() {
                var id = $('#activity-name-show li.active').attr('id');
                if(id == null){
                    errorBox('<p>Please Select the Activity</p>')
                }else{
                    var image = $('.mobile-inner p').has('img');
                    if(image.length != 0){
                        image = $(image).children().attr('src');
                    }else{
                        image = '';
                    }
                    $('.mobile-inner').removeClass('selected');
                    $('.mobile-inner p').removeClass('selected');
                    var bgColor = $('.mobile-inner').css('backgroundColor');
                    var getMockupCode = $('.mobile-inner').html();
                    $.ajax({
                            url: baseURL + 'activity/insert_mockup_code',
                            method: 'post',
                            type: 'post',
                            dataType: 'json',
                            data: { id: id, getMockupCode: getMockupCode, bgColor:bgColor, image:image},
                            dataType: 'json',
                            success: function(response) {
                                    console.log(response);
                                    console.log(response.act_id);
                                    if(response.mockup_code != null){
                                        $('.mobile-inner').html(response.mockup_code);
                                        $('.mobile-inner').css('backgroundColor', response.mockup_back_color)
                                    }else{
                                        $('.mobile-inner').html(response.act_code);
                                    }
                                    successBox('<p>Mockup Saved Successfully</p>');
                            }
                    });
                }
        });

        //for wireframe
        $( "#inputWidth" ).keyup(function() {
            var value = $(this).val();
            $('.mobile-inner p.selected').css('width', value+'px');
        });

        $( "#inputHeight" ).keyup(function() {
            var value = $(this).val();
            $('.mobile-inner p.selected').css('height', value+'px');
        });

        $( "#inputTop" ).keyup(function() {
            var value = $(this).val();
            $('.mobile-inner p.selected').css('top', value+'px');
        });

        $( "#inputLeft" ).keyup(function() {
            var value = $(this).val();
            $('.mobile-inner p.selected').css('left', value+'px');
        });

        $( "#inputRight" ).keyup(function() {
            var value = $(this).val();
            $('.mobile-inner p.selected').css('right', value+'px');
        });

        $( "#inputBottom" ).keyup(function() {
            var value = $(this).val();
            $('.mobile-inner p.selected').css('bottom', value+'px');
        });

        //for mockups
        $( "#inputText" ).keyup(function() {
            var value = $(this).val();
            var a = $('.mobile-inner p.selected').has('input');
            if(a.length == 0){
                $('.mobile-inner p.selected').text(value);
            }else{
                var getInputId = $(a).attr('id');
                var splitId = getInputId.split('_');
                if(splitId[0] == 'edit'){
                    $('.mobile-inner p.selected input').attr("placeholder", value);
                }else{
                    $('.mobile-inner p.selected input').val(value);  
                }
            }
        });

        $( "#inputFontSize" ).keyup(function() {
            var value = $(this).val();
            var a = $('.mobile-inner p.selected').has('input');
            if(a.length == 0){
                $('.mobile-inner p.selected').css('fontSize', value+'px');
            }else{
                $('.mobile-inner p.selected input').css('fontSize', value+'px');
            }
        });

        $( "#inputFontWeight" ).keyup(function() {
            var value = $(this).val();
            $('.mobile-inner p.selected').css('fontWeight', value);
        });

        $('#inputMarginTop').keyup(function() {
            var value = $(this).val();
            $('.mobile-inner p.selected').css('marginTop', value+'px');
        });

        $('#inputMarginLeft').keyup(function() {
            var value = $(this).val();
            $('.mobile-inner p.selected').css('marginLeft', value+'px');
        });

        $('#inputMarginRight').keyup(function() {
            var value = $(this).val();
            $('.mobile-inner p.selected').css('marginRight', value+'px');
        });

        $('#inputMarginBottom').keyup(function() {
            var value = $(this).val();
            $('.mobile-inner p.selected').css('marginBottom', value+'px');
        });

        $('#inputPaddingTop').keyup(function() {
            var value = $(this).val();
            var a = $('.mobile-inner p.selected').has('input');
            if(a.length == 0){
                $('.mobile-inner p.selected').css('paddingTop', value+'px');
            }else{
                $('.mobile-inner p.selected').css('paddingTop', value+'px');
            }
        });

        $('#inputPaddingLeft').keyup(function() {
            var value = $(this).val();
            var a = $('.mobile-inner p.selected').has('input');
            if(a.length == 0){
                $('.mobile-inner p.selected').css('paddingLeft', value+'px');
            }else{
                $('.mobile-inner p.selected input').css('paddingLeft', value+'px');
            }
        });

        $('#inputPaddingRight').keyup(function() {
            var value = $(this).val();
            var a = $('.mobile-inner p.selected').has('input');
            if(a.length == 0){
                $('.mobile-inner p.selected').css('paddingRight', value+'px');
            }else{
                $('.mobile-inner p.selected input').css('paddingRight', value+'px');
            }
        });

        $('#inputPaddingBottom').keyup(function() {
            var value = $(this).val();
            var a = $('.mobile-inner p.selected').has('input');
            if(a.length == 0){
                $('.mobile-inner p.selected').css('paddingBottom', value+'px');
            }else{
                $('.mobile-inner p.selected input').css('paddingBottom', value+'px');
            }
        });

        $('#inputLineHeight').keyup(function() {
            var value = $(this).val();
            $('.mobile-inner p.selected').css('lineHeight', value+'px');
        });

        $('#inputAlignText').change(function() {
            var value = $(this).find('option:selected').val();
            $('.mobile-inner p.selected').css('textAlign', value);
        });

        $('#download-wireframe').click(function(){
            html2canvas($('.mobile-inner'), 
            {
              onrendered: function (canvas) {
                var a = document.createElement('a');
                // toDataURL defaults to png, so we need to request a jpeg, then convert for file download.
                a.href = canvas.toDataURL("image/jpeg").replace("image/jpeg", "image/octet-stream");
                a.download = 'image.jpg';
                a.click();
              }
            });
        });

        function getAllActivities(selectedProject) {
                $.ajax({
                        method: 'post',
                        type: 'post',
                        url: baseURL + 'activity/get_activity_name_by_project',
                        data: { selectedProject: selectedProject },
                        dataType: 'json',
                        success: function(response) {
                                if (response == '') {
                                        $('#activity-name-show').html('');
                                } else {
                                        $('#activity-name-show').html('');
                                        for (var i = 0; i < response.length; i++) {
                                                $('#activity-name-show').append('<li><span onclick="selectedActivity(this)" id="' + response[i]['act_id'] + '">' + response[i]['act_name'] + '</span> <i class="far fa-edit tweak"></i> <i class="far fa-trash-alt tweak"></i></li>');
                                        }
                                }
                        }
                });
        }

        function initDatapickerOnProjectDateField() {
                $("#projectStart").datepicker({
                        numberOfMonths: 2,
                        onSelect: function(selected) {
                                $("#projectEnd").datepicker("option", "minDate", selected)
                        }
                });
                $("#projectEnd").datepicker({
                        numberOfMonths: 2,
                        onSelect: function(selected) {
                                $("#projectStart").datepicker("option", "maxDate", selected)
                        }
                });
        }

        function initDatapickerOnTaskDateField() {
                $("#taskStart").datepicker({
                        numberOfMonths: 2,
                        onSelect: function(selected) {
                                $("#taskEnd").datepicker("option", "minDate", selected)
                        }
                });
                $("#taskEnd").datepicker({
                        numberOfMonths: 2,
                        onSelect: function(selected) {
                                $("#taskStart").datepicker("option", "maxDate", selected)
                        }
                });
        }

        function editDatapickerOnProjectDateField() {
                $("#projectStartEdit").datepicker({
                        numberOfMonths: 2,
                        onSelect: function(selected) {
                                $("#projectEndEdit").datepicker("option", "minDate", selected)
                        }
                });
                $("#projectEndEdit").datepicker({
                        numberOfMonths: 2,
                        onSelect: function(selected) {
                                $("#projectStartEdit").datepicker("option", "maxDate", selected)
                        }
                });
        }

        function emptyPropertyAttributeWireframe() {
                $('#property input').val('');
                $('.item').removeClass('selected');
        }

        function editDatapickerOnTaskDateField() {
                $("#taskStartEdit").datepicker({
                        numberOfMonths: 2,
                        onSelect: function(selected) {
                                $("#taskEndEdit").datepicker("option", "minDate", selected)
                        }
                });
                $("#taskEndEdit").datepicker({
                        numberOfMonths: 2,
                        onSelect: function(selected) {
                                $("#taskStartEdit").datepicker("option", "maxDate", selected)
                        }
                });
        }

        // Written by Arslan
        $('#updateName').click(function() {
                var firstName = $('#f-name').val();
                var lastName = $('#l-name').val();
                $.ajax({
                        url: baseURL + 'setting/changeName',
                        method: 'post',
                        type: 'post',
                        data: { firstName: firstName, lastName: lastName },
                        dataType: 'json',
                        success: function(response) {

                                if (response['code'] == 1) {
                                        errorBox(response['message']);
                                } else if (response['code'] == 2) {
                                        successBox(response['message']);
                                }
                        }
                });

        });

        $('#updatePassword').click(function() {
                var currpass = $('#current-pass').val();
                var newpass = $('#new-password').val();
                var confpass = $('#con-password').val();
                $.ajax({
                        url: baseURL + 'setting/changePassword',
                        method: 'post',
                        type: 'post',
                        data: { currpass: currpass, newpass: newpass, confpass: confpass },
                        dataType: 'json',
                        success: function(response) {

                                if (response['code'] == 1) {
                                        errorBox(response['message']);
                                } else if (response['code'] == 2) {
                                        successBox(response['message']);
                                        emptyChangePassword();
                                } else if (response['code'] == 3) {
                                        errorBox(response['message']);
                                }
                        }
                });
        });

        $('body').on('click', '#forMockupClick p', function() {
                $('#forMockupClick p').removeClass('selected');
                $(this).attr('class', 'selected');
                $('#inputID').val($(this).attr('id'));
        });


        $(".toggle-password").click(function() {
                $(this).toggleClass("fa-eye fa-eye-slash");
                var input = $(this).parent().find('.show-password');
                if (input.attr("type") == "password") {
                        input.attr("type", "text");
                } else {
                        input.attr("type", "password");
                }
        });
        "use strict";

        [].slice.call(document.querySelectorAll('select.cs-select')).forEach(function(el) {
                new SelectFx(el);
        });

        jQuery('.selectpicker').selectpicker;

        /*All Notification Stuff*/
        checkNotificationOfProjectAssign();
        checkAcceptOrDeclineOfUser();
        // checkSeenOfProjectAssign();
        checkSupervisorAssignProject(); //project supervisor assigned
        checkAssignProject();
        checkAcceptOrRejectSupervisor();

        $('#btnLogIn').click(function() {
                showPreloader();
                $('#loginErrorCustom').html("");
                $('#loginErrorCustom').hide();
                var email = $('#user-name').val();
                var password = $('#user-password').val();
                $.ajax({
                        url: baseURL + 'login/login',
                        method: 'post',
                        type: 'post',
                        data: { email: email, password: password },
                        dataType: 'json',
                        success: function(response) {

                                if (response.code == 1) { //validation error
                                        $('#loginErrorCustom').fadeIn('slow');
                                        $('#loginErrorCustom').append(response.message);
                                } else if (response.code == 2) { //login
                                        window.location.href = baseURL + 'user/index';
                                } else if (response.code == 3) { //email not verify
                                        $('#loginErrorCustom').fadeIn('slow');
                                        $('#loginErrorCustom').append(response.message);
                                } else {
                                        var cookieValue = parseInt($.cookie("test"));
                                        cookieValue += 1;
                                        $.cookie("test", cookieValue);
                                        $('#loginErrorCustom').fadeIn('slow');
                                        $('#loginErrorCustom').append(response.message);
                                        if (cookieValue == "3") {
                                                $('#loginErrorCustom').fadeIn(10000);
                                                $('#loginErrorCustom').append("Button is Disabled For 10 Second");
                                                $('#btnLogIn').prop('disabled', true);
                                                setTimeout(function() {
                                                        $('#btnLogIn').prop('disabled', false);
                                                }, 10000);
                                                $.cookie("test", 0);
                                        }
                                }
                                $('#user-name').val("");
                                $('#user-password').val("");
                                hidePreloader();
                        }
                });
        });

        $('#btnRegister').click(function() {
                showPreloader();
                $('#signUpError').html("");
                $('#signUpError').hide();
                var firstName = $('#first-name').val();
                var lastName = $('#last-name').val();
                var email = $('#email-name').val();
                var pass = $('#password').val();
                var conPass = $('#confirm-password').val();
                $.ajax({
                        url: baseURL + 'register/signup',
                        method: 'post',
                        type: 'post',
                        data: { firstName: firstName, lastName: lastName, email: email, pass: pass, conPass: conPass },
                        dataType: 'json',
                        success: function(response) {

                                if (response.code == 1) { //validation error
                                        $('#signUpError').fadeIn('slow');
                                        $('#signUpError').append(response.message);
                                } else if (response.code == 2) { //confirm email send
                                        $('#signUpError').fadeIn('slow');
                                        $('#signUpError').append(response.message);
                                } else if (response.code == 3) { //error in email send
                                        $('#signUpError').fadeIn('slow');
                                        $('#signUpError').append(response.message);
                                }
                                hidePreloader();
                        }
                });
        });

        $('#menuToggle').on('click', function(event) {
                $('body').toggleClass('open');
                if ($('#wireframe-box').hasClass('wireframe-toolbox')) {
                        if ($('#wireframe-box').hasClass('wireframe-toolbox-expand')) {
                                $('#wireframe-box').removeClass('wireframe-toolbox-expand');
                        } else {
                                $('#wireframe-box').addClass('wireframe-toolbox-expand');
                        }
                }
        });

        $('.search-trigger').on('click', function(event) {
                event.preventDefault();
                event.stopPropagation();
                $('.search-trigger').parent('.header-left').addClass('open');
        });

        $('.search-close').on('click', function(event) {
                event.preventDefault();
                event.stopPropagation();
                $('.search-trigger').parent('.header-left').removeClass('open');
        });

        $(window).on('load', function() { // makes sure the whole site is loaded 
                $('#status').fadeOut(); // will first fade out the loading animation 
                $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
                $('body').delay(350).css({ 'overflow': 'visible' });
                setTimeout(hideErrorBox, 4000);
        })

        function hideErrorBox() {
                $('.login-alert').fadeOut('slow');
                $('.login-alert').html("");
        }

        $("#user-email").keyup(function() {
                $('#user-email-show').hide();
                $('#user-email-show').html("");
                var value = $('#user-email').val();
                if (value != "") {
                        $.ajax({
                                url: baseURL + 'assign/get_user_data',
                                method: 'post',
                                type: 'post',
                                data: { value: value },
                                dataType: 'json',
                                success: function(response) {
                                        if (response.length > 0) {
                                                $('#user-email-show').slideDown('fast');
                                                for (var i = 0; i < response.length; i++) {
                                                        if (response[i]['path'] == null) {
                                                                var srcImage = 'http://www.homeworkhelp.novelguide.com/sites/default/files/pictures/default/default_user_image.jpg';
                                                        } else {
                                                                var srcImage = response[i]['path'];
                                                        }
                                                        $('#user-email-show').append('<div class="main-user-email clearfix" onclick="printUserEmail(this, ' + response[i]['u_id'] + ')"><img src="' + srcImage + '" class="user-avatar email-image"><span>' + response[i]['u_fname'] + ' ' + response[i]['u_lname'] + '</span><p>' + response[i]['u_email'] + '</p></div>');
                                                }

                                        } else {
                                                $('#user-email-show').hide('fast');
                                        }
                                }
                        });
                }
        });

        $("#user-emailEdit").keyup(function() {
                $('#user-email-show-edit').hide();
                $('#user-email-show-edit').html("");
                var value = $('#user-emailEdit').val();
                if (value != "") {
                        $.ajax({
                                url: baseURL + 'assign/get_user_data',
                                method: 'post',
                                type: 'post',
                                data: { value: value },
                                dataType: 'json',
                                success: function(response) {
                                        if (response.length > 0) {
                                                $('#user-email-show-edit').slideDown('fast');
                                                for (var i = 0; i < response.length; i++) {
                                                        if (response[i]['path'] == null) {
                                                                var srcImage = 'http://www.homeworkhelp.novelguide.com/sites/default/files/pictures/default/default_user_image.jpg';
                                                        } else {
                                                                var srcImage = response[i]['path'];
                                                        }
                                                        $('#user-email-show-edit').append('<div class="main-user-email clearfix col-12 no-border-bottom width-60per" onclick="printUserEmail(this, ' + response[i]['u_id'] + ')"><img src="' + srcImage + '" class="user-avatar email-image"><span>' + response[i]['u_fname'] + ' ' + response[i]['u_lname'] + '</span></div>');
                                                }

                                        }
                                }
                        });
                }
        });

        $("#projectName").change(function() {
                var value = $('#projectName').val();
                $('#taskType').html('<option value="">--Select--</option>');

                if (value != '') {
                        $.ajax({
                                url: baseURL + 'assign/get_task_type',
                                method: 'post',
                                type: 'post',
                                data: { value: value },
                                dataType: 'json',
                                success: function(response) {

                                        if (response.length > 0) {
                                                for (var i = 0; i < response.length; i++) {
                                                        var taskChecker = response[i]['t_type'];
                                                        if (taskChecker == 1) {
                                                                taskChecker = "Wireframe"
                                                        } else if (taskChecker == 2) {
                                                                taskChecker = "Mockup"
                                                        } else {
                                                                taskChecker = "Prototype"
                                                        }
                                                        console.log(response);
                                                        $('#taskType').append('<option value="' + response[i]['t_id'] + '">' + taskChecker + '</option>');
                                                }
                                        } else {
                                                $('#taskType').html("<option value=''>--Select--</option>");
                                        }
                                }
                        });
                } else {
                        $('#taskType').html("<option value=''>--Select--</option>");
                }
        });

        //Change Project for mockups
        $("#selectProjectForMockup").change(function() {
                var projectid = $('#selectProjectForMockup').val();
                if (projectid != 0) {
                        $('#assign-id').val($(this).find(':selected').attr('data-assign-id'));
                        $.ajax({
                                url: baseURL + 'mockups/getMockupStatus',
                                method: 'post',
                                type: 'post',
                                data: { projectid: projectid },
                                dataType: 'json',
                                success: function(response) {
                                        console.log(response);
                                        var statusOfWireframe = response[0]['a_status'];
                                        if (statusOfWireframe == 0) {
                                                errorBox('<p>Wireframe is in Progress State</p>');
                                        } else if (statusOfWireframe == 1) {
                                                errorBox('<p>Wireframe is in Submit State</p>');
                                        } else if (statusOfWireframe == 2) {
                                                var a = $('#selectProjectForMockup').find(':selected').data('status-id');
                                                if (a == 0) {
                                                        successBox('<p>Mockups Can Start</p>');
                                                        assingStatusFunction(0);
                                                }else if(a == 1 ){
                                                        successBox('<p>Mockups is in Submit State</p>');
                                                        assingStatusFunction(1);
                                                }else if(a == 2){
                                                        successBox('<p>Mockups is Approved</p>');
                                                        assingStatusFunction(2);
                                                }
                                        } else {
                                                errorBox('<p>Wireframe is in Change Request State</p>');
                                        }
                                }
                        });
                }
        });

        $('#startMockups').click(function() {
                var projectName = $('#selectProjectForMockup').val();
                if (projectName != 0) {
                        var status = $('#selectProjectForMockup').find(':selected').attr('data-status-id');
                        $.ajax({
                                method: 'post',
                                type: 'post',
                                url: baseURL + 'activity/get_activity_for_mockups',
                                data: { selectedProject: projectName },
                                dataType: 'json',
                                success: function(response) {
                                        if((status != 1) && (status != 2)){
                                            $('.open-mockup-box').show();
                                        }
                                        $('#activity-name-show').html('');
                                        for (var i = 0; i < response.length; i++) {
                                                $('#activity-name-show').append('<li onclick="selectedActivity(this, 1)" id="' + response[i]['act_id'] + '">' + response[i]['act_name'] + '</li>');
                                        }
                                }
                        });
                } else {
                        errorBox('<p>Select a Project</p>');
                }
        });

        $("#selectProjectForPrototype").change(function() {
                $('.save-button i').css({ 'background-color': 'transparent', 'border-radius': '50px' });
                var projectid = $('#selectProjectForPrototype').val();
                if (projectid != 0) {
                        $.ajax({
                                url: baseURL + 'prototypes/getPrototypeStatus',
                                method: 'post',
                                type: 'post',
                                data: { projectid: projectid },
                                dataType: 'json',
                                success: function(response) {
                                    console.log(response[0]['a_status']);
                                        var statusOfWireframe = response[0]['a_status'];
                                        if (statusOfWireframe == 0) {
                                                errorBox('<p>Mockups is in Progress State</p>');
                                        } else if (statusOfWireframe == 1) {
                                                errorBox('<p>Mockups is in Submit State</p>');
                                        } else if (statusOfWireframe == 2) {
                                                var a = $('#selectProjectForPrototype').find(':selected').data('status-id');
                                                if (a == 0) {
                                                        successBox('<p>Prototype Can Start</p>');
                                                        assingStatusFunction(0);
                                                }else if(a == 1 ){
                                                        successBox('<p>Prototype is in Submit State</p>');
                                                        assingStatusFunction(1);
                                                }else if(a == 2){
                                                        successBox('<p>Prototype is Approved</p>');
                                                        $('#first-activity').prop('disabled', true);
                                                        $('#startPrototype').prop('disabled', true);
                                                        assingStatusFunction(2);
                                                        $('#preview-prototype').prop('disabled', false);
                                                }
                                        } else {
                                                errorBox('<p>Mockups is in Change Request State</p>');
                                        }
                                }
                        });
                }
        });

        //Disable enter key inorder to submit form
        $("input").keypress(function(evt) {
                var keycode = evt.charCode || evt.keyCode;
                if (keycode == 13) { //Enter key's keycode
                        return false;
                }
        });

        //add project
        $('#addProject').click(function() {
                showPreloader();
                var projectName = $('#projectName').val();
                var projectType = $('#projectType').val();
                var projectStart = $('#projectStart').val();
                var projectEnd = $('#projectEnd').val();
                var supervisor = $('#user-email-id').val();
                var projectDetails = $('#projectDetails').val();
                $.ajax({
                        url: baseURL + 'project/add_project',
                        method: 'post',
                        type: 'post',
                        data: { projectName: projectName, projectType: projectType, projectStart: projectStart, projectEnd: projectEnd, supervisor: supervisor, projectDetails: projectDetails },
                        dataType: 'json',
                        success: function(response) {

                                if (response.code == 1) {
                                        //validation error
                                        errorBox(response.message);
                                } else if (response.code == 2) {
                                        //successfully add
                                        successBox(response.message);
                                        emptyAllProjectFields();
                                        loadAllProjectsFromDatabase();
                                } else {
                                        //error in inserting
                                        console.log('else');
                                }
                                hidePreloader();
                        }
                });
        });

        //add task
        $('#addTask').click(function() {
                showPreloader();
                var projectName = $('#projectNameTask').val();
                var TaskType = $('#taskType').val();
                var projectStart = $('#taskStart').val();
                var projectEnd = $('#taskEnd').val();
                var taskDetail = $('#taskDetail').val();
                $.ajax({
                        url: baseURL + 'task/add_task',
                        method: 'post',
                        type: 'post',
                        data: { projectName: projectName, TaskType: TaskType, projectStart: projectStart, projectEnd: projectEnd, taskDetail: taskDetail },
                        dataType: 'json',
                        success: function(response) {
                                if (response.code == 1) {
                                        //validation error
                                        errorBox(response.message);
                                } else if (response.code == 2) {
                                        //successfully add
                                        // $('#projectNameTask').html('');
                                        // $('#projectNameTask').append('<option value="">--Select--</option>');
                                        successBox(response.message);
                                        emptyAllTaskFields();
                                        loadAllTasksFromDatabase();
                                } else {
                                        //error in inserting
                                        console.log('else');
                                }
                                hidePreloader();
                        }
                });
        });

        //add Assign
        $('#addAssign').click(function() {
                showPreloader();
                var userEmailId = $('#user-email-id').val();
                var projectName = $('#projectName').val();
                var taskType = $('#taskType').val();
                var projectStart = $('#projectStart').val();
                var projectEnd = $('#projectEnd').val();
                var assignDetail = $('#assignDetail').val();
                $.ajax({
                        url: baseURL + 'assign/add_assign',
                        method: 'post',
                        type: 'post',
                        data: { userEmailId: userEmailId, projectName: projectName, taskType: taskType, projectStart: projectStart, projectEnd: projectEnd, assignDetail: assignDetail },
                        dataType: 'json',
                        success: function(response) {
                                console.log(response);
                                if (response.code == 1) {
                                        //validation error
                                        errorBox(response.message);
                                } else if (response.code == 2) {
                                        //successfully add
                                        successBox(response.message);
                                        emptyAllTaskFields();
                                        getAllAssignWithDatabase();
                                } else {
                                        //error in inserting
                                        console.log('else');
                                }
                                hidePreloader();
                        }
                });
        });

        //Approved Wireframe
        $('#approved-wireframe').click(function() {
                var a_id = $(this).data('id');
                $.ajax({
                        url: baseURL + 'user/approved_wireframe',
                        method: 'post',
                        type: 'post',
                        data: { a_id: a_id },
                        dataType: 'json',
                        success: function(response) {
                                console.log(response);
                                if (response == true) {
                                        successBox('<p>Wireframe Approved</p>');
                                }
                        }
                });
        });

        //Approved Prototype
        $('.approved-btn-owner').click(function() {
                var a_id = $(this).data('id');
                $.ajax({
                        url: baseURL + 'user/approved_prototype',
                        method: 'post',
                        type: 'post',
                        data: { a_id: a_id },
                        dataType: 'json',
                        success: function(response) {
                                console.log(response);
                                if (response == true) {
                                        successBox('<p>Prototype Approved</p>');
                                }
                        }
                });
        });

        //send chat
        $('#sms_send_button').click(function() {
            var currentdate = new Date(); 
            var datetime = currentdate.getDate() + "-"
                + (currentdate.getMonth()+1)  + "-" 
                + currentdate.getFullYear() + " "  
                + currentdate.getHours() + ":"  
                + currentdate.getMinutes() + ":" 
                + currentdate.getSeconds();
            var chat_id = $('#sms_send_button').attr('data-myval');
            var seen = $('#sms_send_button').attr('data-seen');
            var message_text = $('#message_text').val();
            $.ajax({
                    url: baseURL + 'chat/send_message',
                    method: 'post',
                    type: 'post',
                    data: { chat_id: chat_id, message_text: message_text, datetime:datetime, seen:seen},
                    dataType: 'json',
                    success: function(response) {
                        $('.msg_history').html('');
                        var myId = response[0]['myId'];
                        for(var i = 0; i < response.length; i++){
                            if(myId == response[i]['sent_by']){
                                var u_seen = "";
                                var s_seen = "";
                                var w_seen = "";
                                var m_seen = "";
                                var pr_seen = "";
                                // console.log(response[i]['s_seen']);
                                if(response[i]['u_seen'] != null && response[i]['u_seen'].u_id != response[i]['sent_by']){
                                    u_seen = response[i]['u_seen'].u_fname;
                                }
                                if(response[i]['s_seen'] != null && response[i]['s_seen'].u_id != response[i]['sent_by']){
                                    s_seen = response[i]['s_seen'].u_fname;
                                }
                                if(response[i]['m_seen'] != null && response[i]['m_seen'].u_id != response[i]['sent_by']){
                                    m_seen = response[i]['m_seen'].u_fname;
                                }
                                if(response[i]['w_seen'] != null && response[i]['w_seen'].u_id != response[i]['sent_by']){
                                    w_seen = response[i]['w_seen'].u_fname;
                                }
                                if(response[i]['pr_seen'] != null && response[i]['pr_seen'].u_id != response[i]['sent_by']){
                                    pr_seen = response[i]['pr_seen'].u_fname;
                                }
                                $('.msg_history').append('<div class="outgoing_msg">\
                                                            <div class="sent_msg">\
                                                              <p>'+response[i]['message_text']+'</p>\
                                                              <span class="time_date">'+ response[i]['message_time']  + '  seen by ' + ' ' +u_seen + ' '+ s_seen + ' '+ w_seen + ' ' + m_seen + ' '+ w_seen+ '</span>\
                                                            </div>\
                                                          </div>');
                            
                            }else{
                                if(response[i]['name'].path == null){
                                    var src = 'http://www.homeworkhelp.novelguide.com/sites/default/files/pictures/default/default_user_image.jpg';
                                }else{
                                    var src = response[i]['name'].path;
                                }
                                console.log(response[i]['name'].u_lname);
                                $('.msg_history').append('<div class="incoming_msg">\
                                                            <div class="incoming_msg_img">\
                                                              <img src="'+src+'" alt="sunil" class="user-avatar rounded-circle hideShowDropDown" style="height: 50px;">\
                                                            </div>\
                                                            <div class="received_msg">\
                                                              <div class="received_withd_msg">\
                                                              <span ><b>'+ response[i]['name'].u_fname + ' ' + response[i]['name'].u_lname + '<b/></span>\
                                                                <p>'+response[i]['message_text']+'</p>\
                                                                <span class="time_date">'+ response[i]['message_time'] + '</span>\
                                                              </div>\
                                                            </div>\
                                                          </div>');
                            }
                        }
                        $(".msg_history").animate({ scrollTop: $('.msg_history').prop("scrollHeight")}, 1000);
                        $('#message_text').val('');
                    }
            });
        });

        $('.dropdown-toggle').click(function() {
                $('#dropdown-notification').slideUp();
                $('#dropdown-notification').slideDown();
        });

        //enter on login field login click
        $("#user-name, #user-password").on("keydown", function(e) {
                if (e.keyCode == 13)
                        $("#btnLogIn").click();
        });

        //for register enter inputs
        $("#first-name, #last-name, #email-name, #password, #confirm-password").on("keydown", function(e) {
                if (e.keyCode == 13)
                        $("#btnRegister").click();
        });

        $('#preview-prototype').click(function(){
            $('#mobile-preview').html('');
            if(GLOBAL_ACTIVITY_RESULT != null){
                var firstactivity = GLOBAL_ACTIVITY_RESULT[0]['first_act'];
                for(var i = 0; i < GLOBAL_ACTIVITY_RESULT.length; i++){
                    if(GLOBAL_ACTIVITY_RESULT[i]['act_id'] == firstactivity) {
                        $('#mobile-preview').append(GLOBAL_ACTIVITY_RESULT[i]['mockup_code']);
                        var div = $('#mobile-preview');
                        $(div).css('backgroundColor', GLOBAL_ACTIVITY_RESULT[i]['mockup_back_color']);
                        if(GLOBAL_ACTIVITY_RESULT[i]['prototype'].length != 0){
                            for(var j = 0; j < GLOBAL_ACTIVITY_RESULT[i]['prototype'].length; j++){
                                $(div).find('#' + GLOBAL_ACTIVITY_RESULT[i]['prototype'][j]['act_button']).children().attr('data-activity-open', GLOBAL_ACTIVITY_RESULT[i]['prototype'][j]['act_open_id']);
                            }
                        }
                        $('#mobile`-preview input[type="button"]').click(function(){
                            var openId = $(this).attr('data-activity-open');
                            previewSingleActivity(openId);
                        });
                    }
                }
            }else{
                USER_APPROVED_GLOBAL_ACTIVITY_RESULT = '';
                var id = $('#selectProjectForPrototype option:selected').val();
                $.ajax({
                        url: baseURL + 'prototypes/get_all_prototype_layout',
                        type: 'post',
                        dataType: 'json',
                        data: { selectedProject: id },
                        dataType: 'json',
                        success: function(response) {
                            USER_APPROVED_GLOBAL_ACTIVITY_RESULT = response;
                            console.log(response);
                            var firstactivity = USER_APPROVED_GLOBAL_ACTIVITY_RESULT[0]['first_act'];
                            for(var i = 0; i < USER_APPROVED_GLOBAL_ACTIVITY_RESULT.length; i++){
                                if(USER_APPROVED_GLOBAL_ACTIVITY_RESULT[i]['act_id'] == firstactivity) {
                                    $('#mobile-preview').append(USER_APPROVED_GLOBAL_ACTIVITY_RESULT[i]['mockup_code']);
                                    var div = $('#mobile-preview');
                                    $(div).css('backgroundColor', USER_APPROVED_GLOBAL_ACTIVITY_RESULT[i]['mockup_back_color'])
                                    if(USER_APPROVED_GLOBAL_ACTIVITY_RESULT[i]['prototype'].length != 0){
                                        for(var j = 0; j < USER_APPROVED_GLOBAL_ACTIVITY_RESULT[i]['prototype'].length; j++){
                                            $(div).find('#' + USER_APPROVED_GLOBAL_ACTIVITY_RESULT[i]['prototype'][j]['act_button']).children().attr('data-activity-open', USER_APPROVED_GLOBAL_ACTIVITY_RESULT[i]['prototype'][j]['act_open_id']);
                                        }
                                    }
                                    $('#mobile-preview input[type="button"]').click(function(){
                                        var openId = $(this).attr('data-activity-open');
                                        previewSingleActivityAfterApproved(openId);
                                    });
                                }
                            }
                        }
                });
            }
            $("#pupop").fadeIn("slow");
        });

        //image open logic
        $('#selectImage').click(function(){
            var element = $('.mobile-inner p.selected');
            if(element.length != 0){
                var id = $(element).attr('id');
                id = id.split('_');
                if(id[0] == 'image'){
                    $('#inputImage')[0].click();
                }
            }
        });

        $('input[type=file]').change(function(e){
            readURL(this);
            // $.ajax({
            //      url: baseURL + 'mockups/do_upload',
            //      type:"post",
            //      data: new FormData(this),
            //      processData:false,
            //      contentType:false,
            //      cache:false,
            //      async:false,
            //      success: function(data){
            //           alert(data);
            //    }
            // });
            var file = this.files[0];
            console.log(file);
            console.log(e.target.files[0].name);
            console.log(e.target.files[0]);
        });

        $('#message_text').keypress(function (e) {
            var key = e.which;
            if(key == 13){
                $('#sms_send_button').click();
                return false;  
            }
        });
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.mobile-inner p.selected').find('img').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function previewSingleActivity(id){
    $('#mobile-preview').html('');
    for(var i = 0; i < GLOBAL_ACTIVITY_RESULT.length; i++){
        if(GLOBAL_ACTIVITY_RESULT[i]['act_id'] == id) {
            $('#mobile-preview').append(GLOBAL_ACTIVITY_RESULT[i]['mockup_code']);
            var div = $('#mobile-preview');
            $(div).css('backgroundColor', GLOBAL_ACTIVITY_RESULT[i]['mockup_back_color'])
            if(GLOBAL_ACTIVITY_RESULT[i]['prototype'].length != 0){
                for(var j = 0; j < GLOBAL_ACTIVITY_RESULT[i]['prototype'].length; j++){
                    $(div).find('#' + GLOBAL_ACTIVITY_RESULT[i]['prototype'][j]['act_button']).children().attr('data-activity-open', GLOBAL_ACTIVITY_RESULT[i]['prototype'][j]['act_open_id']);
                }
            }
            $('#mobile-preview input[type="button"]').click(function(){
                var openId = $(this).attr('data-activity-open');
                previewSingleActivity(openId);
            });
        }
    }
}

function previewSingleActivityAfterApproved(id){
    $('#mobile-preview').html('');
    for(var i = 0; i < USER_APPROVED_GLOBAL_ACTIVITY_RESULT.length; i++){
        if(USER_APPROVED_GLOBAL_ACTIVITY_RESULT[i]['act_id'] == id) {
            $('#mobile-preview').append(USER_APPROVED_GLOBAL_ACTIVITY_RESULT[i]['mockup_code']);
            var div = $('#mobile-preview');
            $(div).css('backgroundColor', USER_APPROVED_GLOBAL_ACTIVITY_RESULT[i]['mockup_back_color'])
            if(USER_APPROVED_GLOBAL_ACTIVITY_RESULT[i]['prototype'].length != 0){
                for(var j = 0; j < USER_APPROVED_GLOBAL_ACTIVITY_RESULT[i]['prototype'].length; j++){
                    $(div).find('#' + USER_APPROVED_GLOBAL_ACTIVITY_RESULT[i]['prototype'][j]['act_button']).children().attr('data-activity-open', USER_APPROVED_GLOBAL_ACTIVITY_RESULT[i]['prototype'][j]['act_open_id']);
                }
            }
            $('#mobile-preview input[type="button"]').click(function(){
                var openId = $(this).attr('data-activity-open');
                previewSingleActivityAfterApproved(openId);
            });
        }
    }
}

//view all chat function
function select_chat_box(id, b){
    $('#sms_send_button').attr('data-myval',id);
    $('#sms_send_button').attr('data-seen',b);
    $.ajax({
        url: baseURL + 'chat/get_all_chat_by_id',
        method: 'post',
        type: 'post',
        data: { chat_id: id, b: b },
        dataType: 'json',
        success: function(response) {
            $('.msg_history').html('');
            var myId = response[0]['myId'];
            for(var i = 0; i < response.length; i++){
                if(myId == response[i]['sent_by']){
                    var u_seen = "";
                    var s_seen = "";
                    var w_seen = "";
                    var m_seen = "";
                    var pr_seen = "";
                    // console.log(response[i]['s_seen']);
                    if(response[i]['u_seen'] != null && response[i]['u_seen'].u_id != response[i]['sent_by']){
                        u_seen = response[i]['u_seen'].u_fname;
                    }
                    if(response[i]['s_seen'] != null && response[i]['s_seen'].u_id != response[i]['sent_by']){
                        s_seen = response[i]['s_seen'].u_fname;
                    }
                    if(response[i]['m_seen'] != null && response[i]['m_seen'].u_id != response[i]['sent_by']){
                        m_seen = response[i]['m_seen'].u_fname;
                    }
                    if(response[i]['w_seen'] != null && response[i]['w_seen'].u_id != response[i]['sent_by']){
                        w_seen = response[i]['w_seen'].u_fname;
                    }
                    if(response[i]['pr_seen'] != null && response[i]['pr_seen'].u_id != response[i]['sent_by']){
                        pr_seen = response[i]['pr_seen'].u_fname;
                    }
                    $('.msg_history').append('<div class="outgoing_msg">\
                                                <div class="sent_msg">\
                                                  <p>'+response[i]['message_text']+'</p>\
                                                  <span class="time_date">'+ response[i]['message_time']  + '  seen by ' + ' ' +u_seen + ' '+ s_seen + ' '+ w_seen + ' ' + m_seen + ' '+ w_seen+ '</span>\
                                                </div>\
                                              </div>');
                
                }else{
                    if(response[i]['name'].path == null){
                        var src = 'http://www.homeworkhelp.novelguide.com/sites/default/files/pictures/default/default_user_image.jpg';
                    }else{
                        var src = response[i]['name'].path;
                    }
                    console.log(response[i]['name'].u_lname);
                    $('.msg_history').append('<div class="incoming_msg">\
                                                <div class="incoming_msg_img" style="margin-top: 20px;">\
                                                  <img src="'+src+'" alt="sunil" class="user-avatar rounded-circle hideShowDropDown" style="height: 50px;">\
                                                </div>\
                                                <div class="received_msg">\
                                                  <div class="received_withd_msg">\
                                                  <span ><b>'+ response[i]['name'].u_fname + ' ' + response[i]['name'].u_lname + '<b/></span>\
                                                    <p>'+response[i]['message_text']+'</p>\
                                                    <span class="time_date">'+response[i]['message_time']
                                                     +'</span>\
                                                  </div>\
                                                </div>\
                                              </div>');
                }
            }
            $(".msg_history").animate({ scrollTop: $('.msg_history').prop("scrollHeight")}, 1000);
            $('#message_text').val('');
        },
        error: function(a, b){
            console.log(a + " ---- " + b);
        }
    });
    
}

function dataTableProjectInit() {
        $('#project-details-table').dataTable({
                "bLengthChange": false,
                "destroy": true,
        });
}

function dataTableTaskInit() {
        $('#task-details-table').dataTable({
                "bLengthChange": false,
                "destroy": true,
        });
}

function dataTableAssignInit() {
        $('#assign-details-table').dataTable({
                "bLengthChange": false,
                "destroy": true,
        });
}

function errorBox(error) {
        $('#error-box').fadeIn();
        $('#error-box').addClass('alert-danger');
        $('#error-box').append(error);
        setTimeout(fadeOutError, 3000);
}

function fadeOutError() {
        $('#error-box').fadeOut();
        $('#error-box').removeClass('alert-danger');
        $('#error-box').html('');
}

function successBox(success) {
        $('#error-box').fadeIn();
        $('#error-box').addClass('alert-success');
        $('#error-box').append(success);
        setTimeout(fadeOutSuccess, 3000);
}

function fadeOutSuccess() {
        $('#error-box').fadeOut();
        $('#error-box').removeClass('alert-success');
        $('#error-box').html('');
}

function emptyAllProjectFields() {
        $('#projectName').val('');
        $('#projectType').val('');
        $('#projectStart').val('');
        $('#projectEnd').val('');
        $('#user-email-id').val('');
        $('#projectDetails').val('');
        $('#user-email').val('');
}

function emptyAllTaskFields() {
        $('#form-reset').trigger("reset");
        $('#projectName').val('');
        $('#taskType').val('');
        $('#projectStart').val('');
        $('#projectEnd').val('');
        $('#taskDetail').val('');
}

function emptyChangePassword() {
        $('#current-pass').val('');
        $('#new-password').val('');
        $('#confirm-password').val('');
}

function checkSupervisorAssignProject() {
        $.ajax({
                url: baseURL + 'supervisor/check_supervisor_assign',
                dataType: 'json',
                success: function(response) {
                        // console.log(response);
                        if (response.length > 0) {
                                var status = 0;
                                for (var i = 0; i < response.length; i++) {
                                        var buttonTag = '';
                                        if (response[i]['s_status'] == 0) {
                                                status++;
                                                buttonTag = '<button onclick="acceptSupervisor(' + response[i]['p_id'] + ')" class="btn main-btn notification-btn">Accept</button> <button onclick="rejectSupervisor(' + response[i]['p_id'] + ')" class="btn main-btn notification-btn">Reject</button>';
                                        } else if (response[i]['s_status'] == 1) {
                                                buttonTag = '<button class="btn main-btn notification-btn" disabled>Accepted</button> <button onclick="rejectSupervisor(' + response[i]['p_id'] + ')" class="btn main-btn notification-btn">Reject</button>';
                                        } else {
                                                buttonTag = '<button onclick="acceptSupervisor(' + response[i]['p_id'] + ')" class="btn main-btn notification-btn">Accept</button> <button class="btn main-btn notification-btn" disabled>Rejected</button>';
                                        }
                                        var src = 'http://www.homeworkhelp.novelguide.com/sites/default/files/pictures/default/default_user_image.jpg';
                                        $('.supervisor-count').text(status);
                                        $('#supervisor-box').append('<div class="supervisor-inner-box col-12  pb-4 pt-4"><img src="' + src + '" class="user-avatar email-image"><u><b>' + response[i]['u_fname'] + ' ' + response[i]['u_lname'] + '</b></u> Supervise the Project <u>' + response[i]['p_name'] + '</u><p class="mb-0 mt-1">' + buttonTag + '</p></div>');
                                }
                        }
                        hidePreloader();
                }
        });
}

function acceptSupervisor(id) {
        $.ajax({
                url: baseURL + 'supervisor/accept_supervisor',
                data: { id: id },
                method: 'post',
                type: 'post',
                dataType: 'json',
                success: function(response) {
                        console.log(response);
                        $('#supervisor-box').html('');
                        checkSupervisorAssignProject();
                }
        });
}

function rejectSupervisor(id) {
        $.ajax({
                url: baseURL + 'supervisor/reject_supervisor',
                data: { id: id },
                method: 'post',
                type: 'post',
                dataType: 'json',
                success: function(response) {
                        console.log(response);
                        $('#supervisor-box').html('');
                        checkSupervisorAssignProject();
                }
        });
}

function checkAssignProject() {
        $.ajax({
                url: baseURL + 'assign/check_assign_project',
                dataType: 'json',
                success: function(response) {
                        // console.log(response);
                        if (response.length > 0) {
                                var status = 0;
                                for (var i = 0; i < response.length; i++) {
                                        var taskType = '';
                                        var buttonTag;
                                        if (response[i]['t_type'] == 1) {
                                                taskType = 'Wireframe';
                                        } else if (response[i]['t_type'] == 2) {
                                                taskType = 'Mockup';
                                        } else {
                                                taskType = 'Prototype';
                                        }
                                        if (response[i]['a_accept'] == 0) {
                                                status++;
                                                var buttonTag = '<button onclick="acceptAssign(' + response[i]['a_id'] + ')" class="btn main-btn notification-btn">Accept</button> <button onclick="rejectAssign(' + response[i]['a_id'] + ')" class="btn main-btn notification-btn">Reject</button>';
                                        } else if (response[i]['a_accept'] == 1) {
                                                var buttonTag = '<button class="btn main-btn notification-btn" disabled>Accepted</button> <button onclick="rejectAssign(' + response[i]['a_id'] + ')" class="btn main-btn notification-btn">Reject</button>';
                                        } else {
                                                var buttonTag = '<button onclick="acceptAssign(' + response[i]['a_id'] + ')" class="btn main-btn notification-btn">Accept</button> <button class="btn main-btn notification-btn" disabled>Rejected</button>';
                                        }
                                        $('.assign-count').text(status);
                                        $('#assign-box').append('<div class="supervisor-inner-box col-12 text-center pb-4 pt-4"><u>' + response[i]['u_fname'] + ' ' + response[i]['u_lname'] + '</u> assign you the <u>' + taskType + '</u> of Project <u>' + response[i]['p_name'] + '</u><p class="mb-0 mt-1">' + buttonTag + '</p></div>');
                                }
                        }
                        hidePreloader();
                }
        });
}

function acceptAssign(id) {
        $.ajax({
                url: baseURL + 'assign/accept_assign',
                data: { id: id },
                method: 'post',
                type: 'post',
                dataType: 'json',
                success: function(response) {
                        console.log(response);
                        $('#assign-box').html('');
                        checkAssignProject();
                }
        });
}

function rejectAssign(id) {
        $.ajax({
                url: baseURL + 'assign/reject_assign',
                data: { id: id },
                method: 'post',
                type: 'post',
                dataType: 'json',
                success: function(response) {
                        console.log(response);
                        $('#assign-box').html('');
                        checkAssignProject();
                }
        });
}

function checkAcceptOrRejectSupervisor() {
        $.ajax({
                url: baseURL + 'supervisor/check_Accept_Or_Reject_Supervisor',
                dataType: 'json',
                success: function(response) {
                        var notSeen = 0;
                        for (var i = 0; i < response.length; i++) {
                                var buttonTag = '';
                                var seenClass = '';
                                var status = '';
                                if (response[i]['u_seen'] == 0) {
                                        notSeen++;
                                        seenClass = 'not-seen';
                                } else {
                                        seenClass = 'seen';
                                }
                                if (response[i]['s_status'] == 1) {
                                        status = 'Accepted';
                                } else {
                                        status = 'Rejected';
                                }
                                $('#notification-box').append('<div class="supervisor-inner-box col-12 text-center pb-4 pt-4 notifiaction-hover pointer ' + seenClass + '" onclick="seenNotification(' + response[i]['p_id'] + ')"><u>' + response[i]['u_fname'] + ' ' + response[i]['u_lname'] + '</u> <span class="tweak">' + status + '</span> the Supervising request of <u>' + response[i]['p_name'] + '</u></div>');
                        }
                        $('.notification-count').text(notSeen);
                        // console.log(response);
                }
        });
}

function loadAllProjectsFromDatabase() {
        $.ajax({
                url: baseURL + 'project/get_all_project',
                dataType: 'json',
                success: function(response) {
                        if (response.length > 0) {
                                $("#project-details-table").dataTable().fnDestroy();
                                $('#project-details-table-tbody').html('');
                                for (var i = 0; i < response.length; i++) {
                                        if (response[i]['p_active'] == 0) {
                                                //active
                                                $('#project-details-table-tbody').append('<tr><td>' + (i + 1) + '</td><td>' + response[i]['p_id'] + '</td><td>' + response[i]['p_name'] + '</td><td>' + response[i]['p_type'] + '</td><td>' + response[i]['p_start'] + '</td><td>' + response[i]['p_end'] + '</td><td>' + response[i]['u_email'] + '</td><td><span onclick="getProjectById(' + response[i]['p_id'] + ')" class="tweak pointer">View</span> | <span onclick="inactiveProjectById(' + response[i]['p_id'] + ')" class="tweak pointer">Inactive</span></td</tr>');
                                        } else {
                                                //not active
                                                $('#project-details-table-tbody').append('<tr><td>' + (i + 1) + '</td><td>' + response[i]['p_id'] + '</td><td>' + response[i]['p_name'] + '</td><td>' + response[i]['p_type'] + '</td><td>' + response[i]['p_start'] + '</td><td>' + response[i]['p_end'] + '</td><td>' + response[i]['u_email'] + '</td><td><span onclick="getProjectById(' + response[i]['p_id'] + ')" class="tweak pointer">View</span> | <span onclick="activeProjectById(' + response[i]['p_id'] + ')" class="tweak pointer">Active</span></td</tr>');
                                        }
                                }
                        } else {
                                $('#project-details-table-tbody').append('<tr><td colspan="8"><h3 class="mt-1 mb-1"><span class="tweak">N</span>o <span class="tweak">R</span>ecord <span class="tweak">F</span>ound</h3></td</tr>');
                        }
                        hidePreloader();
                        dataTableProjectInit();
                }
        });
}

function seenNotification(id) {
        $.ajax({
                url: baseURL + 'user/seen_notification',
                type: 'post',
                method: 'post',
                dataType: 'json',
                data: { id: id },
                success: function(success) {
                        console.log(success);
                        $('#notification-box').html('');
                        checkAcceptOrRejectSupervisor();
                }
        });
}

function inactiveProjectById(id) {
        $("#deleteBox").fadeIn("slow");
        $("#projectDeleteId").val(id);
        $("#changeActiveOrInactive").attr("onclick", "inactiveProject()");
}

function activeProjectById(id) {
        $("#deleteBox").fadeIn("slow");
        $("#projectDeleteId").val(id);
        $("#changeActiveOrInactive").attr("onclick", "activeProject()");
}

function activeProject() {
        var id = $("#projectDeleteId").val();
        $.ajax({
                url: baseURL + 'project/active_project_by_id',
                data: { id: id },
                method: 'post',
                type: 'post',
                dataType: 'json',
                success: function(response) {
                        console.log(response);
                        $('#deleteBox').fadeOut('slow');
                        loadAllProjectsFromDatabase();
                }
        });
}

function inactiveProject() {
        var id = $("#projectDeleteId").val();
        $.ajax({
                url: baseURL + 'project/inactive_project_by_id',
                data: { id: id },
                method: 'post',
                type: 'post',
                dataType: 'json',
                success: function(response) {
                        console.log(response);
                        $('#deleteBox').fadeOut('slow');
                        loadAllProjectsFromDatabase();
                }
        });
}

function closeDelPupop() {
        $('#deleteBox').fadeOut();
}

function loadAllTasksFromDatabase() {
        $('#projectNameTask').val('');
        $('#projectNameEdit').val('');
        $.ajax({
                url: baseURL + 'task/get_all_task',
                dataType: 'json',
                success: function(response) {
                        for (var i = 0; i < response['project_name'].length; i++) {
                                $('#projectNameTask').append('<option value="' + response['project_name'][i].p_id + '">' + response['project_name'][i].p_name + '</option>')
                                $('#projectNameEdit').append('<option value="' + response['project_name'][i].p_id + '">' + response['project_name'][i].p_name + '</option>')
                        }
                        if (response['task_data'].length > 0) {
                                $("#task-details-table").dataTable().fnDestroy();
                                $('#task-details-table-tbody').html('');
                                for (var i = 0; i < response['task_data'].length; i++) {
                                        var taskType = response['task_data'][i]['t_type'];
                                        var taskName = '';
                                        if (taskType == 1) {
                                                taskName = 'Wireframe';
                                        } else if (taskType == 2) {
                                                taskName = 'Mockup';
                                        } else {
                                                taskName = 'Prototype';
                                        }
                                        $('#task-details-table-tbody').append('<tr><td>' + (i + 1) + '</td><td>' + response['task_data'][i]['t_id'] + '</td><td>' + response['task_data'][i]['p_name'] + '</td><td>' + taskName + '</td><td>' + response['task_data'][i]['t_start'] + '</td><td>' + response['task_data'][i]['t_end'] + '</td><td><span onclick="getTaskById(' + response['task_data'][i]['t_id'] + ')" class="tweak pointer">View</span> | <span onclick="deleteProjectById(' + response['task_data'][i]['t_id'] + ')" class="tweak pointer">Delete</span></td</tr>');
                                }
                        } else {
                                $('#task-details-table-tbody').append('<tr><td colspan="8"><h3 class="mt-1 mb-1"><span class="tweak">N</span>o <span class="tweak">R</span>ecord <span class="tweak">F</span>ound</h3></td</tr>');
                        }
                        hidePreloader();
                        dataTableTaskInit();
                }
        });
}

function getProjectNameHavingTask() {
        $('#projectName').val('');
        $('#projectNameEdit').val('');
        $.ajax({
                url: baseURL + 'assign/get_project_name_having_task',
                dataType: 'json',
                success: function(response) {
                        for (var i = 0; i < response.length; i++) {
                                $('#projectName').append('<option value="' + response[i].p_id + '">' + response[i].p_name + '</option>')
                                $('#projectNameEdit').append('<option value="' + response[i].p_id + '">' + response[i].p_name + '</option>')
                        }
                }
        });
}

function getAllAssignWithDatabase() {
        $('#assign-details-table-tbody').html('');
        $.ajax({
                url: baseURL + 'assign/get_all_task',
                dataType: 'json',
                success: function(response) {
                        if (response['assign_work'].length > 0) {
                                for (var i = 0; i < response['assign_work'].length; i++) {
                                        var taskType = response['assign_work'][i]['t_type'];
                                        var status = response['assign_work'][i]['a_status'];
                                        var accept = response['assign_work'][i]['a_accept'];
                                        var taskName = '';
                                        var statusName = '';
                                        if (taskType == 1) {
                                                taskName = 'Wireframe';
                                        } else if (taskType == 2) {
                                                taskName = 'Mockup';
                                        } else {
                                                taskName = 'Prototype';
                                        }
                                        if (accept == 0) {
                                                statusName = "Pending";
                                        } else if (accept == 1) {
                                                statusName = "Accepted";
                                        } else {
                                                statusName = "Rejected"
                                        }
                                        $('#assign-details-table-tbody').append('<tr><td>' + (i + 1) + '</td><td>' + response['assign_work'][i]['u_email'] + '</td><td>' + response['assign_work'][i]['p_name'] + '</td><td>' + taskName + '</td><td>' + response['assign_work'][i]['a_start'] + '</td><td>' + response['assign_work'][i]['a_end'] + '</td><td>' + statusName + '</td><td><span onclick="getAssignById(' + response['assign_work'][i]['a_id'] + ')" class="tweak pointer">View</span> | <span onclick="deleteProjectById(' + response['assign_work'][i]['t_id'] + ')" class="tweak pointer">Delete</span></td</tr>');
                                }
                        } else {
                                $('#assign-details-table-tbody').append('<tr><td colspan="8"><h3 class="mt-1 mb-1"><span class="tweak">N</span>o <span class="tweak">R</span>ecord <span class="tweak">F</span>ound</h3></td</tr>');
                        }
                        hidePreloader();
                        dataTableAssignInit();
                }
        });
}

function getProjectById(id) {
        $.ajax({
                url: baseURL + 'project/get_project_by_id',
                data: { id: id },
                method: 'post',
                type: 'post',
                dataType: 'json',
                success: function(response) {
                        $('#projectid').val(response[0]['p_id']);
                        $('#projectNameEdit').val(response[0]['p_name']);
                        $('#projectTypeEdit').val(response[0]['p_type']);
                        $('#projectStartEdit').val(response[0]['p_start']);
                        $('#projectEndEdit').val(response[0]['p_end']);
                        $('#user-emailEdit').val(response[0]['u_email']);
                        $('#user-email-idEdit').val(response[0]['u_id']);
                        $('#projectDetailsEdit').val(response[0]['p_detail']);
                        $("#pupop").fadeIn("slow");
                }
        });
}

function updateProjectById() {
        $('#popup_error').html('');
        var project_id = $('#projectid').val();
        var project_name = $('#projectNameEdit').val();
        var project_type = $('#projectTypeEdit').val();
        var project_start = $('#projectStartEdit').val();
        var project_end = $('#projectEndEdit').val();
        var project_supervisor = $('#user-email-idEdit').val();
        var project_details = $('#projectDetailsEdit').val();
        var supervisor_name = $('#user-emailEdit').val();
        //alert(project_details);
        if ((project_name == "") || (project_type == "") || (project_start == "") || (project_end == "") || (supervisor_name == "") || (project_details == "")) {
                var message = "Please fill-in all the mandatory fields.";
                popupDangerError(message);
        } else {
                $.ajax({
                        url: baseURL + 'project/update_project_by_id',
                        data: { project_id: project_id, project_name: project_name, project_type: project_type, project_start: project_start, project_end: project_end, project_supervisor: project_supervisor, project_details: project_details },
                        method: 'post',
                        type: 'post',
                        dataType: 'json',
                        success: function(response) {
                                console.log(response);
                                var message = "Successfully Updated";
                                popupSuccessBox(message);
                                loadAllProjectsFromDatabase();
                        }
                });
        }
}

function updateTaskById() {
        $('#popup_error').html('');
        var task_id = $('#taskid').val();
        var task_project_name = $('#projectNameEdit').val();
        var task_type = $('#taskTypeEdit').val();
        var task_start = $('#taskStartEdit').val();
        var task_end = $('#taskEndEdit').val();
        // var project_supervisor = $('#user-email-idEdit').val();
        var task_details = $('#taskDetailsEdit').val();
        // var supervisor_name = $('#user-emailEdit').val();
        //alert(project_details);
        if ((task_project_name == "") || (task_type == "") || (task_start == "") || (task_end == "") || (task_details == "")) {
                var message = "Please fill-in all the mandatory fields.";
                popupDangerError(message);

        } else {

                $.ajax({
                        url: baseURL + 'task/update_task_by_id',
                        data: { task_id: task_id, task_project_name: task_project_name, task_type: task_type, task_start: task_start, task_end: task_end, task_details: task_details },
                        method: 'post',
                        type: 'post',
                        dataType: 'json',
                        success: function(response) {
                                console.log(response);

                                loadAllTasksFromDatabase();
                                // loadAllProjectsFromDatabase();
                                var message = "Successfully Updated";
                                popupSuccessBox(message);


                        }
                });
        }
}

function popupSuccessBox(message) {
        $('#popup_error').fadeIn();
        $('#popup_error').addClass('alert-success');
        $('#popup_error').append(message)
        setTimeout(popupSuccessFadeOut, 3000);
        setTimeout(closePupop, 3000);
}

function popupDangerError(message) {
        $('#popup_error').fadeIn();
        $('#popup_error').addClass('alert-danger');
        $('#popup_error').append(message)
        setTimeout(popupDangerErrorFadeOut, 3000);
}

function popupDangerErrorFadeOut() {
        $('#popup_error').fadeOut();
        $('#popup_error').removeClass('alert-danger');
}

function popupSuccessFadeOut() {
        $('#popup_error').fadeOut();
        $('#popup_error').removeClass('alert-success');

}

function getTaskById(id) {
        $.ajax({
                url: baseURL + 'task/get_task_by_id',
                data: { id: id },
                method: 'post',
                type: 'post',
                dataType: 'json',
                success: function(response) {
                        console.log(response);
                        $('#taskid').val(response[0]['t_id']);
                        $('#projectNameEdit').val(response[0]['p_id']);
                        $('#taskTypeEdit').val(response[0]['t_type']);
                        $('#taskStartEdit').val(response[0]['t_start']);
                        $('#taskEndEdit').val(response[0]['t_end']);
                        $('#taskDetailsEdit').val(response[0]['t_detail']);
                        $("#pupop").fadeIn("slow");
                }
        });
}

function getAssignById(id) {
        $.ajax({
                url: baseURL + 'assign/get_assign_by_id',
                data: { id: id },
                method: 'post',
                type: 'post',
                dataType: 'json',
                success: function(response) {
                        console.log(response);
                        $('#user-emailEdit').val(response[0]['u_email']);
                        $('#projectNameEdit').val(response[0]['p_id']);
                        $('#taskTypeEdit').val(response[0]['t_type']);
                        $('#assignStartEdit').val(response[0]['a_start']);
                        $('#assignEndEdit').val(response[0]['a_end']);
                        $('#assignDetailsEdit').val(response[0]['a_detail']);
                        $("#pupop").fadeIn("slow");
                }
        });
}

function closePupop() {
        $("#pupop").fadeOut();
        $('#pupop input[type="text"], #pupop select, #pupop textarea').val('');
}

function closePreviewPupop(){
        $("#preview-prototype").fadeOut();
}

function closePreviewPupopOwner(){
        $("#preview-prototype-admin").fadeOut();
}

function printUserEmail(e, id) {
        $('#user-email-id').attr('value', id);
        $('#user-email').val(e.getElementsByTagName("p")[0].innerHTML);
        $('#user-email-show').hide();
}

function checkSeenOfProjectAssign() {
        // $.ajax({
        //  url:baseURL+'user/get_seen_project_notification',
        //  method: 'post',
        //  type: 'post',
        //        dataType: 'json',
        //  success: function(response){
        //    if(response.length > 0){
        //      var seen = 0;
        //      $('#dropdown-notification p.red').text("You Have " + response.length + " Notification");
        //      if(response.length > 3){
        //        notificationLength = 3;
        //      }else{
        //        notificationLength = response.length;
        //      }
        //      // for(var i = 0; i < notificationLength; i++){
        //      //  if(response[i]['seen'] == 0){
        //      //    seen++;
        //      //  }
        //      //  var checkImage = "";
        //      //  var taskType = "";
        //      //  if(response[i]['path'] == null){
        //      //    checkImage = "http://www.homeworkhelp.novelguide.com/sites/default/files/pictures/default/default_user_image.jpg";
        //      //  }else{
        //      //    checkImage = response[i]['path'];
        //      //  }
        //      //  if(response[i]['t_type'] == 1){
        //      //    taskType = "Wireframe";
        //      //  }else if(response[i]['t_type'] == 1){
        //      //    taskType = "Mockup";
        //      //  }else{
        //      //    taskType = "Prototype";
        //      //  }
        //      //  if(response[i]['seen'] == 0){
        //      //    notifyColor = "#eee";
        //      //  }
        //      //  else{
        //      //    notifyColor = "";
        //      //  }
        //      //  $('#main-notifier').append('<div class="notify" style="background-color:'+ notifyColor +'">\
        //      //                  <a class="dropdown-item media" href="'+baseURL+'user/get_single_notification/'+ response[i]['a_id'] +'">\
        //      //                    <span class="photo media-left">\
        //      //                      <img src="'+checkImage+'">\
        //      //                    </span>\
        //      //                    <span class="message media-body">\
        //      //                      <span class="name float-left">'+response[i]['u_fname'] + " " + response[i]['u_lname'] + " (" + response[i]['u_email'] + ')\
        //      //                    </span>\
        //      //                    <p>Assign You the '+ taskType +' of ' + response[i]['p_name'] +'</p>\
        //      //                    </span>\
        //      //                  </a>\
        //      //                  <p class="text-center">\
        //      //                    <span class="span-btn">\
        //      //                      <a href="#">Accept</a>\
        //      //                    </span> &nbsp;\
        //      //                    <span class="span-btn">\
        //      //                      <a href="#">Decline</a>\
        //      //                    </span>\
        //      //                  </p>\
        //      //                </div>');
        //      // }
        //      $('#message-count').text(response.length);
        //    }else{
        //      $('#message-count').text(0);
        //      $('#dropdown-notification p.red').text("You have No Mails");
        //    }
        //    console.log(response);
        //  }
        //      }); 
}

function checkNotificationOfProjectAssign() {
        $('#main-notifier').html("");
        $('#count').html("");
        $.ajax({
                url: baseURL + 'user/get_detail_project_notification',
                method: 'post',
                type: 'post',
                dataType: 'json',
                success: function(response) {
                        if (response.length > 0) {
                                var seen = 0;
                                $('#dropdown-notification p.red').text("You Have " + response.length + " Notification");
                                if (response.length > 3) {
                                        notificationLength = 3;
                                } else {
                                        notificationLength = response.length;
                                }
                                for (var i = 0; i < notificationLength; i++) {
                                        if ((response[i]['seen'] == 0) && (response[i]['a_accept'] == 0)) {
                                                seen++;
                                        }
                                        var acceptCheck = "";
                                        var checkImage = "";
                                        var taskType = "";
                                        if (response[i]['path'] == null) {
                                                checkImage = "http://www.homeworkhelp.novelguide.com/sites/default/files/pictures/default/default_user_image.jpg";
                                        } else {
                                                checkImage = response[i]['path'];
                                        }
                                        if (response[i]['t_type'] == 1) {
                                                taskType = "Wireframe";
                                        } else if (response[i]['t_type'] == 1) {
                                                taskType = "Mockup";
                                        } else {
                                                taskType = "Prototype";
                                        }
                                        if (response[i]['seen'] == 0) {
                                                notifyColor = "#eee";
                                        } else {
                                                notifyColor = "";
                                        }

                                        $('#main-notifier').append('<div class="notify" style="background-color:' + notifyColor + '">\
                                                                        <a class="dropdown-item media" href="' + baseURL + 'user/get_single_notification/' + response[i]['a_id'] + '">\
                                                                        <span class="photo media-left">\
                                                                        <img src="' + checkImage + '">\
                                                                        </span>\
                                                                        <span class="message media-body">\
                                                                        <span class="name float-left">' + response[i]['u_fname'] + " " + response[i]['u_lname'] + " (" + response[i]['u_email'] + ')\
                                                                        </span>\
                                                                        <p>Assign You the ' + taskType + ' of ' + response[i]['p_name'] + '</p>\
                                                                        </span>\
                                                                        </a>\
                                                                    </div>');
                                }
                                $('#count').text(seen);
                        } else {
                                $('#count').text(0);
                                $('#dropdown-notification p.red').text("You have No Mails");
                        }
                        // console.log(response);
                }
        });
}

function checkAcceptOrDeclineOfUser() {
        $.ajax({
                url: baseURL + 'user/get_accept_decline_assign',
                method: 'post',
                type: 'post',
                dataType: 'json',
                success: function(response) {
                        if (response.length > 0) {
                                $('#main-message-notifier').html("");
                                $('#message-dropdown-notification p.red').text("You Have " + response.length + " Notification");
                                for (var i = 0; i < response.length; i++) {
                                        var acceptCheck = "";
                                        var seen = 0;
                                        var taskType = "";
                                        var backgroundColor = "";
                                        if (response[i]['a_by_seen'] == 0) {
                                                seen++;
                                                backgroundColor = "#eee";
                                        } else if (response[i]['a_by_seen'] == 1) {
                                                backgroundColor = "#fff";
                                        }
                                        if (response[i]['t_type'] == 1) {
                                                taskType = "Wireframe";
                                        } else if (response[i]['t_type'] == 1) {
                                                taskType = "Mockup";
                                        } else {
                                                taskType = "Prototype";
                                        }
                                        if (response[i]['a_accept'] == 1) {
                                                acceptCheck = "Accepted";
                                        } else if (response[i]['a_accept'] == 2) {
                                                acceptCheck = "Declined";
                                        } else {
                                                acceptCheck = "";
                                        }
                                        $('#main-message-notifier').append('<div class="notify" style="background-color:' + backgroundColor + '">\
                                                                                <a class="dropdown-item media" href="#">\
                                                                                <span class="message media-body">\
                                                                                <span class="name float-left">' + response[i]['u_fname'] + " " + response[i]['u_lname'] + " (" + response[i]['u_email'] + ')\
                                                                                </span>\
                                                                                <p>' + acceptCheck + ' the ' + taskType + ' of ' + response[i]["p_name"] + '</p>\
                                                                                </span>\
                                                                                </a>\
                                                                                </div>');
                                }
                                $('#message-count').text(seen);
                        } else {
                                $('#message-count').text('0');
                                $('#message-dropdown-notification p.red').text("You Have No Notification");
                        }
                }
        });
}
$('#notify-box').click(function() {
        $id = $(this).attr('value');
        window.location = baseURL + 'user/get_single_notification/' + $id;
});

function acceptNotification(id, refresh) {
        $.ajax({
                url: baseURL + 'assign/accept_notification/' + id,
                method: 'post',
                type: 'post',
                dataType: 'json',
                success: function(response) {
                        if (response == true) {
                                checkNotificationOfProjectAssign();
                        } else {
                                alert("false");
                        }

                }
        });
        if (refresh == 1) {
                location.reload();
        }
}

function declineNotification(id, refresh) {
        $.ajax({
                url: baseURL + 'assign/decline_notification/' + id,
                method: 'post',
                type: 'post',
                dataType: 'json',
                success: function(response) {
                        if (response == true) {
                                checkNotificationOfProjectAssign();
                        } else {
                                alert("false");
                        }

                }
        });
        if (refresh == 1) {
                location.reload();
        }
}
$('#message-notifier').click(function() {
        $('#main-message-notifier').html("");
        $.ajax({
                url: baseURL + 'user/message_assign_by',
                method: 'post',
                type: 'post',
                success: function(response) {
                        if (response == true) {
                                checkAcceptOrDeclineOfUser();
                        }

                }
        });
});

function showPreloader() {
        $('#preloader').show();
        $('#status').show();
}

function hidePreloader() {
        $('#preloader').hide();
        $('#status').hide();
        setTimeout(loginErrorFunction, 4000);
        setTimeout(myFunction, 4000);
}

function loginErrorFunction() {
        $('#loginErrorCustom').slideUp('slow');
        $('#loginErrorCustom').html("");
}

function myFunction() {
        $('#signUpError').slideUp('slow');
        $('#signUpError').html("");
}

$(document).ready(function() {
        $(window).on('load', function() { // makes sure the whole site is loaded 
                $('#status').fadeOut(); // will first fade out the loading animation 
                $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
                $('body').delay(350).css({ 'overflow': 'visible' });
        })
        setTimeout(loginErrorActivation, 4000);

        function loginErrorActivation() {
                $('#loginError').slideUp('slow');
                $('#loginError').html("");
        }
});

function allWireframesMethods() {
        $.ajax({
                url: baseURL + 'wireframes/get_all_methods',
                dataType: 'json',
                success: function(response) {
                        if (response.length == 0) {
                                errorBox('<p>No Wireframe Assigned</p>');
                        } else {
                                for (var i = 0; i < response.length; i++) {
                                        $('#selectProject').append('<option value=' + response[i]['p_id'] + ' data-status=' + response[i]['a_status'] + ' data-assign-id=' + response[i]['a_id'] + '>' + response[i]['p_name'] + '</option>');
                                }
                        }
                }
        });
}

function allMockupsMethods() {
        $.ajax({
                url: baseURL + 'mockups/get_all_mockups',
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                        if (response.length == 0) {
                                errorBox('<p>No Mockup Assigned</p>');
                        } else {
                                for (var i = 0; i < response.length; i++) {
                                        $('#selectProjectForMockup').append('<option value=' + response[i]['p_id'] + ' data-status-id=' + response[i]['a_status'] + ' data-assign-id='+response[i]['a_id']+'>' + response[i]['p_name'] + '</option>');
                                }
                        }
                }
        });
}

function allPrototypeMethods() {
        $.ajax({
                url: baseURL + 'prototypes/get_all_prototype',
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                        if (response.length == 0) {
                                errorBox('<p>No Prototype Assigned</p>');
                        } else {
                                for (var i = 0; i < response.length; i++) {
                                        $('#selectProjectForPrototype').append('<option value=' + response[i]['p_id'] + ' data-status-id=' + response[i]['a_status'] + ' data-assign-id='+response[i]['a_id']+'>' + response[i]['p_name'] + '</option>');
                                }
                        }
                }
        });
}

function selectedActivity(a, b) {
        $('.mobile-inner').css('backgroundColor', 'white');
        $('#activity-name-show li').removeClass('active');
        $(a).addClass('active');
        var activityName = $(a).html();
        var activityId = $(a).attr('id');
        $('#selected-activity').val(activityName);
        $('#selected-activity-id').val(activityId);
        var getActivityId = $(a).attr('id');
        $.ajax({
                url: baseURL + 'activity/get_html_of_activity',
                dataType: 'json',
                type: 'post',
                method: 'post',
                data: { getActivityId: getActivityId },
                success: function(response) {
                    console.log(response);
                        //1 for mockups
                        if (b == 1) {
                                if(response.mockup_code != null){
                                    $('.mobile-inner').css('backgroundColor', response.mockup_back_color);
                                    $('.mobile-inner').html(response.mockup_code);
                                }
                                $('.mobile-inner p').removeClass('selected');
                                $('.mobile-inner').mousedown(function(){
                                    $('.mobile-inner p').removeClass('selected');
                                    $(this).addClass('selected');
                                    addSomeAttributesForMockups(this , -1);
                                });
                                $(".mobile-inner p").mousedown(function(e) {
                                        $('.mobile-inner p').removeClass('selected');
                                        $('.mobile-inner').removeClass('selected');
                                        $(this).addClass('selected');
                                        var id = $(this).attr('id');
                                        addSomeAttributesForMockups(this, id);
                                        e.stopPropagation();
                                });
                                $('#save-mockup').attr('data-act-id', response.act_id);
                                $(".mobile-inner p input").addClass('no-select');
                        } //0 for wireframe
                        else {
                                $('.mobile-inner').html(response.act_code);
                                $(a).parent().addClass('active');
                                $('.mobile-inner p').draggable({
                                        containment: 'parent',
                                        cursor: 'move'
                                });
                                $('.mobile-inner p').resizable({
                                        containment: 'parent'
                                });
                                $('.mobile-inner p').removeClass('item');
                                $(".mobile-inner p").mousedown(function() {
                                        $('.mobile-inner p').removeClass('selected');
                                        $(this).addClass('selected');
                                        var id = $(this).attr('id');
                                        addSomeAttributes(this, id);
                                });
                                $('.mobile-inner p').removeClass('selected');
                        }
                }
        });
}

function addSomeAttributesForMockups(component, id){
    if(id == -1){
        $('#property :input').val('');
        $('#inputBgColor').val($(component).css('backgroundColor'));

    }else{
        $(component).attr('id', id);
        var spliting = id.split('_');
        if(spliting[0] == 'text'){
            $(component).css('height', 'auto');
            var innerText = $(component).text();
            var color = $(component).css('color');
            var fontSize = $(component).css('fontSize');
            var fontWieght = $(component).css('fontWeight');
            var marginTop = $(component).css('marginTop');
            var marginLeft = $(component).css('marginLeft');
            var marginRight = $(component).css('marginRight');
            var marginBottom = $(component).css('marginBottom');
            var paddingTop = $(component).css('paddingTop');
            var paddingLeft = $(component).css('paddingLeft');
            var paddingRight = $(component).css('paddingRight');
            var paddingBottom = $(component).css('paddingBottom');
            var backgroundColor = $(component).css('backgroundColor');
            var lineHeight = $(component).css('lineHeight');
            var align = $(component).css('textAlign');
            fillTheMockupProperties(innerText, color, fontSize, fontWieght, marginTop, marginLeft, marginRight, marginBottom, paddingTop, paddingLeft, paddingRight, paddingBottom, backgroundColor, lineHeight, align);
        }else if(spliting[0] == 'edit'){
            var component = $(component).children();
            var color = $(component).css('color');
            var fontSize = $(component).css('fontSize');
            var fontWieght = $(component).css('fontWeight');
            var marginTop = $(component).css('marginTop');
            var marginLeft = $(component).css('marginLeft');
            var marginRight = $(component).css('marginRight');
            var marginBottom = $(component).css('marginBottom');
            var paddingTop = $(component).css('paddingTop');
            var paddingLeft = $(component).css('paddingLeft');
            var paddingRight = $(component).css('paddingRight');
            var paddingBottom = $(component).css('paddingBottom');
            var backgroundColor = $(component).css('backgroundColor');
            var lineHeight = $(component).css('lineHeight');
            fillTheMockupProperties('', color, fontSize, fontWieght, marginTop, marginLeft, marginRight, marginBottom, paddingTop, paddingLeft, paddingRight, paddingBottom, backgroundColor, lineHeight);
        }else if(spliting[0] == 'Button'){
            var component = $(component).children();
            var innerText = $(component).attr('value');
            var color = $(component).css('color');
            var fontSize = $(component).css('fontSize');
            var fontWieght = $(component).css('fontWeight');
            var marginTop = $(component).css('marginTop');
            var marginLeft = $(component).css('marginLeft');
            var marginRight = $(component).css('marginRight');
            var marginBottom = $(component).css('marginBottom');
            var paddingTop = $(component).css('paddingTop');
            var paddingLeft = $(component).css('paddingLeft');
            var paddingRight = $(component).css('paddingRight');
            var paddingBottom = $(component).css('paddingBottom');
            var backgroundColor = $(component).css('backgroundColor');
            var lineHeight = $(component).css('lineHeight');
            fillTheMockupProperties(innerText, color, fontSize, fontWieght, marginTop, marginLeft, marginRight, marginBottom, paddingTop, paddingLeft, paddingRight, paddingBottom, backgroundColor, lineHeight);
        }else if(spliting[0] == 'image'){
            var component = $(component).children();
            var color = $(component).css('color');
            var fontSize = $(component).css('fontSize');
            var fontWieght = $(component).css('fontWeight');
            var marginTop = $(component).css('marginTop');
            var marginLeft = $(component).css('marginLeft');
            var marginRight = $(component).css('marginRight');
            var marginBottom = $(component).css('marginBottom');
            var paddingTop = $(component).css('paddingTop');
            var paddingLeft = $(component).css('paddingLeft');
            var paddingRight = $(component).css('paddingRight');
            var paddingBottom = $(component).css('paddingBottom');
            var backgroundColor = $(component).css('backgroundColor');
            var image = $(component).attr('src');
            var lineHeight = $(component).css('lineHeight');
            fillTheMockupProperties('', color, fontSize, fontWieght, marginTop, marginLeft, marginRight, marginBottom, paddingTop, paddingLeft, paddingRight, paddingBottom, backgroundColor, lineHeight);
        }
    }
}

function fillTheMockupProperties(innerText, color, fontSize, fontWieght, marginTop, marginLeft, marginRight, marginBottom, paddingTop, paddingLeft, paddingRight, paddingBottom, backgroundColor, lineHeight, align){
    var fontSize = fontSize.split('p');
    var marginTop = marginTop.split('p');
    var marginLeft = marginLeft.split('p');
    var marginRight = marginRight.split('p');
    var marginBottom = marginBottom.split('p');
    var paddingTop = paddingTop.split('p');
    var paddingLeft = paddingLeft.split('p');
    var paddingRight = paddingRight.split('p');
    var paddingBottom = paddingBottom.split('p');
    var lineHeight = lineHeight.split('p');
    $('#inputText').val(innerText);
    $('#inputColor').val(color);
    $('#inputFontSize').val(fontSize[0]);
    $('#inputFontWeight').val(fontWieght);
    $('#inputMarginTop').val(marginTop[0]);
    $('#inputMarginLeft').val(marginLeft[0]);
    $('#inputMarginRight').val(marginRight[0]);
    $('#inputMarginBottom').val(marginBottom[0]);
    $('#inputPaddingTop').val(paddingTop[0]);
    $('#inputPaddingLeft').val(paddingLeft[0]);
    $('#inputPaddingRight').val(paddingRight[0]);
    $('#inputPaddingBottom').val(paddingBottom[0]);
    $('#inputLineHeight').val(lineHeight[0]);
    $('#inputBgColor').val(backgroundColor);
    $('#inputAlignText').val(align);
}

function addSomeAttributes(component, id) {
        console.log(component);
        $(component).attr('id', id);
        var id = $(component).attr('id');
        var text = $(component).text();
        var width = $(component).css('width');
        var height = $(component).css('height');
        var top = $(component).css('top');
        var left = $(component).css('left');
        var right = $(component).css('right');
        var bottom = $(component).css('bottom');
        fillTheProperties(id, text, width, height, top, left, right, bottom);
}

function fillTheProperties(id, text, width, height, top, left, right, bottom) {
        var width = width.split('p');
        var height = height.split('p');
        var top = top.split('p');
        var left = left.split('p');
        var right = right.split('p');
        var bottom = bottom.split('p');
        $('#inputID').val(id);
        $('#inputWidth').val(width[0]);
        $('#inputHeight').val(height[0]);
        $('#inputTop').val(top[0]);
        $('#inputLeft').val(left[0]);
        $('#inputRight').val(right[0]);
        $('#inputBottom').val(bottom[0]);
}

function openWireframeModel(p_id, t_type, a_id) {
        $('.mobile-inner').html('');
        $('.mobile-inner').css('backgroundColor', 'transparent');
        $.ajax({
                method: 'post',
                type: 'post',
                url: baseURL + 'activity/get_activity',
                data: { selectedProject: p_id, tastType: t_type },
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                        $('#wireframeProject').html(response[0]['p_name']);
                        $('#approved-wireframe').attr('data-id', a_id);
                        $('#change-wireframe').attr('data-id', a_id);
                        $('#activity-name-show').html('');
                        for (var i = 0; i < response.length; i++) {
                                $('#activity-name-show').append('<li onclick="selectedActivity(this, '+t_type+')" id="' + response[i]['act_id'] + '">' + response[i]['act_name'] + '</li>');
                        }
                }
        });
        $("#pupop").fadeIn("slow");
}

var ADMIN_VIEW_GLOBAL_ACTIVITY_RESULT;

function previewMobileForOwner(id, assin_id){
    $('.approved-btn-owner').attr('data-id', assin_id);
    $('.change-btn-owner').attr('data-id', assin_id);
    ADMIN_VIEW_GLOBAL_ACTIVITY_RESULT = '';
    $('#mobile-preview').html('');
    $.ajax({
            url: baseURL + 'prototypes/get_all_prototype_layout',
            type: 'post',
            dataType: 'json',
            data: { selectedProject: id },
            dataType: 'json',
            success: function(response) {
                ADMIN_VIEW_GLOBAL_ACTIVITY_RESULT = response;
                console.log(ADMIN_VIEW_GLOBAL_ACTIVITY_RESULT);
                var firstactivity = ADMIN_VIEW_GLOBAL_ACTIVITY_RESULT[0]['first_act'];
                for(var i = 0; i < ADMIN_VIEW_GLOBAL_ACTIVITY_RESULT.length; i++){
                    if(ADMIN_VIEW_GLOBAL_ACTIVITY_RESULT[i]['act_id'] == firstactivity) {
                        $('#mobile-preview').append(ADMIN_VIEW_GLOBAL_ACTIVITY_RESULT[i]['mockup_code']);
                        var div = $('#mobile-preview');
                        $(div).css('backgroundColor', ADMIN_VIEW_GLOBAL_ACTIVITY_RESULT[i]['mockup_back_color']);
                        if(ADMIN_VIEW_GLOBAL_ACTIVITY_RESULT[i]['prototype'].length != 0){
                            for(var j = 0; j < ADMIN_VIEW_GLOBAL_ACTIVITY_RESULT[i]['prototype'].length; j++){
                                $(div).find('#' + ADMIN_VIEW_GLOBAL_ACTIVITY_RESULT[i]['prototype'][j]['act_button']).children().attr('data-activity-open', ADMIN_VIEW_GLOBAL_ACTIVITY_RESULT[i]['prototype'][j]['act_open_id']);
                            }
                        }
                        $('#mobile-preview input[type="button"]').click(function(){
                            var openId = $(this).attr('data-activity-open');
                            previewSingleActivityAdmin(openId);
                        });
                    }
                }
            }
    });
    $("#preview-prototype-admin").fadeIn("slow");
}

function previewSingleActivityAdmin(id){
    $('#mobile-preview').html('');
    for(var i = 0; i < ADMIN_VIEW_GLOBAL_ACTIVITY_RESULT.length; i++){
        if(ADMIN_VIEW_GLOBAL_ACTIVITY_RESULT[i]['act_id'] == id) {
            $('#mobile-preview').append(ADMIN_VIEW_GLOBAL_ACTIVITY_RESULT[i]['mockup_code']);
            var div = $('#mobile-preview');
            $(div).css('backgroundColor', ADMIN_VIEW_GLOBAL_ACTIVITY_RESULT[i]['mockup_back_color'])
            if(ADMIN_VIEW_GLOBAL_ACTIVITY_RESULT[i]['prototype'].length != 0){
                for(var j = 0; j < ADMIN_VIEW_GLOBAL_ACTIVITY_RESULT[i]['prototype'].length; j++){
                    $(div).find('#' + ADMIN_VIEW_GLOBAL_ACTIVITY_RESULT[i]['prototype'][j]['act_button']).children().attr('data-activity-open', ADMIN_VIEW_GLOBAL_ACTIVITY_RESULT[i]['prototype'][j]['act_open_id']);
                }
            }
            $('#mobile-preview input[type="button"]').click(function(){
                var openId = $(this).attr('data-activity-open');
                previewSingleActivityAdmin(openId);
            });
        }
    }
}


function openPrototypeModel(p_id, t_type, a_id) {
        $.ajax({
                method: 'post',
                type: 'post',
                url: baseURL + 'prototypes/get_all_prototype_layout_by_owner',
                data: { selectedProject: p_id, tastType: t_type },
                dataType: 'json',
                success: function(response) {
                        console.log(response);
                        $('#mobile-preview').html('');
                        var firstactivity = GLOBAL_ACTIVITY_RESULT[0]['first_act'];
                        for(var i = 0; i < GLOBAL_ACTIVITY_RESULT.length; i++){
                            if(GLOBAL_ACTIVITY_RESULT[i]['act_id'] == firstactivity) {
                                $('#mobile-preview').append(GLOBAL_ACTIVITY_RESULT[i]['act_code']);
                                var div = $('#mobile-preview');
                                if(GLOBAL_ACTIVITY_RESULT[i]['prototype'].length != 0){
                                    for(var j = 0; j < GLOBAL_ACTIVITY_RESULT[i]['prototype'].length; j++){
                                        $(div).find('#' + GLOBAL_ACTIVITY_RESULT[i]['prototype'][j]['act_button']).children().attr('data-activity-open', GLOBAL_ACTIVITY_RESULT[i]['prototype'][j]['act_open_id']);
                                    }
                                }
                                $('#mobile-preview input[type="button"]').click(function(){
                                    var openId = $(this).attr('data-activity-o`pen');
                                    previewSingleActivity(openId);
                                });
                            }
                        }
                        $("#preview-prototype").fadeIn("slow");
                }
        });
}

function allProjectCreatedChat(){
    $('#inbox_chat').html('');
    $.ajax({
                method: 'post',
                type: 'post',
                url: baseURL + 'chat/get_project_chat',
                dataType: 'json',
                success: function(response) {
                    for(var i = 0; i < response.length; i++){
                        var supervisor;
                        var wireframe;
                        var mockup;
                        var prototype;
                        var assignType = '';
                        if(response[i].supervisor != null){
                            if(response[i].supervisor.u_id == response[0]['myid']){
                                assignType = 's_seen';
                            }
                            supervisor = '<u>Supervisor:</u> ' + response[i].supervisor.u_fname + ' ' + response[i].supervisor.u_lname + '<br>';
                        }else{
                            supervisor = '';
                        }
                        if(response[i].wireframe != null){
                            if(response[i].wireframe.u_id == response[0]['myid']){
                                assignType = 'w_seen';
                            }
                            wireframe = '<u>Wireframe:</u> ' + response[i].wireframe.u_fname + ' ' + response[i].wireframe.u_lname + '<br>';
                        }else{
                            wireframe = '';
                        }
                        if(response[i].mockup != null){
                            if(response[i].mockup.u_id == response[0]['myid']){
                                assignType = 'm_seen';
                            }
                            mockup = '<u>Mockup:</u> ' +response[i].mockup.u_fname + ' ' + response[i].mockup.u_lname + '<br>';
                        }else{
                            mockup = '';
                        }
                        if(response[i].prototype != null){
                            if(response[i].prototype.u_id == response[0]['myid']){
                                assignType = 'p_seen';
                            }
                            prototype = '<u>Prototype:</u> ' + response[i].prototype.u_fname + ' ' + response[i].prototype.u_lname + '<br>';
                        }else{
                            prototype = '';
                        }
                        if(response[i].owner.u_id == response[0]['myid']){
                            assignType = "u_seen";
                            console.log(response[i].owner.u_id);
                        }

                        $('#inbox_chat').append('<div class="chat_list active_chat" onclick=select_chat_box('+response[i]['ch_id']+ ',"' +assignType +'")>\
                                        <div class="chat_people">\
                                          <div class="chat_img"><img src="https://cdn2.iconfinder.com/data/icons/startup-management/325/Project_management_Business_Case-512.png"></div>\
                                          <div class="chat_ib">\
                                            <h5>'+response[i]['p_name']+' <span class="chat_date">Dec 25</span></h5>\
                                            <p>'+ '<u>Project Owner:</u> ' + response[i].owner.u_fname + ' ' + response[i].owner.u_lname + '<br>'
                                                + supervisor + wireframe + mockup + prototype +
                                            '</p>\
                                          </div>\
                                        </div>\
                                      </div>');
                    }
                        console.log(response);
                }
        });
}

var GLOBAL_ACTIVITY_RESULT;;

function printPrototype(selectedProject){
    $('#pro-box-screens').html('');
     $.ajax({
            url: baseURL + 'prototypes/get_all_prototype_layout',
            type: 'post',
            dataType: 'json',
            data: { selectedProject: selectedProject },
            dataType: 'json',
            success: function(response) {
                GLOBAL_ACTIVITY_RESULT = response;
                console.log(GLOBAL_ACTIVITY_RESULT);
                $('#select-activity').html('');
                $('#select-activity').html('');
                $('#select-activity').append('<option value="0">--Select First Activity--</option>');
                    var pos = 1;
                    var top = 30;
                    for (var i = 0; i < response.length; i++) {
                            pos = pos;
                            if(i == 4){
                                pos = 1;
                                top = 552;
                            }
                            $('#pro-box-screens').append('<div class="mobile-inner mt-0 prototype-mobile-inner" data-content="'+response[i]['act_name']+'" data-id="'+response[i]['act_id']+'" style="left:' + pos + 'rem;top:'+top+'px;position:absolute;background-color:'+response[i]['mockup_back_color']+';">' + response[i]['mockup_code'] + '</div>');
                            pos = pos + 17;
                            $('#select-activity').append('<option value="'+response[i]['act_id']+'">'+response[i]['act_name']+'</option>');
                            var selectedActivity = '';
                            if(response[i]['first_act'] == response[i]['act_id']){
                                selectedActivity = 'selected';
                            }
                            $('#first-activity').append('<option value="'+response[i]['act_id']+'" '+selectedActivity+'>'+response[i]['act_name']+'</option>');
                            var div = $('.mobile-inner')[i];
                            if(response[i]['prototype'].length != 0){
                                for(var j = 0; j < response[i]['prototype'].length; j++){
                                    var proName = response[i]['prototype'][j]['act_open_name'].split(' ');
                                    $(div).find('#' + response[i]['prototype'][j]['act_button']).attr('data-content', proName[0]);
                                    $(div).find('#' + response[i]['prototype'][j]['act_button']).addClass('pro-before');
                                    $(div).find('#' + response[i]['prototype'][j]['act_button']).children().attr('data-status', 'edit');
                                    $(div).find('#' + response[i]['prototype'][j]['act_button']).children().attr('data-edit-activity', response[i]['prototype'][j]['act_open_id']);
                                    $(div).find('#' + response[i]['prototype'][j]['act_button']).children().attr('data-prototype-id', response[i]['prototype'][j]['pt_id']);
                                }
                            }
                    }
                    $('.mobile-inner').each(function(){
                        var count = 0;
                        $(this).find('input[type="button"]').each(function(){
                            count++;
                            $(this).attr('button-number', count);
                        })
                        // var count = $(this).find('input[type="button"]').length;
                    });
                    $('.mobile-inner p').removeClass('selected');
                    if($('#first-activity').prop('disabled') != true){
                        $('.mobile-inner input[type="button"]').click(function(){
                            $('#prototype-id').val('');
                            $('#pro-click-button').val($(this).parent().attr('id'));
                            $('#pro-act-id').val($(this).parent().parent().data('id'));
                            $('#button-count').val($(this).attr('data-button-count'));
                            if($(this).attr('data-status') == 'edit'){
                                $('#prototype-id').val($(this).attr('data-prototype-id'));
                                $('#exampleModal #select-activity').val($(this).attr('data-edit-activity'));
                            }else{
                                $('#exampleModal #select-activity option:eq(0)').prop('selected', true);
                            }
                            $('#exampleModal').modal('show');
                        });
                    }
            }
    });
}