<?php
// session_start();
date_default_timezone_set('Asia/Kolkata');
$val = 0;
$conn=mysqli_connect("localhost","root","","sitedatabase")
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="keywords"
    content="dsa, data,structures,algorithms,computers,programming,coders,coding,tutorials,html,css,java,javascript,manipal,codechef,codeforces,codeforces,competitive,cp,kotlin,android,development">
  <meta name="author" content="Team MUJ Central">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta property="og:url" content="https://mujcentral.live/">
  <meta name="image" property="og:image" content="https://i.ibb.co/26ZMgvT/pk.png">
  <meta property="og:image:type" content="image/png">
  <meta property="og:image:width" content="1920">
  <meta property="og:image:height" content="1080">
  <meta property="og:locale" content="en_US">
  <meta property="og:type" content="website">
  <meta property="og:title" content="MUJ Central| 🚗 Carpool">
  <meta property="og:description" name="description" content="Finding partner for carpooling has never been so easy!">
  <meta name="twitter:card" content="summary_large_image" />
  <link rel="shortcut icon" href="Media/favicon.png" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>OTP</title>
  <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
  <!-- Alpine -->
	<script type="module" src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
	<script nomodule src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine-ie11.min.js" defer></script>
	<!-- Motion CSS -->
	<link rel="stylesheet" href="css/mujcent2.css" />
	<!-- Custom style -->
	<link rel="stylesheet" href="css/mujcent.css" />
	<!-- Poppins font -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 
</head>

<body>
    <!-- component -->


<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


