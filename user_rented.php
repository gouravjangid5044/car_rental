<?php
session_start();
$con=mysqli_connect("localhost","root","","car-rental");
if(!isset($_SESSION['mail1']))
{
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rento Car</title>
    <!--
        For more customization options, we would advise
        you to build your TailwindCSS from the source.
        https://tailwindcss.com/docs/installation
    -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.2/tailwind.css">
    <!-- <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml"> -->

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<link href="https://unpkg.com/swiper/swiper-bundle.min.css" rel="stylesheet" />


  
  

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Open+Sans&display=swap"
    rel="stylesheet">
    <style>
        /* small css for the mobile nav close */
        #nav-mobile-btn.close span:first-child{
            transform: rotate(45deg);
            top: 4px;
            position: relative;
            background:#a0aec0;
        }
        #nav-mobile-btn.close span:nth-child(2){
            transform: rotate(-45deg);
            margin-top: 0px;
            background:#a0aec0;
        }
    </style>
</head>


<!-- class="overflow-x-hidden antialiased" -->
<body class="overflow-x-hidden antialiased">
<div class="relative z-20 w-full h-24 px-8 pt-2 bg-white">

<div class="container flex items-center justify-between h-full max-w-6xl mx-auto">
    <a href="#_" class="relative flex items-center inline-block h-5 h-full font-black">
        <!-- <svg  class="w-auto h-8 mt-1" viewBox="0 0 215 151" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><linearGradient x1="56.965%" y1="53.262%" x2="7.891%" y2="29.24%" id="b"><stop stop-color="#FFCD26" offset="0%"/><stop stop-color="#FFDF95" offset="100%"/></linearGradient><path d="M95.655.001c-24.386 0-43.538 13.864-52.36 34.66-5.144 12.126-3.711 24.522.084 29.027 2.435-5.804 11.57-15.424 29.476-15.424h79.952c29.783 0 54.375-30.377 61.963-48.263H95.655zM67.693 65.916C23.419 65.916.085 105.344 0 137.666v.345c.011 4.322.439 8.517 1.291 12.466 2.433-5.804 19.956-36.297 47.062-36.297h23.225c29.783 0 54.375-30.378 61.963-48.264H67.693z" id="a"/></defs><g fill="none" fill-rule="evenodd"><mask id="c" fill="#fff"><use xlink:href="#a"/></mask><path d="M95.655.001c-24.386 0-43.538 13.864-52.36 34.66-5.144 12.126-3.711 24.522.084 29.027 2.435-5.804 11.57-15.424 29.476-15.424h79.952c29.783 0 54.375-30.377 61.963-48.263H95.655zM67.693 65.916C23.419 65.916.085 105.344 0 137.666v.345c.011 4.322.439 8.517 1.291 12.466 2.433-5.804 19.956-36.297 47.062-36.297h23.225c29.783 0 54.375-30.378 61.963-48.264H67.693z" fill="url(#b)" mask="url(#c)"/></g></svg> -->
        <img src="https://img.icons8.com/clouds/100/null/sedan.png"/>
        <span class="ml-3 text-2xl font-black">Rento Car</span>
    </a>

    <div id="nav" class="absolute top-0 left-0 hidden block w-full mt-20 border-b border-gray-200 sm:border-none sm:px-5 sm:block sm:relative sm:mt-0 sm:px-0 sm:w-auto">
        <nav class="flex flex-col items-center py-3 bg-white border border-gray-100 sm:flex-row sm:bg-transparent sm:border-none sm:py-0">
            <a href="index.php" class="px-1 mb-1 mb-5 mr-0 text-base font-bold sm:mb-0 sm:mr-4 lg:mr-8">Home</a>
            <a href="allcar.php" class="relative px-1 mb-1 mb-5 mr-0 text-base font-bold sm:mb-0 sm:mr-4 lg:mr-8">All Car</a>
            <?php
                    if(isset($_SESSION['mail1']))
                    {
                      ?>
                    <a href="User_rented.php" class="relative px-1 mb-1 mb-5 mr-0 text-base font-bold sm:mb-0 sm:mr-4 lg:mr-8">Your Cars<span class="absolute bottom-0 left-0 w-full h-1 -mb-2 bg-yellow-300 rounded-full"></span></a>
                    <?php
                }
                ?>
            <!-- <a href="#_" class="px-1 mb-1 mb-5 mr-0 text-base font-bold sm:mb-0 sm:mr-4 lg:mr-8">Contact</a>
            <a href="#_" class="px-1 mb-1 mb-5 mr-0 text-base font-bold sm:mb-0 sm:mr-4 lg:mr-8">About</a> -->
            <?php
            if(isset($_SESSION['mail1']))
            {
              ?>
            <a href="logout.php" class="ml-1 relative mb-5 sm:mb-0">
              <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-black rounded"></span>
              <span class="relative inline-block w-full h-full px-3 py-1 text-base font-bold transition duration-100 bg-white border-2 border-black rounded fold-bold hover:bg-yellow-400 hover:text-gray-900">Log out</span>
          </a>
          <?php
        }
        else
        {
           ?>
           <a href="login.php" class="relative mb-5 sm:mb-0">
                <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-black rounded"></span>
                <span class="relative inline-block w-full h-full px-3 py-1 text-base font-bold transition duration-100 bg-white border-2 border-black rounded fold-bold hover:bg-yellow-400 hover:text-gray-900">SIGNUP</span>
            </a>
           <?php
        }
        ?>
        </nav>
    </div>

    <div id="nav-mobile-btn" class="absolute top-0 right-0 z-50 block w-6 mt-8 mr-10 cursor-pointer select-none sm:hidden sm:mt-10">
        <span class="block w-full h-1 mt-2 duration-200 transform bg-gray-800 rounded-full sm:mt-1"></span>
        <span class="block w-full h-1 mt-1 duration-200 transform bg-gray-800 rounded-full"></span>
    </div>
