<?php
session_start();
$con=mysqli_connect("localhost","root","","car-rental");
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

<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
  $days=mysqli_real_escape_string($con,$_POST['days']);
  $date=mysqli_real_escape_string($con,$_POST['date']);
  $id=mysqli_real_escape_string($con,$_GET['id']);
  $price=mysqli_real_escape_string($con,$_GET['charge']);

  // echo $days."  ".$date."  ".$id;
  
  $mail=$_SESSION['mail1'];

  $query3="INSERT INTO `rented` (`id`,`mail`,`car`,`days`,`date`,`price`) VALUES (NULL,'$mail','$id','$days','$date','$price')";
  $sql3=mysqli_query($con,$query3);
  
  $query4="UPDATE `details` SET status='Rented' WHERE id='$id'";
  $sql4=mysqli_query($con,$query4);

  $payid="Payment-".uniqid();

  $paymentMethods = array('Gpay', 'Paytm', 'PayPal', 'PhonePe', 'Netbanking');
  $randomIndex = array_rand($paymentMethods);
  $selectedMethod = $paymentMethods[$randomIndex];

  $query6=mysqli_query($con,"INSERT INTO `payment` (`id2`,`car_no`,`payment_id`,`payment_mode`,`payment_status`) VALUES (NULL,'$id','$payid','$selectedMethod','Success')");


  if($sql4&&$sql3&&$query6)
  {
    echo "<script>alert('Car Rented 👍'); window.location.href='allcar.php';</script>";
  }
  else
  {
    echo "<script>alert('Facing Technical Issue ❌'); window.location.href='allcar.php';</script>";
  }
}
?>
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
                    <a href="allcar.php" class="relative px-1 mb-1 mb-5 mr-0 text-base font-bold sm:mb-0 sm:mr-4 lg:mr-8">All Car<span class="absolute bottom-0 left-0 w-full h-1 -mb-2 bg-yellow-300 rounded-full"></span></a>
                    <?php
                    if(isset($_SESSION['mail1']))
                    {
                      ?>
                    <a href="User_rented.php" class="relative px-1 mb-1 mb-5 mr-0 text-base font-bold sm:mb-0 sm:mr-4 lg:mr-8">Your Cars</a>
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


    <div class="container mx-auto sm:px-4">
        <div class="flex flex-wrap justify-center">
            <div class="md:w-full pr-4 pl-4">
                <div style= "border-style:dashed; border-radius:5px; border-color:#ca8a04; border-width:3px" class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300 mt-5">
                    <div class="py-3 px-6 font-semibold mb-0 bg-gray-200 border-b-1 border-gray-300 text-gray-900">
                        <h4>Filter Details</h4>
                    </div>
                    <div class="flex-auto p-6">
                        <form action="allcar.php" method="GET">
                            <div class="flex flex-wrap ">
                                <div class="md:w-1/3 pr-4 pl-4">
                                    <div class="mb-4 font-semibold">
                                        <label>Price</label>
                                        <input type="number" placeholder="Max Price" name="price" value="<?php if(isset($_GET['price'])){ echo $_GET['price']; } ?>" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" required>
                                        <!-- <select class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" name="price" id="">
                                            <option value="" disabled selected>Max Price</option>
                                            <option value="100">100</option>
                                            <option value="500">500</option>
                                            <option value="1000">1000</option>
                                            <option value="1500">1500</option>
                                            <option value="2000">2000</option>
                                            <option value="No limit">No Limit</option>
                                        </select> -->
                                    </div>
                                </div>
                                <div class="md:w-1/3 pr-4 pl-4">
                                    <div class="mb-4 font-semibold">
                                        <label>Capacity</label>
                                        <input type="number" name="capacity" placeholder="Max Capacity" value="<?php if(isset($_GET['capacity'])){ echo $_GET['capacity']; } ?>" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" required>
                                        <!-- <select class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" name="capacity" id="">
                                            <option value="" disabled selected>Max Capacity</option>
                                            <option value="2">2</option>
                                            <option value="4">4</option>
                                            <option value="6">6</option>
                                            <option value="8">8</option>
                                            <option value="10">10</option>
                                            <option value="12">12</option>
                                        </select> -->
                                    </div>
                                </div>
                                <div class="md:w-1/3 pr-4 pl-4">
                                    <div class="mb-4">
                                        <!-- <label>Click to Filter</label> <br> -->
                                      <button type="submit" class=" mt-6 font-semibold bg-yellow-600 inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline text-white hover:bg-blue-600">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
               </div>
            </div>
        </div>
    </div> 



    <!-- BEGIN HERO SECTION -->
    
<?php
if(!isset($_GET['price']))
{
  ?>
    <section class="section featured-car" id="featured-car">
        <div class="container">

          <div class="title-wrapper">
            <h2 class="h2 section-title">Cars List</h2>

            <a href="allcar.php" class="featured-car-link">
              <span>View more</span>

              <ion-icon name="arrow-forward-outline"></ion-icon>
            </a>
          </div>

          <ul class="featured-car-list">


          <?php
          $query="SELECT * FROM `details`";
          $sql=mysqli_query($con,$query);
          
          $rows=mysqli_num_rows($sql);
          if($rows!=0)
          {
            while($rows!=0)
            {
              $row=mysqli_fetch_assoc($sql);
              if($row['status']=="Not-Rented")
              {
              ?>
              <li>
              <div class="featured-car-card">

                <figure class="card-banner">
                  <img src="<?php $s=$row['img']; $str1="./assets/images/"; echo $str1.$s; ?>" alt="Toyota RAV4 2021" loading="lazy" width="440" height="300"
                    class="w-100">
                </figure>

                <div class="card-content">

                  <div class="card-title-wrapper">
                    <h3 class="h3 card-title">
                      <a href="#"><?php echo $row['car_name']?></a>
                    </h3>

                    <data class="year" value="2021"><?php echo $row['mod_year']?></data>
                  </div>

                  <ul class="card-list">

                    <li class="card-list-item">
                      <ion-icon name="people-outline"></ion-icon>
                      <img width="20px" src="https://img.icons8.com/color/48/null/conference-skin-type-7.png"/>

                      <span class="card-item-text"><?php echo $row['capacity']?> People</span>
                    </li>

                    <li class="card-list-item">
                      <ion-icon name="flash-outline"></ion-icon>
                      <img width="20px" src="https://img.icons8.com/officel/16/null/lightning-bolt.png"/>

                      <span class="card-item-text"><?php echo $row['engine']?></span>
                    </li>

                    <li class="card-list-item">
                      <ion-icon name="speedometer-outline"></ion-icon>
                      <img height="16px" width="20px" src="https://img.icons8.com/nolan/64/speed.png"/>

                      <span class="card-item-text"><?php echo $row['mileage']?>km / 1-litre</span>
                    </li>

                    <li class="card-list-item">
                      <ion-icon name="hardware-chip-outline"></ion-icon>
                      <img width="20px" src="https://img.icons8.com/office/16/null/processor.png"/>

                      <span class="card-item-text"><?php echo $row['function']?></span>
                    </li>
                    
                    <?php
                    if(isset($_SESSION['mail1']))
                    {
                      ?>
                    <form action="allcar.php?id=<?php echo $row['id']?>&charge=<?php echo $row['charges']?>" method="POST">
                    <!-- <li class="card-list-item">
                      <ion-icon name="hardware-chip-outline"></ion-icon>
                      <img width="20px" src="https://img.icons8.com/cotton/64/null/baby-calendar.png"/>
                      
                      <select name="days" id="" required>
                        <option value="" disabled selected>Days &nbsp;&nbsp;&nbsp;</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                      </select>
                    </li> -->
                    <li class="card-list-item">
                      <ion-icon name="hardware-chip-outline"></ion-icon>
                      <img width="20px" src="https://img.icons8.com/cotton/64/null/baby-calendar.png"/>
                  
                      <select name="days" id="" required style="display: inline-block; width: 120px; height: 40px; border-radius:5px">
                        <option value="" disabled selected>Days &nbsp;&nbsp;&nbsp;</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                      </select>
                    </li>
                    <?php
                  }
                    ?>

                  <?php
                    if(isset($_SESSION['mail1']))
                    {
                      ?>
                    <!-- <li class="card-list-item">
                      <ion-icon name="hardware-chip-outline"></ion-icon>
                      <img width="30px" src="https://img.icons8.com/bubbles/50/null/calendar--v2.png"/>
                      
                      <input name="date" style="width:120px" type="date" required>
                    </li> -->
                    <li class="card-list-item">
                      <ion-icon name="hardware-chip-outline"></ion-icon>
                      <img width="30px" src="https://img.icons8.com/bubbles/50/null/calendar--v2.png"/>
                      <input name="date" style="display: inline-block; width: 120px; height: 40px; margin-top:2px" type="date" required>
                    </li>
                    <?php
                  }
                    ?>

                  </ul>

                  <?php
                  if(isset($_SESSION['mail1']))
                  {
                    ?>
                  <div class="card-price-wrapper">

                    <p class="card-price">
                      <strong>₹<?php echo $row['charges']?></strong> / Day
                    </p>

                    <button type="submit" name="sub" class="btn">Rent now</button>

                  </div>
                  
                  </form>

                  <?php
                  }
                  else
                  {
                    ?>
                    <div class="card-price-wrapper">

                    <p class="card-price">
                      <strong>₹<?php echo $row['charges']?></strong> / Day
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
            }
              $rows--;
            }
          }
          ?>
          </ul>

        </div>
      </section>
      <?php
}?>

<?php
if(!empty(isset($_GET['price'])))
{
  if (isset($_GET['price']) && isset($_GET['capacity'])) {
    $charge=mysqli_real_escape_string($con,$_GET['price']);
    $capacity=mysqli_real_escape_string($con,$_GET['capacity']);
    $query="SELECT * FROM `details` WHERE charges<='$charge' and capacity<='$capacity'";
    $sql=mysqli_query($con,$query);
    
    $rows=mysqli_num_rows($sql);

    if($rows!=0)
    {
      ?>
      <section class="section featured-car" id="featured-car">
        <div class="container">

          <div class="title-wrapper">
            <h2 class="h2 section-title">Cars List</h2>

            <a href="allcar.php" class="featured-car-link">
              <span>View more</span>

              <ion-icon name="arrow-forward-outline"></ion-icon>
            </a>
          </div>

          <ul class="featured-car-list">
      <?php
      while($rows!=0)
      {
        $row=mysqli_fetch_assoc($sql);

        ?>
         <li>
              <div class="featured-car-card">

                <figure class="card-banner">
                  <img src="<?php $s=$row['img']; $str1="./assets/images/"; echo $str1.$s; ?>" alt="Toyota RAV4 2021" loading="lazy" width="440" height="300"
                    class="w-100">
                </figure>

                <div class="card-content">

                  <div class="card-title-wrapper">
                    <h3 class="h3 card-title">
                      <a href="#"><?php echo $row['car_name']?></a>
                    </h3>

                    <data class="year" value="2021">2021</data>
                  </div>

                  <ul class="card-list">

                    <li class="card-list-item">
                      <ion-icon name="people-outline"></ion-icon>
                      <img width="20px" src="https://img.icons8.com/color/48/null/conference-skin-type-7.png"/>

                      <span class="card-item-text"><?php echo $row['capacity']?> People</span>
                    </li>

                    <li class="card-list-item">
                      <ion-icon name="flash-outline"></ion-icon>
                      <img width="20px" src="https://img.icons8.com/officel/16/null/lightning-bolt.png"/>

                      <span class="card-item-text"><?php echo $row['engine']?></span>
                    </li>

                    <li class="card-list-item">
                      <ion-icon name="speedometer-outline"></ion-icon>
                      <img height="16px" width="20px" src="https://img.icons8.com/nolan/64/speed.png"/>

                      <span class="card-item-text"><?php echo $row['mileage']?>km / 1-litre</span>
                    </li>

                    <li class="card-list-item">
                      <ion-icon name="hardware-chip-outline"></ion-icon>
                      <img width="20px" src="https://img.icons8.com/office/16/null/processor.png"/>

                      <span class="card-item-text"><?php echo $row['function']?></span>
                    </li>
                    
                    <?php
                    if(isset($_SESSION['mail1']))
                    {
                      ?>
                    <form action="allcar.php?id=<?php echo $row['id']?>&charge=<?php echo $row['charges']?>" method="POST">
                    <!-- <li class="card-list-item">
                      <ion-icon name="hardware-chip-outline"></ion-icon>
                      <img width="20px" src="https://img.icons8.com/cotton/64/null/baby-calendar.png"/>
                      
                      <select name="days" id="" required>
                        <option value="" disabled selected>Days &nbsp;&nbsp;&nbsp;</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                      </select>
                    </li> -->
                    <li class="card-list-item">
                      <ion-icon name="hardware-chip-outline"></ion-icon>
                      <img width="20px" src="https://img.icons8.com/cotton/64/null/baby-calendar.png"/>
                  
                      <select name="days" id="" required style="display: inline-block; width: 120px; height: 40px; border-radius:5px">
                        <option value="" disabled selected>Days &nbsp;&nbsp;&nbsp;</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                      </select>
                    </li>
                    <?php
                  }
                    ?>

                  <?php
                    if(isset($_SESSION['mail1']))
                    {
                      ?>
                    <!-- <li class="card-list-item">
                      <ion-icon name="hardware-chip-outline"></ion-icon>
                      <img width="30px" src="https://img.icons8.com/bubbles/50/null/calendar--v2.png"/>
                      
                      <input name="date" style="width:120px" type="date" required>
                    </li> -->
                    <li class="card-list-item">
                      <ion-icon name="hardware-chip-outline"></ion-icon>
                      <img width="30px" src="https://img.icons8.com/bubbles/50/null/calendar--v2.png"/>
                      <input name="date" style="display: inline-block; width: 120px; height: 40px; margin-top:2px" type="date" required>
                    </li>
                    <?php
                  }
                    ?>

                  </ul>

                  <?php
                  if(isset($_SESSION['mail1']))
                  {
                    ?>
                  <div class="card-price-wrapper">

                    <p class="card-price">
                      <strong>₹<?php echo $row['charges']?></strong> / Day
                    </p>

                    <button type="submit" name="sub" class="btn">Rent now</button>

                  </div>
                  </form>

                  <?php
                  }
                  else
                  {
                    ?>
                    <div class="card-price-wrapper">

                    <p class="card-price">
                      <strong>₹<?php echo $row['charges']?></strong> / Day
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
        $rows--;
      }
      ?>
 </ul>

</div>
</section>
      <?php
    }
    else
    {
      echo"<script>alert('No Cars Found❗'); window.location.href='allcar.php'</script>";
    }
  }
}
?>

    <footer class="px-4 pt-12 pb-8 text-white bg-black">
        <div class="container flex flex-col justify-between max-w-6xl px-4 mx-auto overflow-hidden lg:flex-row">

                <a href="#_" class="block w-1/3 mr-4">
                    <span class="flex items-center">
                        <!-- <svg  class="w-auto h-8 mt-1 text-white fill-current" viewBox="0 0 215 151" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><linearGradient x1="56.965%" y1="53.262%" x2="7.891%" y2="29.24%" id="b"><stop stop-color="#FFCD26" offset="0%"/><stop stop-color="#FFDF95" offset="100%"/></linearGradient><path d="M95.655.001c-24.386 0-43.538 13.864-52.36 34.66-5.144 12.126-3.711 24.522.084 29.027 2.435-5.804 11.57-15.424 29.476-15.424h79.952c29.783 0 54.375-30.377 61.963-48.263H95.655zM67.693 65.916C23.419 65.916.085 105.344 0 137.666v.345c.011 4.322.439 8.517 1.291 12.466 2.433-5.804 19.956-36.297 47.062-36.297h23.225c29.783 0 54.375-30.378 61.963-48.264H67.693z" id="a"/></defs><g fill="none" fill-rule="evenodd"><mask id="c" fill="#fff"><use xlink:href="#a"/></mask><path d="M95.655.001c-24.386 0-43.538 13.864-52.36 34.66-5.144 12.126-3.711 24.522.084 29.027 2.435-5.804 11.57-15.424 29.476-15.424h79.952c29.783 0 54.375-30.377 61.963-48.263H95.655zM67.693 65.916C23.419 65.916.085 105.344 0 137.666v.345c.011 4.322.439 8.517 1.291 12.466 2.433-5.804 19.956-36.297 47.062-36.297h23.225c29.783 0 54.375-30.378 61.963-48.264H67.693z" fill="url(#b)" mask="url(#c)"/></g></svg> -->
                        <img src="https://img.icons8.com/clouds/100/null/sedan.png"/>
                        <span class="ml-2 text-lg font-black">Rento Car</span>
                    </span>
                </a>
            <div class="block w-2/3 mt-6 text-sm sm:flex lg:mt-0">
                <ul class="flex flex-col w-full p-0 font-thin text-left text-gray-700 list-none">
                    <li class="inline-block px-3 py-2 font-medium tracking-wide text-white uppercase">Product</li>
                    <li><a href="#_" class="inline-block px-3 py-2 text-gray-300 no-underline hover:text-white">Features</a></li>
                    <li><a href="#_" class="inline-block px-3 py-2 text-gray-300 no-underline hover:text-white">Integrations</a></li>
                    <li><a href="#_" class="inline-block px-3 py-2 text-gray-300 no-underline hover:text-white">Pricing</a></li>
                    <li><a href="#_" class="inline-block px-3 py-2 text-gray-300 no-underline hover:text-white">FAQ</a></li>
                </ul>
                <ul class="flex flex-col w-full p-0 font-thin text-left text-gray-700 list-none">
                    <li class="inline-block px-3 py-2 font-medium tracking-wide text-white uppercase">Company</li>
                    <li><a href="#_" class="inline-block px-3 py-2 text-gray-300 no-underline hover:text-white">Privacy</a></li>
                    <li><a href="#_" class="inline-block px-3 py-2 text-gray-300 no-underline hover:text-white">Terms of Service</a></li>
                </ul>
                <ul class="flex flex-col w-full p-0 font-thin text-left text-gray-700 list-none">
                    <li class="inline-block px-3 py-2 font-medium tracking-wide text-white uppercase">TailwindCSS</li>
                    <li><a href="https://devdojo.com/tailwindcss/templates" target="_blank" rel="noopener noreferrer" class="inline-block px-3 py-2 text-gray-300 no-underline hover:text-white">Templates</a></li>
                    <li><a href="https://devdojo.com/tailwindcss/components" target="_blank" rel="noopener noreferrer" class="inline-block px-3 py-2 text-gray-300 no-underline hover:text-white">Components</a></li>
                    <li><a href="https://devdojo.com/tails" target="_blank" rel="noopener noreferrer" class="inline-block px-3 py-2 text-gray-300 no-underline hover:text-white">Tails</a></li>
                    </li>
                </ul>
                <div class="flex flex-col w-full text-gray-700">
                    <div class="inline-block px-3 py-2 font-medium tracking-wide text-white uppercase">Follow Us</div>
                    <div class="flex justify-start pl-4 mt-2">
                        <a class="flex items-center block mr-6 text-gray-300 no-underline hover:text-white" target="_blank" rel="noopener noreferrer" href="https://devdojo.com">
                            <svg viewBox="0 0 24 24" class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg">
                                <path d="M23.998 12c0-6.628-5.372-12-11.999-12C5.372 0 0 5.372 0 12c0 5.988 4.388 10.952 10.124 11.852v-8.384H7.078v-3.469h3.046V9.356c0-3.008 1.792-4.669 4.532-4.669 1.313 0 2.686.234 2.686.234v2.953H15.83c-1.49 0-1.955.925-1.955 1.874V12h3.328l-.532 3.469h-2.796v8.384c5.736-.9 10.124-5.864 10.124-11.853z" /></svg>
                        </a>
                        <a class="flex items-center block mr-6 text-gray-300 no-underline hover:text-white" target="_blank" rel="noopener noreferrer" href="https://devdojo.com">
                            <svg viewBox="0 0 24 24" class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg">
                                <path d="M23.954 4.569a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.691 8.094 4.066 6.13 1.64 3.161a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.061a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.937 4.937 0 004.604 3.417 9.868 9.868 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.054 0 13.999-7.496 13.999-13.986 0-.209 0-.42-.015-.63a9.936 9.936 0 002.46-2.548l-.047-.02z" /></svg>
                        </a>
                        <a class="flex items-center block text-gray-300 no-underline hover:text-white" target="_blank" rel="noopener noreferrer" href="https://devdojo.com">
                            <svg viewBox="0 0 24 24" class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12" /></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="pt-4 pt-6 mt-10 text-center text-gray-600 border-t border-gray-800"> ©2023 Rento Car. All rights reserved.</div>
    </footer>

    <!-- a little JS for the mobile nav button -->
    <script>
        if( document.getElementById('nav-mobile-btn') ){
            document.getElementById('nav-mobile-btn').addEventListener('click', function(){
                if( this.classList.contains('close') ){
                    document.getElementById('nav').classList.add('hidden');
                    this.classList.remove('close');
                } else {
                    document.getElementById('nav').classList.remove('hidden');
                    this.classList.add('close');
                }
            });
        }
    </script>

</body>
</html>