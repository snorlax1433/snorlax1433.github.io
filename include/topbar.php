 <?php  if (isset($_SESSION['username'])) : ?>
       
    <?php endif ?>

<div id="content-wrapper" class="d-flex flex-column">  
  <div id="content">
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

              <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown no-arrow">
              <a class="nav-link" href="pos.php" role="button">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo '<strong>'.$_SESSION['username'].'</strong>'; ?></span>
              </a>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                <img class="img-profile rounded-circle"
               >

              </a>
 <?php 

                //$query = 'SELECT ID, FIRST_NAME,LAST_NAME,USERNAME,PASSWORD
                    //      FROM users u
                        //  JOIN employee e ON e.EMPLOYEE_ID=u.EMPLOYEE_ID';
             //  $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
              //  while ($row = mysqli_fetch_assoc($result)) {
//$a = $_SESSION['MEMBER_ID'];
                //}
                          
            ?>

              
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <button class="dropdown-item" onclick="on()">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </button>
                <a class="dropdown-item" href="settings.php?action=edit & id='<?php echo $a; ?>'">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <div class="dropdown-divider"></div>
                <div class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  <a href="login/logout.php">Logout</a>
                </div>
              </div>
            </li>

          </ul>

        </nav>
      
        <div class="container-fluid">