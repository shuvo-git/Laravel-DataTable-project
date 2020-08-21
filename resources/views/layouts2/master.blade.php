<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>Banglalink</title>

        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{ asset("/bower_components/admin-lte/plugins/fontawesome-free/css/all.min.css") }}">
        
        <!-- Ionicons -->                                                                   
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="{{ asset("/bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css") }}">
        <link rel="stylesheet" href="{{ asset("/bower_components/admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css") }}">
        <!-- MessageBox -->
        <link rel="stylesheet" href="{{ asset("/bower_components/gasparesganga-jquery-message-box/dist/messagebox.min.css") }}">

        
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset("/bower_components/admin-lte/dist/css/adminlte.min.css") }}">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

        

    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">

            <!-- Header -->
            <@include('layouts2.header')

            <!-- Sidebar -->
            @include('layouts2.sidebar')
            

            

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Customer List</h1>
                        </div><!-- /.col -->

                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active">Customer List</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <div class="content">
                    <!-- Your Page Content Here -->
                    @yield('content')
                </div>
                <!-- /.content -->

            </div>
            <!-- /.content-wrapper -->

            <!-- Footer -->
            @include('layouts2.footer')

            
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->
            <!-- jQuery -->
            <script src="{{ asset("/bower_components/admin-lte/plugins/jquery/jquery.min.js") }}"></script>
            <!-- Bootstrap 4 -->
            <script src="{{ asset ("/bower_components/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
            
            <!-- DataTables -->
            <script src="{{ asset ("/bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js") }}"></script>
            <script src="{{ asset ("/bower_components/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js") }}"></script>
            <script src="{{ asset ("/bower_components/admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js") }}"></script>
            <script src="{{ asset ("/bower_components/admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js") }}"></script>
            
            <!-- MessageBox -->
            <script src="{{ asset ("/bower_components/gasparesganga-jquery-message-box/dist/messagebox.min.js") }}"></script>
            
            <!-- AdminLTE App -->
            <script src="{{ asset ("/bower_components/admin-lte/dist/js/adminlte.min.js") }}"></script>
            
            <script>
                var depts={};
                function loadDeparments()
                {
                    $.ajax({
                        url: 'api/department/',
                        type: 'GET',
                        success: function(result) {
                            $.each( result, function( k, v) {
                                depts[v.id] = v.department;
                            });
                            //console.log(depts);
                        },
                        error: function (data) { 
                            
                        }
                            
            
                    });
                }
                
                
                $( document ).ready(function() {
                    
                    loadDeparments();
            
                    $('#example').DataTable({
                        //"processing": true,
                        "serverSide": true,
                        ajax:{
                            url: "api/list",
                            type: "POST"
                        },
                        "deferRender": true,
                        columns: [
                            { data: "id"},
                            { data: "name" },
                            { data: "department" },
                            { data: "null",render: function(data,type,row,meta){
                                    return "<a href='#'>Edit</a> | <a href='#'>Delete</a>"; 
                                } 
                            },
                            
                        ],
                        "ordering": true,
                        select: true
                    });
            
                    $(document).on("click", "tr td a", function(e) {
                        var index = $(this).index(); 
            
                        var rid = $(this).parents()[1].childNodes[0].innerText;
                        var rname = $(this).parents()[1].childNodes[1].innerText;
                        var rdept = $(this).parents()[1].childNodes[2].innerText;
            
                        if(index==1)
                        $.MessageBox({
                            buttonDone  : "Yes",
                            buttonFail  : "No",
                            message     : "Are you sure you want to delete this row ?"
                        }).done(function(){
                            
                            console.log(rid);
                            $.ajax({
                                url: 'api/list/'+rid,
                                type: 'DELETE',
                                success: function(result) {
                                    $('#example').DataTable().ajax.reload(null,false);
                                    $.MessageBox("Deletion Successful !");
                                },
                                error: function (data) { 
                                    $.MessageBox("Deletion Unsuccessful !");
                                }
                                 
            
                            });
                            
                            
                        });
            
                        else if(index==0)
                        $.MessageBox({
                            buttonDone      : "Update",
                            buttonFail      : "Cancel",
                            message : "<b>Update fields below!</b>",
                            input   : {
                                name    : {
                                    type         : "text",
                                    label        : "Customer Name:",
                                    defaultValue : rname
                                },
                                department    : {
                                    type         : "text",
                                    label        : "Department:",
                                    defaultValue : rdept
                                }
                            },
                            top     : "auto"
                        }).done(function(data){
                            $.ajax({
                                url: 'api/list/'+rid,
                                type: 'PUT',
                                data: data,
                                success: function(result) {
                                    $('#example').DataTable().ajax.reload(null,false);
                                    $.MessageBox("Update Successful !!");
                                },
                                error: function (data) { 
                                    $.MessageBox("There is a problem while updating your Data !!");
                                }
                                 
            
                            });
                            
                        }).fail(function(){
                            //$.MessageBox("Ok, Not Deleted.");
                        });
                        
                    });
            
                    $("#addCustomer").click(function(){
            
                        
                        $.MessageBox({
                            buttonDone      : "Add",
                            buttonFail      : "Cancel",
                            message : "<b>Add Customer</b>",
                            input   : {
                                customerName     : {
                                    type         : "text",
                                    label        : "Customer Name:",
                                    title        : ""
                                },
                                selectDepartment : {
                                    type         : "select",
                                    label        : "Select Department Name:",
                                    title        : "",
                                    options      : depts
                                }
                            },
                            top     : "auto"
                        }).done(function(data){
                            $.ajax({
                                url: 'api/customer',
                                type: 'POST',
                                data: data,
                                success: function(result) {
                                    $('#example').DataTable().ajax.reload(null,false);
                                    //$.MessageBox("Update Successful !!");
                                    console.log(result);
                                },
                                error: function (data) { 
                                    //$.MessageBox("There is a problem while updating your Data !!");
                                }
                            })
                        });
            
                    });
            
                    
                });
            </script>
    </body>
</html>
