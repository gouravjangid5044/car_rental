<?php
if(isset($_GET['token']))
{
    date_default_timezone_set('Asia/Kolkata');
    $curr_time = date('Y-m-d H:i:s');
    $con=mysqli_connect("localhost","root","","car-rental");
    $val=mysqli_real_escape_string($con,$_GET['token']);
    
    $query="UPDATE `users` SET status='verified' WHERE token='$val' and time>'$curr_time'";
    $sql=mysqli_query($con,$query);

    if($sql)
    {
        $query="UPDATE `users` SET token='' WHERE token='$val'";
        $sql1=mysqli_query($con,$query);
        if($sql1&&$sql)
        {
            echo "<script>alert('Account Verified 👍');</script>";
        }
    }
    else
    {
        echo "<script>alert('Link Expired❗');</script>";
    }
}
?> 