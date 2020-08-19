@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="dt-table" id="table-div">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Id </th>
                        <th>Customer Name</th>
                        <th>Department</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
            </table>
        </div>
        
    </div>


    <script>

        
        $( document ).ready(function() {
            
            

            $('#example').DataTable({
                
                ajax:"api/list",
                columns: [
                    { data: "id"},
                    { data: "name" },
                    { data: "department" },
                    { data: "null",render: function(data,type,row,meta){
                            return "<a href='#'>Edit</a> | <a href='#'>Delete</a>"; 
                            //return "<form action=\"/admins/approve/" + row.id + "\" method=\"POST\">"+
                            //            "<input type=\"hidden\" name=\"_method\" value=\"PUT\">";
                        } 
                    },
                    
                ],
                "ordering": false,
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
                            $('#example').DataTable().ajax.reload();
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
                            //$('#example').DataTable().ajax.reload();
                            $.MessageBox("Update Successful : "+result.name +" and "+result.dept);
                        },
                        error: function (data) { 
                            $.MessageBox("There is a problem while updating your Data");
                        }
                         

                    });
                    
                }).fail(function(){
                    //$.MessageBox("Ok, Not Deleted.");
                });
                
            });

            
        });
    </script>
    
@endsection

    

    