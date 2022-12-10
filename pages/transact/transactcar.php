<?php include_once('../../include/config.php');
  include_once('../../include/config2.php');
  include '../../include/sidebar.php';
if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=""){

  $row  = $db->getAllRecords('users','*',' AND id="'.$_REQUEST['editId'].'"');
  $temp = $_REQUEST['editId'];
  $productrow = $db->getAllRecords('product1','*',' AND product_quantity="'.$_REQUEST['editId'].'"');
$userCount  = $db->getQueryCount('cardata',$temp);

}


$sql2 = " SELECT  * FROM   users  JOIN cardata ON users.id = cardata.plateid 
      
      WHERE   users.id = '$temp'";
      
        $pages->default_ipp =   15;
        $sql10    = $db->getRecFrmQry("SELECT * FROM cardata ");
        $pages->items_total =   count($sql10);
        $pages->mid_range   =   9;
        $pages->paginate(); 
         
        $userData   =   $db->getRecFrmQry("SELECT * FROM cardata  WHERE plateid = $temp ORDER BY id DESC ".$pages->limit."");





?>

<!doctype html>

<html lang="en-US">

<head>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <meta name="description" content="PHP CRUD with search and pagination in bootstrap 4">
  <meta name="keywords" content="PHP CRUD, CRUD with search and pagination, bootstrap 4, PHP">
  <meta name="robots" content="index,follow">
  <title>Services</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>

    <div class="card shadow mb-4">
      
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Car's List&nbsp;<a  href="../users/user-plate.php?editId=<?php echo $temp ?>"   type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
            </div>
            <div class="card-body">
              <div class="clearfix"></div>
     
        <div class="row marginTop">
            <div class="col-sm-12 paddingLeft pagerfwt">
                <?php if($pages->items_total > 0) { ?>
                    <?php echo $pages->display_pages();?>
                    <?php echo $pages->display_items_per_page();?>
                    <?php echo $pages->display_jump_menu(); ?>
                <?php }?>
            </div>
            <div class="clearfix"></div>
        </div>
     
        <div class="clearfix"></div>
        

        <div>

            <table class="table table-striped table-bordered">
                <thead>
                    <tr class="bg-primary text-white">
                      <td>ID</td>
                        <th>Plate Number</th>
                        <th>Car's Brand</th>
                        <th>Car's Model</th>
                        <th> Car's Producer</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if(count($userData)>0){
                        $s  =   '';
                        foreach($userData as $val){
                            $s++;
                    ?>
                    <tr>
                        <td><?php echo $val['plateid'];?></td>
                        <td><?php echo $val['userphone'];?></td>
                        <td><?php echo $val['carbrand'];?></td>
                        <td><?php echo $val['carmodel'];?></td>
                        <td><?php echo $val['carmanufacturer'];?></td>
                        <td align="center">

                         
                         <a type="button" class="btn btn-primary bg-gradient-primary" href="../../pages/user-delete/car-display.php?editId=<?php echo $val['id'];?>"><i class="fas fa-fw fa-list-alt"></i> Details</a>
                         <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                 
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="../user-delete/car-edit.php?editId=<?php echo $val['id'];?>">
                                    <i class="fas fa-fw fa-edit"></i> Edit
                                  </a>
                                </li>
                                <li>
                                  <a type="button" class="btn btn-warning bg-gradient-danger btn-block" style="border-radius: 0px;" href="../user-delete/car-delete.php?delId=<?php echo $val['id'];?>">
                                    <i class="fas fa-fw fa-edit"></i> Delete
                                  </a>
                                </li>
                            </ul>

                            </div>
                        </td>

                    </tr>
                    <?php 
                        }
                    }else{
                    ?>
                    <tr><td colspan="5" align="center">No Record(s) Found!</td></tr>
                    <?php } ?>
                </tbody>
            </table>
        </div> <!--/.col-sm-12-->
        
        <div class="clearfix"></div>
     
        <div class="row marginTop">
            <div class="col-sm-12 paddingLeft pagerfwt">
                <?php if($pages->items_total > 0) { ?>
                    <?php echo $pages->display_pages();?>
                    <?php echo $pages->display_items_per_page();?>
                    <?php echo $pages->display_jump_menu(); ?>
                <?php }?>
            </div>
            <div class="clearfix"></div>
        </div>
     
        <div class="clearfix"></div>
        
    </div>
                    </div>
                  </div>



    
   
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
  <script src="https://www.solodev.com/_/assets/phone/jquery.mobilePhoneNumber.js"></script>
  <script>
    $(document).ready(function() {
    jQuery(function($){
        var input = $('[type=tel]')
        input.mobilePhoneNumber({allowPhoneWithoutPrefix: '+1'});
        input.bind('country.mobilePhoneNumber', function(e, country) {
        $('.country').text(country || '')
        })
       });
    });
  </script>
    

</body>

</html>