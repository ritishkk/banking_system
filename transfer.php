<html>
    <head>
        <title>Money Transfer</title>
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
            .form-control,input{
                margin:20px 0;
                border-radius:20px;
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

            .mx-auto{
                
                box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 1px, rgba(0, 0, 0, 0.07) 0px 2px 2px, rgba(0, 0, 0, 0.07) 0px 4px 4px, rgba(0, 0, 0, 0.07) 0px 8px 8px, rgba(0, 0, 0, 0.07) 0px 16px 16px;
            
            }
            .btn{
                background:#0d213b;
            }
            .btn:hover{
                background:#3c5575;
            }
            
        </style>
    </head>
    
    <body style="background:#e4ebe9">
        <div class="w-100 p-4 d-flex justify-content-between" style="background:black; font-style:italic; color:white">
        <h1 class="ml-4">People's Bank</h1>
        <h1 class="text-center">Money Transfer</h1>
        <div class="d-flex justify-content-end align-self-center">
            <a href="index.php">Home</a>
            <a href="users.php">Customers</a>
            <a href="history.php">History</a>
        </div>
    </div>
    <div class="container mt-5">
            <form action="transfer.php" method="post" autocomplete="off" class="w-50 p-3 mx-auto bg-light" style="border-radius:25px; border:1px solid #CCC">
                
                    <input type="text" class="form-control w-75 mx-auto" placeholder="Sender Id" id="sender" name="sender">
                    <input type="text" class="form-control w-75 mx-auto" placeholder="Recipient Id" id="receiver" name="receiver">
                    <input type="text" class="form-control w-75 mx-auto" placeholder="Enter Amount" id="amount" name="amount">
                    <center>
                        <input type="submit" class="form-control btn w-75 text-light" value="Transfer Money" name="submit">
                    </center>
                
            </form>
        </div>
        <?php
        require_once "config.php";

            if(isset($_POST["art_id"])!="")
            {
                $mail=$_POST["art_id"];
                echo " <script>document.getElementById('sender').value='$mail';
                document.getElementById('sender').readOnly = true;
                </script>";
            }

            else{

            if(isset($_POST["submit"]))
            {
                $sender=$_POST["sender"];
                $receiver=$_POST["receiver"];
                $amount=$_POST["amount"];
                $err = 0;
                $sender_err= $rec_err = $amount_err= $same_names = $amount_less = "";
                if($sender == $receiver)
                {
                    $err = 1;
                    $same_names = "same";
                }

                $sql="select email from users where email='$sender'";
                $res=mysqli_query($link,$sql);
                $row=mysqli_fetch_assoc($res);
                if(!$row)
                {
                    $err = 1;
                    $sender_err = "sender not exists";
                }

                $sql="select email from users where email='$receiver'";
                $res=mysqli_query($link,$sql);
                $row=mysqli_fetch_assoc($res);
                if(!$row)
                {
                    $err =1;
                    $rec_err = "receiver not exists";
                }

                $sql="select balance from users where email='$sender'";
                $res=mysqli_query($link,$sql);
                $row=mysqli_fetch_assoc($res);
                $sender_balance = 0;
                if($row)
                {
                    $sender_balance=$row['balance'];
                }
                if($amount<0 || $amount=='')
                {
                    $err = 1;
                    $amount_err = "please enter amount greater than 0";
                }
                else if($amount>$sender_balance)
                {
                    $err = 1;
                    $amount_err = "insufficient balance";
                }
                if($err == 0)
                {
                    $sql="select balance from users where email='$receiver'";
                    $res=mysqli_query($link,$sql);
                    $row=mysqli_fetch_assoc($res);
                    $rec_balance=$row['balance']+$amount;

                    
                    $sender_balance=$sender_balance-$amount;

                    $sql="update users set balance='$sender_balance' where email='$sender'";
                    $res=mysqli_query($link,$sql);
                    

                    $sql="update users set balance='$rec_balance' where email='$receiver'";
                    $res=mysqli_query($link,$sql);
                    

                    $sql  = "insert into transaction(sender,receiver,amount) values('$sender','$receiver','$amount')";
                    $res = mysqli_query($link,$sql);
                    
                    echo " <script>alert('Transcation Successful...');location.href='history.php';</script>";
                }
                else{
                    echo "<script>
                    let x = '';
                    if('$same_names' !='')
                    {
                        x += '$same_names';
                    }
                    if('$sender_err' !='')
                    {
                        if(x!='')
                            x += ' and $sender_err';
                        else
                            x += '$sender_err';
                    }
                    if('$rec_err' !='')
                    {
                        if(x!='')
                            x += ' and $rec_err';
                        else
                            x += '$rec_err';
                    }
                    if('$amount_err' !='')
                    {
                        if(x!='')
                            x += ' and $amount_err';
                        else
                            x += '$amount_err';
                    }
                    alert(x)</script>";
                }
            }
            }
        ?>


        
        
        
        

    </body>
</html>