$mail = new PHPMailer(true);
if (isset($_POST['mail_sub'])||isset($_POST['resend'])) {

  if(isset($_POST['mail_sub']))
  {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $email = $email . "@muj.manipal.edu";
  }
  
  try {
 
                  
    $mail->isSMTP();                                           
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'noreply.mujcentral@gmail.com';                    
    $mail->Password   = 'lzsbnuudecgthjfv';                             
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $mail->Port       = 465;                                    

  
    $mail->setFrom('noreply.mujcentral@gmail.com', 'Gourav');

    $mail->addAddress($email);             


    $mail->isHTML(true);                                 
    $mail->Subject = 'Here is the subject'.time();
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $msg = rand(100000, 999999);
    $mail->Body = $msg;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $check=$mail->send();
    
    if($check)
    {
      $val = 1;
      $timer = 1;
      $time = date('Y-m-d H:i:s');
      $time = date('Y-m-d H:i:s',strtotime('+183 second'));
      $query = "INSERT INTO `OTP` (`id`,`otp`,`value`,`time`) values (NULL,'$msg','NO','$time')";
      $sql = mysqli_query($conn, $query);
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}

if(isset($_POST['verify_otp']))
{
  $otp = mysqli_real_escape_string($conn, $_POST['num']);
  $curr_time = date('Y-m-d H:i:s');
  $query = "SELECT * FROM `otp` WHERE otp='$otp' and value='NO' and time>'$curr_time'";
  $sql = mysqli_query($conn,$query);
  $rows = mysqli_num_rows($sql);
  if($rows>0)
  {
      $sql = mysqli_query($conn, "DELETE FROM `otp` WHERE otp='$otp' and value='NO'");
      $sql3 = mysqli_query($conn, "DELETE FROM `otp`  WHERE time<'$curr_time'");
      setcookie('verified', 'true', time() + (60*2), "/");
      header('location:check.php');
      ?>
      <script>
      // location.replace("check.php");
      </script>
      <?php
  }
  else
  {
    $val = 1;
  }
}
?>

    <?php
    if($val==0)
    {
      ?>
<div class="relative flex min-h-screen flex-col justify-center overflow-hidden bg-gray-50 py-12">
  <div class="relative bg-white px-6 pt-10 pb-9 shadow-xl mx-auto w-full max-w-lg rounded-2xl">
    <div class="mx-auto flex w-full max-w-md flex-col space-y-16">
      <div class="flex flex-col items-center justify-center text-center space-y-2">
        <div class="font-semibold text-3xl">
          <p>Sending Mail</p>
        </div>
        <div class="flex flex-row text-sm font-medium text-gray-400">
          <p>Enter mail id only your_name.reg_number</p>
        </div>
      </div>

      <div>
        <form action="otp.php" method="post">
          <div class="flex flex-col space-y-16">
            <div class="flex flex-row items-center justify-between mx-auto w-full max-w-xs">
              <div class="">
                <input class="w-full h-full flex flex-col items-center justify-center text-center px-5 outline-none rounded-xl border border-gray-200 text-lg bg-white focus:bg-gray-50 focus:ring-1 ring-blue-700" type="text" name="email" id="" required>
              </div>
            </div>

            <div class="flex flex-col space-y-5">
              <div>
                <button class="flex flex-row items-center justify-center text-center w-full border rounded-xl outline-none py-5 bg-blue-700 border-none text-white text-sm shadow-sm" name="mail_sub" type="submit">
                  Send Mail
                </button>
              </div>

              <div class="flex flex-row items-center justify-center text-center text-sm font-medium space-x-1 text-gray-500">
                <p>Didn't recieve code?</p> <a class="flex flex-row items-center text-blue-600" href="http://" target="_blank" rel="noopener noreferrer">Resend</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
    }
?>




<?php
    if($val==1)
    {
       ?>    
<div class="relative flex min-h-screen flex-col justify-center overflow-hidden bg-gray-50 py-12">
  <div class="relative bg-white px-6 pt-10 pb-9 shadow-xl mx-auto w-full max-w-lg rounded-2xl">
    <div class="mx-auto flex w-full max-w-md flex-col space-y-16">
      <div class="flex flex-col items-center justify-center text-center space-y-2">
        <div class="font-semibold text-3xl">
          <p>Email Verification</p>
        </div>
        <div class="flex flex-row text-sm font-medium text-gray-400">
          <p> <?php if (isset($email)) {
            echo "We have sent a code to your ".$email;}
            else
            {
            echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Wrong OTP!</strong>
            <span class="block sm:inline">Try Again &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
              <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
            </span>
          </div>';
            }
            ?></p>
        </div>
      </div>
      <div>
        <form action="otp.php" method="post">
          <div class="flex flex-col space-y-16">
            <div class="flex flex-row items-center justify-between mx-auto w-full max-w-xs">
            <script>
                var count = <?php echo 180; ?>;
                var counter = setInterval(timer, 1000);
            
                function timer() {
                    count = count - 1;
                    if (count <= 0) {
                        clearInterval(counter);
                        window.location.replace("otp.php");
                        return;
                    }
                    var minutes = Math.floor(count / 60);
                    var seconds = count % 60;
            
                    document.getElementById("timer").innerHTML = minutes + " minutes " + seconds + " seconds ";
                }
            </script>
              <div id="timer"></div>
              <div class="">
                <input class="w-full h-full flex flex-col items-center justify-center text-center px-5 outline-none rounded-xl border border-gray-200 text-lg bg-white focus:bg-gray-50 focus:ring-1 ring-blue-700" type="tel" name="num" maxlength="6" minlength="6" required>
              </div>
            </div>

            <div class="flex flex-col space-y-5">
              <div>
                <button class="flex flex-row items-center justify-center text-center w-full border rounded-xl outline-none py-5 bg-blue-700 border-none text-white text-sm shadow-sm" type="submit" name="verify_otp">  
                  Verify OTP
                </button>
              </div>

              <div class="flex flex-row items-center justify-center text-center text-sm font-medium space-x-1 text-gray-500">
                <p>Didn't recieve code?</p> <a class="flex flex-row items-center text-blue-600" button="resend" name="resend" rel="noopener noreferrer">Resend</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
}
?>
</body>
</html>