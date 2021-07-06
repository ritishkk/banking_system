<html>
    <head>
        <title>People's Bank</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

        <style>
            *{
                box-sizing:border-box;
                margin:0;
            }
            .card{
                box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
                cursor: pointer;
            }
            .card:hover{
                box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 1px, rgba(0, 0, 0, 0.07) 0px 2px 2px, rgba(0, 0, 0, 0.07) 0px 4px 4px, rgba(0, 0, 0, 0.07) 0px 8px 8px, rgba(0, 0, 0, 0.07) 0px 16px 16px;
            }
        </style>
    </head>
    <body style="background:#e4ebe9">
        <div class="w-100 p-4 text-center text-light " style="background:black; font-style:italic; cursor:default"><h1>People's Bank</h1></div>
        
        <div class="container-fluid d-flex justify-content-center p-3 mt-5">
             
             <div class="card m-2" style="width:400px; background:#d5e8e3; ">
             
                <div class="card-body">
                <center><span class="material-icons" style="font-size:250; color:black">account_circle</span></center>
                    <a href="users.php" style="background:#0b6623; color:white; font-weight:bolder" class="btn w-100 p-2">View Customers</a>
                </div>
            </div>

            <div class="card m-2" style="width:400px; background:#d5e8e3; ">
                
                <div class="card-body">
                <center><span class="material-icons" style="font-size:250; color:black">account_balance</span></center>
                    <a href="transfer.php" style="background:#0b6623; color:white; font-weight:bolder" class="btn w-100 p-2">Money Transfer</a>
                </div>
            </div>

            <div class="card m-2" style="width:400px; background:#d5e8e3; ">
        
                <div class="card-body">
                <center><span class="material-icons" style="font-size:250; color:black">history</span></center>
                    <a href="history.php" style="background:#0b6623; color:white; font-weight:bolder" class="btn w-100 p-2">Transaction History</a>
                </div>
            </div>

        </div>
    </body>
</html>