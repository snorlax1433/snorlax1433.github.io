
<!doctype html>
<html lang="en-US">

<head>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <meta name="description" content="Address Book">
  <meta name="keywords" content="PHP CRUD, CRUD with search and pagination, bootstrap 4, PHP">
  <meta name="robots" content="index,follow">
  <title>Address Book</title>
    <link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">
    <link rel="stylesheet" href="../../hehe/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="../../https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../../hehe/all.css">
  <link rel="stylesheet" type="text/css" href="../../hehe/bootstrap.min.css">
  <script src="../../hehe/jquery.min.js"></script>
</head>
<body class="bg-dark">
  <div class="container">
    <div class="row my-4">
      <div class="col-lg-10 mx-auto">
        <div class="card shadow">
          <div class="card-header">
            <h4>Add Items</h4>
          </div>
          <div class="card-body p-4">
            <div id ="show_alert"></div>
            <form action ="#" method="POST" id ="add_form">
              <div id="show_item">
                <div class="row">
                  <div class="col-md-4 mb-3">
                    <input type = "text" name="product_name[]" class="form-control" placeholder=" Item Name" required>
                  </div>

                  <div class="col-md-3 mb-3">
                    <input type = "number" name="product_price[]" class="form-control" placeholder=" Item Price" required>
                  </div>


                  <div class="col-md-3 mb-3">
                    <input type = "number" name="product_qty[]" class="form-control" placeholder=" Item Quantity" required>
                  </div>
                  <div class="col-md-2 mb-3 d-grid">
                   <button class="btn btn-success add_item_btn">Add More</button>
                  </div>
                </div>
              </div>
              <div>
                <input type="submit" name="" value="Add" class="btn btn-primary w-25" id="add_btn">
              </div>
            </form>
          </div>
        </div>
    </div>
  </div>

  <script>
    $(document).ready(function(){
    
      $(".add_item_btn").click(function(e){
        e.preventDefault();
        $("#show_item").prepend(' <div class="row append_item"><div class="col-md-4 mb-3"><input type = "text" name="product_name[]" class="form-control" placeholder=" Item Name" required></div><div class="col-md-3 mb-3"><input type = "number" name="product_price[]" class="form-control" placeholder=" Item Price" required></div><div class="col-md-3 mb-3"><input type = "number" name="product_qty[]" class="form-control" placeholder=" Item Quantity" required></div><div class="col-md-2 mb-3 d-grid"><button class="btn btn-danger remove_item_btn">Remove</button></div></div>');
      });
      $(document).on('click','.remove_item_btn', function(e){
        e.preventDefault();
        let row_item = $(this).parent().parent();
        $(row_item).remove();
      });
      $("#add_form").submit(function(e){
        e.preventDefault();
        $("#add_btn").val('Adding...');
        $.ajax({
          url: 'action.php',
          method: 'post',
          data: $(this).serialize(),
          success: function(response){
            $("#add_btn").val('Add');
            $("#add_form")[0].reset();
            $(".append.item").remove();
            $("#show_alert").html(`<div class="alert alert-success" role="alert">${response} </div>`);

          }
        });
      });
    });
  </script>































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

     
    
 

    

  
    
     <script src="../../hehe/jquery.min.js"></script>
    


    
    
</body>

</html>