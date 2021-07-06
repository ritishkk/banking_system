<html>
<head>
<title>Transaction History</title>
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
        <h1 class="text-center">Transaction History</h1>
        <div class="d-flex justify-content-end align-self-center">
            <a href="index.php">Home</a>
            <a href="users.php">Customers</a>
            <a href="transfer.php">Transfer</a>
        </div>
    </div>

    <div class="container mt-4" >
            <table class="table border border-dark">
    <thead class="thead-dark">
      
      <tr class='text-center'>
      <th>Trancation Id</th>
        <th>Sender</th>
        <th>Receiver</th>
        <th>Amount</th>
        <th>Time Date</th>
        
        
        </tr>
      
    </thead>
    <tbody>
    <?php
            require_once "config.php";
            $sql = "select * from transaction order by datetime desc";
            $res  = mysqli_query($link, $sql);
            while($row = mysqli_fetch_assoc($res))
            {
                echo "<tr class='text-center'>
                <td>{$row['sno']}</td>
                <td>{$row['sender']}</td>
                <td>{$row['receiver']}</td>
                <td>{$row['amount']}</td>
                <td>{$row['datetime']}</td>
                </tr>";
            }            
        ?>
  </table>
    </div>
</body>
</html>