</div>
</div>




<section class="section featured-car" id="featured-car">
        <div class="container">

          <div class="title-wrapper">
            <h2 class="h2 section-title">Your Rented Cars</h2>

            <!-- <a href="allcar.php" class="featured-car-link">
              <span>View more</span>

              <ion-icon name="arrow-forward-outline"></ion-icon>
            </a> -->
          </div>

          <ul class="featured-car-list">


          <?php
          $mail_id=$_SESSION['mail1'];
          $query="SELECT * FROM `rented` WHERE mail='$mail_id'";
          $sql=mysqli_query($con,$query);
          
          $rows=mysqli_num_rows($sql);
          if($rows!=0)
          {
            while($rows!=0)
            {
              $row=mysqli_fetch_assoc($sql);
              
              $num=$row['car'];

              $query2="SELECT * FROM `details` WHERE id='$num'";
              $sql2=mysqli_query($con,$query2);
              $rows2=mysqli_num_rows($sql2);

              if($rows2!=0)
              {
                while($rows2!=0)
                {
                    $row2=mysqli_fetch_assoc($sql2);
              ?>
              <li>
              <div class="featured-car-card">

                <figure class="card-banner">
                  <img src="<?php $s=$row2['img']; $str1="./assets/images/"; echo $str1.$s; ?>" alt="Toyota RAV4 2021" loading="lazy" width="440" height="300"
                    class="w-100">
                </figure>

                <div class="card-content">

                  <div class="card-title-wrapper">
                    <h3 class="h3 card-title">
                      <a href="#"><?php echo $row2['car_name']?></a>
                    </h3>

                    <data class="year" value="2021">2021</data>
                  </div>

                  <ul class="card-list">

                    <li class="card-list-item">
                      <ion-icon name="people-outline"></ion-icon>
                      <img width="20px" src="https://img.icons8.com/color/48/null/conference-skin-type-7.png"/>

                      <span class="card-item-text"><?php echo $row2['capacity']?> People</span>
                    </li>

                    <li class="card-list-item">
                      <ion-icon name="flash-outline"></ion-icon>
                      <img width="20px" src="https://img.icons8.com/officel/16/null/lightning-bolt.png"/>

                      <span class="card-item-text"><?php echo $row2['engine']?></span>
                    </li>

                    <li class="card-list-item">
                      <ion-icon name="speedometer-outline"></ion-icon>
                      <img height="16px" width="20px" src="https://img.icons8.com/nolan/64/speed.png"/>

                      <span class="card-item-text"><?php echo $row2['mileage']?>km / 1-litre</span>
                    </li>

                    <li class="card-list-item">
                      <ion-icon name="hardware-chip-outline"></ion-icon>
                      <img width="20px" src="https://img.icons8.com/office/16/null/processor.png"/>

                      <span class="card-item-text"><?php echo $row2['function']?></span>
                    </li>

                  </ul>

                  <?php
                  if(isset($_SESSION['mail1']))
                  {
                    ?>
                  <div class="card-price-wrapper">

                    <p class="card-price">
                      <strong>₹<?php echo $row['price']?></strong> / Day
                    </p>

                    <button name="sub" class="btn">Rented</button>

                  </div>
                  

                  <?php
                  }
                  else
                  {
                    ?>
                    <div class="card-price-wrapper">

                    <p class="card-price">
                      <strong>₹<?php echo $row2['charges']?></strong> / Day
                    </p>
                    
                     <a href="login.php">
                    <button name="sub" class="btn">Rent now</button></a>

                  </div>
                  <?php
                  }
                  ?>
                </div>

              </div>
            </li>

              <?php
              $rows2--;
                }
            }
              $rows--;
            }
          }
          ?>
          </ul>

        </div>
      </section>
</body>
</html>