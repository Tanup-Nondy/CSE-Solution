<?php
session_start();
if(isset($_SESSION["admin"])){
      $admin=$_SESSION["admin"];
    }else{
      $admin="";
    }
if($admin=="false"){
    header("Location:index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Selling &mdash; Website by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    <style>
      .table-wrap {
  height: 400px;
  overflow-y: auto;
}
    </style>
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    <div class="top-bar py-3 bg-light" id="home-section">
      <div class="container">
        <div class="row align-items-center">
         
          <div class="col-6 text-left">
            <ul class="social-media">
              <li><a href="#" class=""><span class="icon-facebook"></span></a></li>
              <li><a href="#" class=""><span class="icon-twitter"></span></a></li>
              <li><a href="#" class=""><span class="icon-instagram"></span></a></li>
              <li><a href="#" class=""><span class="icon-linkedin"></span></a></li>
            </ul>
          </div>
          <div class="col-6">
            <p class="mb-0 float-right">
              <span class="mr-3"><a href="tel://#"> <span class="icon-phone mr-2" style="position: relative; top: 2px;"></span><span class="d-none d-lg-inline-block text-black">(+1) 234 5678 9101</span></a></span>
              <span><a href="#"><span class="icon-envelope mr-2" style="position: relative; top: 2px;"></span><span class="d-none d-lg-inline-block text-black">shop@yourdomain.com</span></a></span>
            </p>
            
          </div>
        </div>
      </div> 
    </div>

    <header class="site-navbar py-4 bg-white js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-6 col-xl-2">
            <h1 class="mb-0 site-logo"><a href="index.html" class="text-black mb-0">Selling<span class="text-primary">.</span> </a></h1>
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="#home-section" class="nav-link">Home</a></li>
                <li><a href="routines.php" class="nav-link">Routines</a></li>
                <li><a href="books.php" class="nav-link">Books</a></li>
                <li><a href="#blog-section" class="nav-link">Syllabus</a></li>
                <li><a href="#" class="nav-link">About Us</a></li>
                <li><a href="#contact-section" class="nav-link">Contact</a></li>
                <?php
                if($admin=="true"){
                ?>
                <li><a href="logout.php" class="nav-link">Logout</a></li>
                <?php
                }else{
                ?>
                
                <li><a href="" class="nav-link" data-toggle="modal" data-target="#example">Login</a></li>
                <?php
               }
               ?>
              </ul>
            </nav>
          </div>
            

          <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a></div>

        </div>
      </div>
      
    </header>
    
    <div class="site-section" id="products-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-6 text-center">
            <h2 class="section-title mb-3"><br>All Books At One Place</h2>
            <p>You can create and view books here.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 mb-5">
            <div class="product-item">
              <div class="card">
        <div class="card-header">
        	<?php 
            if(isset($_POST['subject'])){
              $subject = $_POST['subject'];
            }else{
            if(isset($_SESSION["subject"])){
              $subject=$_SESSION["subject"];
            }
          }
          echo "Books of Subject: ".$subject;
          ?> 
        </div>
        <div class="card-body table-wrap">
        		
          <table id="datatable" class="table table-hover table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Title</th>
                <th>Image</th>
                <th colspan="2">Action</th>
              </tr>
            </thead>
            <tbody>
            <?php
            include "db.php";
            
            $select="SELECT * FROM books where subject='$subject'";
            $result=mysqli_query($conn,$select);
            $c=0;
            while($row=mysqli_fetch_array($result)){
              $c=$c+1;
              $img_field= $row['image'];
              $pdf_field= $row['pdf'];
              $img_show= "Uploads/images/$img_field";
              $pdf_show= "Uploads/pdfs/$pdf_field";
            ?>
              <tr>
                <td><?php echo $c ?></td>
                
                <td><?php echo $row['name'];?></td>
                <td><img src="<?php echo $img_show; ?>" alt="No Image"></td>
                <td>
                      <input type="hidden" name="subject" value="<?php echo $row['subject'];?>" id="session<?php echo $c ?>">
                      <input type="hidden" name="id" value="<?php echo $row['id'];?>" id="id<?php echo $c ?>">
                      <button type="button" class="btn btn-success">
                        <a href="<?php echo $pdf_show; ?>" target="_blank">View</a>
                      </button>
                </td>
                <td>
                  <form action="delete_book.php" method="post" accept-charset="utf-8">
                    <input type="hidden" name="subject" value="<?php echo $row['subject'];?>" id="session<?php echo $c ?>">
                  	<input type="hidden" name="id" value="<?php echo $row['id'];?>">
                      <button type="submit" class="btn btn-danger">Delete</a>
                  </form>
                  
                </td>
                </div>
              </div>
              </div>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
              <div class="px-4">
                <br>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#example">
                  Add New Book
                </button>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
      <!-- Modal -->
      <div class="modal fade" id="example" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add New Book</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="regForm" action="add_book.php" method="post" enctype="multipart/form-data">
              <input type="hidden" name="subject" value="<?php echo $subject?>" id="session<?php echo $c ?>">  
              <div class="form-group">
                <label for="name">Name </label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                
              </div>
              
              <div class="form-group">
                <label for="image">Image </label>
                <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                
              </div>
              <div class="form-group">
                <label for="file">File </label>
                <input type="file" name="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                
              </div>
              <button type="submit" class="btn btn-primary">Add</button>
    </form>
    </div>
  </div>
</div>

</div>
<!-- end modal -->
      <div class="container">
        <div class="row pt-5 mt-5 text-center">
          
            <p>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
      </p>
            
          
        </div>
      </div>


  </div> <!-- .site-wrap -->

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>

  
  <script src="js/main.js"></script>

  </body>
</html>
