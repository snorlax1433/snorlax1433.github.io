<?php
  session_start();

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../../login/login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: ../../login/login.php");
  }
?>


<?php include_once('../../include/config.php');
include ('../../include/sidebar3.php');
if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){

	extract($_REQUEST);

	if($username==""){

		header('location:'.$_SERVER['PHP_SELF'].'?msg=un');

		exit;

	}elseif($useremail==""){

		header('location:'.$_SERVER['PHP_SELF'].'?msg=ue');

		exit;

	}elseif($userphone==""){

		header('location:'.$_SERVER['PHP_SELF'].'?msg=up');

		exit;

	}else{

		

		$userCount	=	$db->getQueryCount('users','id');

		if($userCount[0]['total']<100){

			$data	=	array(

							'username'=>$username,

							'useremail'=>$useremail,

							'userphone'=>$userphone,

							);

			$insert	=	$db->insert('users',$data);

			if($insert){

				header('location:../../index.php?msg=ras');

				exit;

			}else{

				header('location:../../index.php?msg=rna');

				exit;

			}

		}else{

			header('location:'.$_SERVER['PHP_SELF'].'?msg=dsd');

			exit;

		}

	}

}

?>

<!doctype html>
<html lang="en-US">

<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<meta name="description" content="Address Book">
	<meta name="keywords" content="PHP CRUD, CRUD with search and pagination, bootstrap 4, PHP">
	<meta name="robots" content="index,follow">
	<title>User Add</title>

	

	<link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">

    <link rel="stylesheet" href="../../hehe/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <link rel="stylesheet" href="../../https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>



</head>



<body>

	 <style>
	.header {
	  position: relative;
	  left: 0;
	  Top: 0;
	  width: 100%;
	  background-color: Black;
	  color: white;
	  text-align: center;
	}
	</style>

 
   	<div class="container">

		<?php

		if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="un"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User name is mandatory field!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ue"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User email is mandatory field!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="up"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User phone is mandatory field!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){

			echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="dsd"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Please delete a user and then try again <strong>We set limit for security reasons!</strong></div>';

		}

		?>

		
	 <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Add Customer</h4>
            </div><a  type="button" class="btn btn-primary bg-gradient-primary btn-block" href="../../index.php"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back </a>
            <div class="card-body">

			 <form role="form" method="post">
              <input type="hidden" name="id" value="<?php echo $zz; ?>" />
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Full Name:
                </div>
                <div class="col-sm-9">
                 <input type="text" name="username" id="username" class="form-control" placeholder="Enter Full Name" required>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Email:
                </div>
                <div class="col-sm-9">
                 <input type="email" name="useremail" id="useremail" class="form-control" placeholder="Enter user email" required>
                </div>
              </div>
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Contact #:
                </div>
                <div class="col-sm-9">
                   	<input type="tel" class="tel form-control" name="userphone" id="userphone" x-autocompletetype="tel" placeholder="Enter user phone" required>

                </div>
              </div>
              <hr>
<input type="hidden" name="editId" id="editId" value="<?php echo isset($_REQUEST['editId'])?$_REQUEST['editId']:''?>">
                <button type="submit" name="submit" value="submit" id="submit" class="btn btn-warning bg-gradient-success"><i class="fa fa-edit fa-fw"></i>Create</button> 
              </form>  

				

</div>
</div>

				

					

		

		

	</div>

    


		
		 <script src="../../hehe/jquery.min.js"></script>
    
 <style>
.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: Black;
  color: white;
  text-align: center;
}
</style>


    
</body>

</html>