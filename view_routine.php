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
            <h2 class="section-title mb-3"><br>All Semester At One Place</h2>
            <p>You can create and view semester here.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 mb-5">
            <div class="product-item">
              <div class="card">
        <div class="card-header">
        	<?php 
            if(isset($_POST['session']) && isset($_POST['semester'])){
              $session = $_POST['session'];
              $semester = $_POST['semester'];
            }else{
            if(isset($_SESSION["ses"]) && isset($_SESSION["sem"])){
              $session=$_SESSION["ses"];
              $semester=$_SESSION["sem"];
            }
          }
          echo "Routine of Session: ".$session." semester: ".$semester;
          ?> 
        </div>
        <div class="card-body table-wrap">
        		
          <table id="datatable" class="table table-hover table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Day</th>
                <th>Time</th>
                <th>Course</th>
                <th>Teacher</th>
                <th colspan="2">Action</th>
              </tr>
            </thead>
            <tbody>
            <?php
            include "db.php";
            
            $select="SELECT * FROM routines where session='$session' and semester='$semester'";
            $result=mysqli_query($conn,$select);
            $c=0;
            while($row=mysqli_fetch_array($result)){
              $c=$c+1;
            ?>
              <tr>
              	<form class="inline" action="update_routine.php" method="post" accept-charset="utf-8" id="update_form<?php echo $c ?>">
                <td><?php echo $c ?></td>
                <td>
                		<select class="custom-select" id="day<?php echo $c ?>" name="day">
							    <option selected><?php echo $row['day'];?></option>
							    <option value="Sunday">Sunday</option>
							    <option value="Monday">Monday</option>
							    <option value="Tuesday">Tuesday</option>
							    <option value="Wednesday">Wednesday</option>
							    <option value="Thursday">Thursday</option>
							  </select>
                	</td>
                <td>
                	<input class="form-control" list="browsers" name="time" value="<?php echo $row['time'];?>" id="time<?php echo $c ?>">
								<datalist id="browsers">
								  <option value="8.30-10.00">
								  <option value="10.00-11.30">
								  <option value="11.30-1.00">
								  <option value="2.00-3.30">
								  <option value="3.30-5.00">
								</datalist>
                </td>
                <td><input type="text" name="course" value="<?php echo $row['course'];?>" id="course<?php echo $c ?>"></td>
                <td><input type="text" name="teacher" value="<?php echo $row['teacher'];?>" id="teacher<?php echo $c ?>"></td>
                <td>
                      <input type="hidden" name="session" value="<?php echo $row['session'];?>" id="session<?php echo $c ?>">
                      <input type="hidden" name="semester" value="<?php echo $row['semester'];?>" id="semester<?php echo $c ?>">
                      <input type="hidden" name="id" value="<?php echo $row['id'];?>" id="id<?php echo $c ?>">
                      <button type="submit" class="btn btn-success" id="update<?php echo $c ?>">Update</button>
                  </form>
                </td>
                <td>
                  <form action="delete_routine_partial.php" method="post" accept-charset="utf-8">
                    <input type="hidden" name="session" value="<?php echo $row['session'];?>" id="session<?php echo $c ?>">
                    <input type="hidden" name="semester" value="<?php echo $row['semester'];?>" id="semester<?php echo $c ?>">
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
                  Add New Class
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
        <h5 class="modal-title" id="exampleModalLongTitle">Add Class Schedule</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="regForm" action="add_class.php" method="post">
              <input type="hidden" name="session" value="<?php echo $session?>" id="session<?php echo $c ?>">
              <input type="hidden" name="semester" value="<?php echo $semester?>" id="semester<?php echo $c ?>">
              <div class="form-group">
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Day</label>
                </div>
                <select class="custom-select" id="inputGroupSelect01" name="day">
                  <option selected>Choose...</option>
                  <option value="Sunday">Sunday</option>
                  <option value="Monday">Monday</option>
                  <option value="Tuesday">Tuesday</option>
                  <option value="Wednesday">Wednesday</option>
                  <option value="Thursday">Thursday</option>
                </select>
              </div>
                
              </div>
              <div class="form-group">
                <label for="course">Time </label>
                <input class="form-control" list="browsers" name="time">
                <datalist id="browsers">
                  <option value="8.30-10.00">
                  <option value="10.00-11.30">
                  <option value="11.30-1.00">
                  <option value="2.00-3.30">
                  <option value="3.30-5.00">
                </datalist>
                <!--<input class="form-control" list="time" name="time">
                <datalist name="time">
                <option value="8.30-10.00">
                <option value="10.00-11.30">
                <option value="11.30-1.00">
                <option value="2.00-3.30">
                <option value="3.30-5.00">
              </datalist>-->
                
              </div>
              <div class="form-group">
                <label for="course">Course </label>
                <input type="text" name="course" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                
              </div>
              
              <div class="form-group">
                <label for="teacher">Teacher </label>
                <input type="text" name="teacher" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                
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
  <script>
    /*for (i=1;i<40;i++){
  	$('#update_form'+i).submit(function(){
	  return false;
  });

 
$('#update'+i).click(function(){
	$.post(		
		$('#update_form'+i).attr('action'),
		$('#update_form'+i+' :input').serializeArray(),
		function(result){
			alert('form has been posted successfully');
		}
	);
});
}*/
/*$(document).ready(function() {
  $('#update'+i).on('click', function() {
    $("#update"+i).attr("disabled", "disabled");
    var session = $('#session'+i).val();
    var semester = $('#semester'+i).val();
    var id = $('#id'+i).val();
    var day = $('#day'+i).val();
    var time = $('#time'+i).val();
    var course = $('#course'+i).val();
    var teacher = $('#teacher'+i).val();
    if(session!="" && semester!="" && id!="" && day!="" && time!="" && course!="" && teacher!=""){
      $.ajax({
        url: "update_routine.php",
        type: "POST",
        data: {
          session: session,
          semester: semester,
          id: id,
          day: day,        
          time: time,        
          course: course,        
          teacher: teacher       
        },
        cache: false,
        success: function(dataResult){
          var dataResult = JSON.parse(dataResult);
          if(dataResult.statusCode==200){
            $("#update"+i).removeAttr("disabled");
            $('#update_form'+i).find('input:text').val('');
              alert("Data updated successfully !");        
          }
          else if(dataResult.statusCode==201){
             alert("Error occured !");
          }
          
        }
      });
    }
    else{
      alert('Please fill all the field !');
    }
  });
});*/
  </script>
  </body>
</html>
