<?php
require_once 'dbconnection.inc.php';
session_start();
if (!isset($_SESSION['specname'])) {
    header("Location: index.html");
}else{
  $filter = $_SESSION['specname'];
  $filter2 = $_SESSION['fil'];
  $query=mysqli_query($conn,"SELECT * FROM `users` WHERE `User_ID`='$filter'")or die(mysqli_error());
  $row=mysqli_fetch_array($query);
  $query1=mysqli_query($conn,"SELECT COUNT(*) AS `Un` FROM `chat` WHERE `reciever_userid`='$filter' AND `status` = '1'")or die(mysqli_error());
  $row1=mysqli_fetch_array($query1);
}
?>

<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Mind Care - Specialist Homepage</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>
        <style type="text/css">
        
          table{
    align-items: center;
  }

   th, tr, td{
    padding: 10px 10px;
  }
    </style>

            <script type="text/javascript">
function printData()
{
   var divToPrint=document.getElementById("printTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('button').on('click',function(){
printData();
})  
</script>
<body>

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="#">
            <span>Mind Care</span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index1.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
              <a href="index_chat.php" class="nav-link">Chat (<?php echo $row1['Un'] ?>)</a>
              </li>
                            <li class="nav-item">
                <a class="nav-link" href="my_profile.php"> My Profile</a>
              </li>   
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#contact">Contact Us</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h1>
                    Mind Care, <br>
                    The Mental Health App
                    </h1>
                    <p>
                      Welcome <?php echo $row['User_Type']; ?>, <?php echo $row['Fullname']; ?>!</p>
                    <div class="btn-box">
                      <a href="my_profile.php" class="btn-1">
                        My Profile
                      </a>
                      <a href="#contact" class="btn-2">
                        Contact Us
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class=" col-lg-10 mx-auto">
                      <div class="img-box">
                        <img src="images/s.jpeg" alt="">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h1>
                    Mind Care, <br>
                    The Mental Health App
                    </h1>
                    <p>
                      Welcome <?php echo $row['User_Type']; ?>, <?php echo $row['Fullname']; ?>!</p>
                    <div class="btn-box">
                      <a href="index_chat.php" class="btn-1">
                      View Chat
                      </a>
                      <a href="#contact" class="btn-2">
                        Contact Us
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class=" col-lg-10 mx-auto">
                      <div class="img-box">
                        <img src="images/s.jpeg" alt="">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h1>
                    Mind Care, <br>
                    The Mental Health App
                    </h1>
                    <p>
                     Welcome <?php echo $row['User_Type']; ?>, <?php echo $row['Fullname']; ?>!</p>
                    <div class="btn-box">
                      <a href="logout.php" class="btn-1">
                      Logout
                      </a>
                      <a href="#contact" class="btn-2">
                        Contact Us
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class=" col-lg-10 mx-auto">
                      <div class="img-box">
                        <img src="images/s.jpeg" alt="">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel_btn-box">
          <a class="carousel-control-prev" href="#customCarousel1" role="button" data-slide="prev">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#customCarousel1" role="button" data-slide="next">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </section>
    <!-- end slider section -->
  </div>

<!-- contact section -->
  <section class="contact_section layout_padding-bottom" id="start">
    <br>
<br>
<br>
<br>
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          My Feedback on Session <?php echo $filter2; ?>
        </h2>
      </div>
      <div class="row">
        <div class="col-md-12 col-lg-12 mx-auto">
          <div class="form_container">
                                     <table id="printTable">
<tr style="text-align: left;
  padding: 8px;">
<th style="text-align: left;
  padding: 8px;">Feedback ID</th>
<th style="text-align: left;
  padding: 8px;">Details</th>
  <th style="text-align: left;
  padding: 8px;">Sender</th>
   <th style="text-align: left; padding: 8px;"></th>
</tr>

<?php
$conn = mysqli_connect("localhost", "root", "", "mental_health_app");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT `feedback`.`Feedback_ID`, `feedback`.`Details`, `users`.`Fullname`, `feedback`.`Created_At`,`feedback`.`User_ID` FROM `feedback` JOIN `users` ON `users`.`User_ID` = `feedback`.`User_ID` WHERE `feedback`.`User_ID` = '$filter' OR `feedback`.`Appointment_ID` = '$filter2'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
?>
<tr>
<td><?php echo($row["Feedback_ID"]); ?></td>
<td title="<?php echo($row["Created_At"]); ?>"><?php echo($row["Details"]); ?></td>
<td><?php echo($row["Fullname"]); ?></td>  
<?php 
if ($filter == $row['User_ID']) {
?>
<td><button class="btn btn-primary py-3 px-5" onclick="return confirm('Are you sure that you want to delete this feedback?')?window.location.href='insertion.inc.php?action=deleteF&id=<?php echo($row["Feedback_ID"]); ?>':true;" title='Delete Feedback'>Delete</button></td>
<?php
}else{

}
?>
</tr>
<?php
}
} else { echo "No results"; }
$conn->close();
?>

</table>
<br>
<br>
            <a onclick="printData();">
              Print
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->

  <!-- contact section -->
  <section class="contact_section layout_padding-bottom" id="start">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Add Feedback
        </h2>
      </div>
      <div class="row">
        <div class="col-md-12 col-lg-6 mx-auto">
          <div class="form_container">
            <form action="insertion.inc.php" method="POST">
              <div>
                <input type="text" required class="message-box" placeholder="My Feedback Is..." name="det" />
              </div>                         
              <div class="btn_box ">
                <button name="addf">
                  ADD
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->

  <!-- info section -->

  <section class="info_section layout_padding2" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="info_contact">
            <h4>
              Contact Us
            </h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  Location: Nariobi, Kenya.
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call +254 712 345678
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                 Email: mindcare@gmail.com
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="info_link_box">
            <h4>
              Links
            </h4>
            <div class="info_links">
              <a class="active" href="#">
                <img src="images/nav-bullet.png" alt="">
                Home
              </a>
              <a class="" href="logout.php">
                <img src="images/nav-bullet.png" alt="">
                Logout 
              </a>
              <a class="" href="#contact">
                <img src="images/nav-bullet.png" alt="">
                Contact Us
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info section -->


  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved.
      </p>
    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>


</body>

</html>