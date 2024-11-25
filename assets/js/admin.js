$(document).ready(function(){
    var base_url = $('.site-url').val();
    // //loader
    var loader = `<div class="loader">
    <span class="loader-inner box-1"></span>
    <span class="loader-inner box-2"></span>
    <span class="loader-inner box-3"></span>
    <span class="loader-inner box-4"></span>
    </div>`;

    // message methods
    function messageHide(){
        $('.message').animate({ opacity: 0,top: '0' }, 'slow');
        setTimeout(function(){ $(".message").html(''); }, 1000);
    }
    messageHide();

    function messageShow(data){
        $(".message").html(data);
        $('.message').animate({ opacity: 1,top: '60px' }, 'slow');

        setTimeout(function(){ messageHide() }, 3000);
    }

    //check admin login
    $("#admin_Login").on("submit", function(e){
        e.preventDefault();
        var username = $('.username').val();
        var password = $('.password').val();
        if(username == '' || password == ''){
            messageShow("<div class='alert alert-danger'>Please fill all the fields.</div>");
        }else{
            document.getElementsByClassName('card-body')[0].innerHTML += loader;
            $.ajax({
                url: './php_files/admin_login.php',
                type: 'POST',
                data: {login:1,name:username,pass:password},
                success: function(data){
                    var data = JSON.parse(data);
                    if(data.hasOwnProperty('success')){
                        messageShow("<div class='alert alert-success'>Logged In Successfully.</div>");
                        setTimeout(function(){ window.location='dashboard.php'}, 2000);
                    }else if(data.hasOwnProperty('error')){
                        messageShow("<div class='alert alert-danger'>Username and Password are not matched.</div>");
                        setTimeout(function(){$('.loader').hide();}, 2000);
                    }
                }
            });
        }
    });

    //admin logout
    $('.logout').click(function(){
        $.ajax({
            url: './php_files/admin_login.php',
            type: 'POST',
            data: {logout:'1'},
            success: function(data){
                if(data == '1'){
                    setTimeout(function(){ window.location='index.php';}, 1000);
                }
            }
        });
    });

    //update profile script
    $('#update-profile').on("submit", function(e){
        e.preventDefault();
        var admin_name = $('.name').val();
        var admin_email = $('.email').val();
        var admin_phone = $('.phone').val();
        var admin_address = $('.address').val();
        var admin_username = $('.username').val();
        if(admin_name == ''){
            messageShow("<div class='alert alert-danger'>Name Field is Empty.</div>");
        }else if(admin_email == ''){
            messageShow("<div class='alert alert-danger'>Email Field is Empty.</div>");
        }else if(admin_phone == ''){
            messageShow("<div class='alert alert-danger'>Phone Field is Empty.</div>");
        }else if(admin_address == ''){
            messageShow("<div class='alert alert-danger'>Address Field is Empty.</div>");
        }else if(admin_username == ''){
            messageShow("<div class='alert alert-danger'>Username Field is Empty.</div>");
        }else{
            var formdata = new FormData(this);
            formdata.append('update-profile',1);
            document.getElementsByClassName('card-body')[0].innerHTML += loader;
            $.ajax({
                url: './php_files/profile.php',
                type: 'POST',
                data: formdata,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(data){
                    if(data.hasOwnProperty('success')){
                        messageShow("<div class='alert alert-success'>Profile Updated Successfully.</div>");
                        setTimeout(function(){ window.location='profile.php';}, 2000);
                    }else if(data.hasOwnProperty('login')){
                        messageShow("<div class='alert alert-success'>Please Login with New Password.</div>");
                        setTimeout(function(){ window.location='index.php';}, 2000);
                    }else{
                        messageShow("<div class='alert alert-danger'>Server side error.</div>");
                    }
                }
            });
        }
    });

    //update setting script
    $('#update-settings').on("submit", function(e){
        e.preventDefault();
        var site_name = $('.site_name').val();
        if(site_name == ''){
            messageShow("<div class='alert alert-danger'>Site Name Field is Empty.</div>");
        }else{
            var formdata = new FormData(this);
            formdata.append('update-settings',1);
            document.getElementsByClassName('card-body')[0].innerHTML += loader;
            $.ajax({
                url: './php_files/setting.php',
                type: 'POST',
                data: formdata,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(data){
                    if(data.hasOwnProperty('success')){
                        messageShow("<div class='alert alert-success'>Setting updated successfully.</div>");
                        setTimeout(function(){ window.location='settings.php';}, 2000);
                      }else{
                        messageShow("<div class='alert alert-danger'>"+data.error+"</div>");
                        setTimeout(function(){$('.loader').hide();}, 2000);
                    }
                }
            });
        }
    });

    //add account
    $('#add-account').on("submit", function(e){
        e.preventDefault();
        var category_name = $('.cat_name').val();
        if(category_name == ''){
            messageShow("<div class='alert alert-danger'>Account Name Field is Empty.</div>");
        }else{
            var formdata = new FormData(this);
            formdata.append('add-account',1);
            document.getElementsByClassName('card-body')[0].innerHTML += loader;
            $.ajax({
                url: './php_files/accounts.php',
                type: 'POST',
                data: formdata,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(data){
                    if(data.hasOwnProperty('success')){
                        messageShow("<div class='alert alert-success'>Saved successfully.</div>");
                        setTimeout(function(){ window.location='manage-accounts.php';}, 2000);
                      }else{
                        messageShow("<div class='alert alert-danger'>"+data.error+"</div>");
                        setTimeout(function(){$('.loader').hide();}, 2000);
                    }
                }
            });
        }
    });

    //update account
    $('#update-account').on("submit", function(e){
        e.preventDefault();
        var category_name = $('.cat_name').val();
        if(category_name == ''){
            messageShow("<div class='alert alert-danger'>Account Name Field is Empty.</div>");
        }else{
            var formdata = new FormData(this);
            formdata.append('update-account',1);
            document.getElementsByClassName('card-body')[0].innerHTML += loader;
            $.ajax({
                url: './php_files/accounts.php',
                type: 'POST',
                data: formdata,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(data){
                    if(data.hasOwnProperty('success')){
                        messageShow("<div class='alert alert-success'>Updated successfully.</div>");
                        setTimeout(function(){ window.location='manage-accounts.php';}, 2000);
                      }else{
                        messageShow("<div class='alert alert-danger'>"+data.error+"</div>");
                        setTimeout(function(){$('.loader').hide();}, 2000);
                    }
                }
            });
        }
    });

    //delete account
    $('.delete-category').on("click", function(){
        var cat_id = $(this).data('vcid');
        if(confirm("Are you sure want to delete this account.")){
            document.getElementsByClassName('card-body')[0].innerHTML += loader;
            $.ajax({
                url: './php_files/accounts.php',
                type: 'POST',
                data: {cat_delete:cat_id},
                dataType: 'json',
                success: function(data){
                    if(data.hasOwnProperty('success')){
                        messageShow("<div class='alert alert-success'>Data deleted successfully.</div>");
                        setTimeout(function(){ window.location='manage-accounts.php';}, 2000);
                      }else{
                        messageShow("<div class='alert alert-danger'>"+data.error+"</div>");
                        setTimeout(function(){$('.loader').hide();}, 2000);
                    }
                }
            });
        }
    });


    //add account
    $('#add-role').on("submit", function(e){
        e.preventDefault();
        var role_name = $('.role_name').val();
        if(role_name == ''){
            messageShow("<div class='alert alert-danger'>Account Name Field is Empty.</div>");
        }else{
            var formdata = new FormData(this);
            formdata.append('add-role',1);
            document.getElementsByClassName('card-body')[0].innerHTML += loader;
            $.ajax({
                url: './php_files/roles.php',
                type: 'POST',
                data: formdata,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(data){
                    if(data.hasOwnProperty('success')){
                        messageShow("<div class='alert alert-success'>Saved successfully.</div>");
                        setTimeout(function(){ window.location='manage-roles.php';}, 2000);
                      }else{
                        messageShow("<div class='alert alert-danger'>"+data.error+"</div>");
                        setTimeout(function(){$('.loader').hide();}, 2000);
                    }
                }
            });
        }
    });

    //update role
    $('#update-role').on("submit", function(e){
        e.preventDefault();
        var role_name = $('.role_name').val();
        if(role_name == ''){
            messageShow("<div class='alert alert-danger'>Account Name Field is Empty.</div>");
        }else{
            var formdata = new FormData(this);
            formdata.append('update-role',1);
            document.getElementsByClassName('card-body')[0].innerHTML += loader;
            $.ajax({
                url: './php_files/roles.php',
                type: 'POST',
                data: formdata,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(data){
                    if(data.hasOwnProperty('success')){
                        messageShow("<div class='alert alert-success'>Updated successfully.</div>");
                        setTimeout(function(){ window.location='manage-roles.php';}, 2000);
                    }else{
                        messageShow("<div class='alert alert-danger'>"+data.error+"</div>");
                        setTimeout(function(){$('.loader').hide();}, 2000);
                    }
                }
            });
        }
    });

    //delete project
    $('.delete-role').on("click", function(){
        var role_id = $(this).data('rid');
        if(confirm("Are you sure want to delete this role.")){
            document.getElementsByClassName('card-body')[0].innerHTML += loader;
            $.ajax({
                url: './php_files/roles.php',
                type: 'POST',
                data: {role_delete:role_id},
                dataType: 'json',
                success: function(data){
                    if(data.hasOwnProperty('success')){
                        messageShow("<div class='alert alert-success'>Data deleted successfully.</div>");
                        setTimeout(function(){ window.location='manage-roles.php';}, 2000);
                      }else{
                        messageShow("<div class='alert alert-danger'>"+data.error+"</div>");
                        setTimeout(function(){$('.loader').hide();}, 2000);
                    }
                }
            });
        }
    });


//add user
$('#add-user').on("submit", function(e){
    e.preventDefault();
    var first_name = $('.first_name').val();
    var last_name = $('.last_name').val();
    var email = $('.email').val();
    var username = $('.username').val();
    var password = $('.password').val();
    var roles = $('.roles').val();
    if(first_name == ''){
        messageShow("<div class='alert alert-danger'>Name Field is Empty.</div>");
    }else if(last_name == ''){
        messageShow("<div class='alert alert-danger'>Email Field is Empty.</div>");
    }else if(email == ''){
        messageShow("<div class='alert alert-danger'>Phone Field is Empty.</div>");
    }else if(username == ''){
        messageShow("<div class='alert alert-danger'>Address Field is Empty.</div>");
    }else if(password == ''){
        messageShow("<div class='alert alert-danger'>Username Field is Empty.</div>");
    }else if(roles == ''){
        messageShow("<div class='alert alert-danger'>Username Field is Empty.</div>");
    }else{
        var formdata = new FormData(this);
        formdata.append('add-user',1);
        document.getElementsByClassName('card-body')[0].innerHTML += loader;
        $.ajax({
            url: './php_files/users.php',
            type: 'POST',
            data: formdata,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(data){
                if(data.hasOwnProperty('success')){
                    messageShow("<div class='alert alert-success'>Saved successfully.</div>");
                    setTimeout(function(){ window.location='manage-users.php';}, 2000);
                  }else{
                    messageShow("<div class='alert alert-danger'>"+data.error+"</div>");
                    setTimeout(function(){$('.loader').hide();}, 2000);
                }
            }
        });
    }
});


//update projects
$('#update-user').on("submit", function(e){
    e.preventDefault();
    var first_name = $('.first_name').val();
    var last_name = $('.last_name').val();
    var email = $('.email').val();
    var username = $('.username').val();
    var password = $('.password').val();
    var roles = $('.roles').val();
    if(first_name == ''){
        messageShow("<div class='alert alert-danger'>Name Field is Empty.</div>");
    }else if(last_name == ''){
        messageShow("<div class='alert alert-danger'>Email Field is Empty.</div>");
    }else if(email == ''){
        messageShow("<div class='alert alert-danger'>Phone Field is Empty.</div>");
    }else if(username == ''){
        messageShow("<div class='alert alert-danger'>Address Field is Empty.</div>");
    }else if(password == ''){
        messageShow("<div class='alert alert-danger'>Username Field is Empty.</div>");
    }else if(roles == ''){
        messageShow("<div class='alert alert-danger'>Username Field is Empty.</div>");
    }else{
        var formdata = new FormData(this);
        formdata.append('update-user',1);
        document.getElementsByClassName('card-body')[0].innerHTML += loader;
        $.ajax({
            url: './php_files/users.php',
            type: 'POST',
            data: formdata,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(data){
                if(data.hasOwnProperty('success')){
                    messageShow("<div class='alert alert-success'>Updated successfully.</div>");
                    setTimeout(function(){ window.location='manage-users.php';}, 2000);
                  }else{
                    messageShow("<div class='alert alert-danger'>"+data.error+"</div>");
                    setTimeout(function(){$('.loader').hide();}, 2000);
                }
            }
        });
    }
});




    //add project
    $('#add-project').on("submit", function(e){
        e.preventDefault();
        var category_name = $('.cat_name').val();
        if(category_name == ''){
            messageShow("<div class='alert alert-danger'>Project Name Field is Empty.</div>");
        }else{
            var formdata = new FormData(this);
            formdata.append('add-project',1);
            document.getElementsByClassName('card-body')[0].innerHTML += loader;
            $.ajax({
                url: './php_files/projects.php',
                type: 'POST',
                data: formdata,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(data){
                    if(data.hasOwnProperty('success')){
                        messageShow("<div class='alert alert-success'>Saved successfully.</div>");
                        setTimeout(function(){ window.location='manage-projects.php';}, 2000);
                      }else{
                        messageShow("<div class='alert alert-danger'>"+data.error+"</div>");
                        setTimeout(function(){$('.loader').hide();}, 2000);
                    }
                }
            });
        }
    });

    //update projects
    $('#update-project').on("submit", function(e){
        e.preventDefault();
        var category_name = $('.cat_name').val();
        if(category_name == ''){
            messageShow("<div class='alert alert-danger'>Project Name Field is Empty.</div>");
        }else{
            var formdata = new FormData(this);
            formdata.append('update-project',1);
            document.getElementsByClassName('card-body')[0].innerHTML += loader;
            $.ajax({
                url: './php_files/projects.php',
                type: 'POST',
                data: formdata,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(data){
                    if(data.hasOwnProperty('success')){
                        messageShow("<div class='alert alert-success'>Updated successfully.</div>");
                        setTimeout(function(){ window.location='manage-projects.php';}, 2000);
                      }else{
                        messageShow("<div class='alert alert-danger'>"+data.error+"</div>");
                        setTimeout(function(){$('.loader').hide();}, 2000);
                    }
                }
            });
        }
    });

    //delete project
    $('.delete-project').on("click", function(){
        var cat_id = $(this).data('vcid');
        if(confirm("Are you sure want to delete this account.")){
            document.getElementsByClassName('card-body')[0].innerHTML += loader;
            $.ajax({
                url: './php_files/projects.php',
                type: 'POST',
                data: {cat_delete:cat_id},
                dataType: 'json',
                success: function(data){
                    if(data.hasOwnProperty('success')){
                        messageShow("<div class='alert alert-success'>Data deleted successfully.</div>");
                        setTimeout(function(){ window.location='manage-projects.php';}, 2000);
                      }else{
                        messageShow("<div class='alert alert-danger'>"+data.error+"</div>");
                        setTimeout(function(){$('.loader').hide();}, 2000);
                    }
                }
            });
        }
    });

    //add goal
    $("#add-goal").on("submit", function(e){
        e.preventDefault();
        var name = $('.name').val();
        if(name == ''){
            messageShow("<div class='alert alert-danger'>Goal Name Field is Empty.</div>");
        }else{
            var formdata = new FormData(this);
            formdata.append('add-goal',1);
            console.log(formdata);
            document.getElementsByClassName('card-body')[0].innerHTML += loader;
            $.ajax({
                url: './php_files/goals.php',
                type: 'POST',
                data: formdata,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(data){
                    console.log(data);
                    if(data.hasOwnProperty('success')){
                        messageShow("<div class='alert alert-success'>Saved successfully.</div>");
                        setTimeout(function(){ window.location='manage-goal.php';}, 2000);
                      }else{
                        messageShow("<div class='alert alert-danger'>"+data.error+"</div>");
                        setTimeout(function(){$('.loader').hide();}, 2000);
                    }
                }
            });
        }
    });

    //update goal
    $("#update-goal").on("submit", function(e){
        e.preventDefault();
        var name = $('.name').val();
        if(name == ''){
            messageShow("<div class='alert alert-danger'>Goal Name Field is Empty.</div>");
        }else{
            var formdata = new FormData(this);
            formdata.append('update-goal',1);
            document.getElementsByClassName('card-body')[0].innerHTML += loader;
            $.ajax({
                url: './php_files/goals.php',
                type: 'POST',
                data: formdata,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(data){
                    if(data.hasOwnProperty('success')){
                        messageShow("<div class='alert alert-success'>Updated successfully.</div>");
                        setTimeout(function(){ window.location='manage-goal.php';}, 2000);
                      }else{
                        messageShow("<div class='alert alert-danger'>"+data.error+"</div>");
                        setTimeout(function(){$('.loader').hide();}, 2000);
                    }
                }
            });
        }
    });

    //delete goal
    $('.delete-goal').on("click", function(){
        var cat_id = $(this).data('vcid');
        if(confirm("Are you sure want to delete this goal.")){
            document.getElementsByClassName('card-body')[0].innerHTML += loader;
            $.ajax({
                url: './php_files/goals.php',
                type: 'POST',
                data: {cat_delete:cat_id},
                dataType: 'json',
                success: function(data){
                    if(data.hasOwnProperty('success')){
                        messageShow("<div class='alert alert-success'>Data deleted successfully.</div>");
                        setTimeout(function(){ window.location='manage-goal.php';}, 2000);
                      }else{
                        messageShow("<div class='alert alert-danger'>"+data.error+"</div>");
                        setTimeout(function(){$('.loader').hide();}, 2000);
                    }
                }
            });
        }
    });

    var colltable = $('#reportData').DataTable({
        processing: true, //Feature control the processing indicator.
        order: [], //Initial no order.
        ajax: {
            url: "./php_files/report.php",
            type: "POST",
            data: function(data){
                // Read values
                var from_date = $('input[name=from_date]').val();
                var to_date = $('input[name=to_date]').val();
                var type = $('select[name=search_type] option:selected').val();
                // Append to data
                data.from_date = from_date;
                data.to_date = to_date;
                data.type = type;
            },
        },
        columns: [
          { data: "project" },
          { data: "sprintReleaseName" },
          { data: "createdAt" },
          { data: "dmName" },
          { data: "goalStatus" }
        ],
        dom: 'Bfrtip',
          buttons: [
            { extend: 'csvHtml5', footer: true },
            { extend: 'pdfHtml5', footer: true },
            { extend: 'print', footer: true }
        ]
    });

    $("#search-form").on("submit", function(e){
        e.preventDefault();
        colltable.ajax.reload();
    });


});