<meta charset="utf-8">
<meta name="description" content="">
<meta name="author" content="Jobayed Ullah">
<meta name="csrf-token" content="{{ csrf_token() }}" />

<title>BookWorm</title>

    
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-message-box@3.2.2/dist/messagebox.min.css">
    
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-message-box@3.2.2/dist/messagebox.min.js"></script>
    
    

    <style>
        
        .dt-table{
            margin-top: 10px;
            margin-bottom: 10px;
            background: #fff; /*#dff5e5;*/
            padding: 30px 15px 30px 15px;
            border: #15a77d solid 1px;
            border-radius: 7px;
            color: green;
            box-shadow: 2px 2px 3px #999;
        }
        .my-float{
            margin-top:22px;
        }
        

        .footer{
            background-color: #15a77d;
            padding: 50px;
        }

        .greener{
            background-color: #5fa075;
            padding: 10px;
        }
    </style>


