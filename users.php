<html>
    <head>
    <title>Users</title>
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
            tbody tr{
                background:#CCC;
            }

            tbody tr:hover{
                background:#648f6f;
            }
            a{
                text-decoration:none;
                margin:10px;
                color:green;
                font-weight:bolder;
            }
            a:hover{
                text-decoration:none;   
            }
            .d-flex h1, .d-flex div{
                width:33%;
            }

        </style>
    </head>
    <body style="background:#e4ebe9">
    <div class="w-100 p-4 d-flex justify-content-between" style="background:black; font-style:italic; color:white">
        <h1 class=" ml-4">People's Bank</h1>
        <h1 class="text-center">Customers</h1>
        <div class="d-flex justify-content-end align-self-center">
            <a href="index.php">Home</a>
            <a href="transfer.php">Transfer</a>
            <a href="history.php">History</a>
        </div>
    </div>

            
    <div class="container mt-4" >
            <table class="table border border-dark">
    <thead class="thead-dark">
      
      <tr class='text-center'>
            <th>Id</th>
            <th>Name</th>
            <th>View</th>
            <th>Transfer</th>
        
        </tr>
      
    </thead>
    <tbody>
    <?php
            require_once "config.php";
            $sql = "select *from users";
            
            $res=mysqli_query($link,$sql);
            while($row=mysqli_fetch_assoc($res))
            {
                $para= "\""."{$row['id']}".","."{$row['name']}".","."{$row['email']}".","."{$row['balance']}"."\"";
                $mail= "\""."{$row['email']}"."\"";
                echo "
                <tr class='text-center'>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td><button class='btn btn-dark text-light' data-toggle='modal' data-target='#myModal' onclick='view($para)'>View</button></td>
                    <td><button class='btn btn-dark text-light' onclick='nextPage($mail)'>Transfer</button></td>
                
                </tr>
                ";

            }
            
        ?>

    <form action="transfer.php" method="post" style="display: none;">
        <input type="text" name="art_id" id="art_txt"  style="display: none;">
        <input type="submit" name="submit" id="sub"  style="display: none;">
        </form>
    <script>
                        function nextPage(thisid)
                        {
                                                          
                               document.getElementById('art_txt').value=thisid;
                               document.getElementById('sub').click();
                            
                        }

                        </script>

        

        <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Customer</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <center><b>
            <p>ID: <span id="mid"></span></p>
            <p>Name: <span id="mname"></span></p>
            <p>Email: <span id="memail"></span></p>
            <p>Balance: <span id="mbalance"></span></p>
         </b></center>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
  </table>
    </div>

    <script>
            
            function view(para)
            {
                var str=para.split(",");
                document.getElementById("mid").innerHTML=str[0];
                document.getElementById("mname").innerHTML=str[1];
                document.getElementById("memail").innerHTML=str[2];
                document.getElementById("mbalance").innerHTML=str[3];
            }
        </script>


</body>
</html>