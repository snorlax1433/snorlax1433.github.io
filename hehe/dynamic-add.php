
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="all.css">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<script src="jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			var html = '<tr><td><input class="form-control" type="text" name="txtfullname" required=""></td><td><input class="form-control"  type="text" name="txtfullname"required=""></td><td><input class="form-control"  type="text" name="txtfullname" required=""></td><td><input class="form-control"  type="text" name="txtfullname" required=""></td><td><input type="button" class="btn btn-warning" name="remove" id="remove" value="remove" required=""></td></tr>';

			var x = 1;
			var max = 5;

			$("#add").click(function(){
				
				if (x <= max) {
					$("#table_field").append(html);
					x++;
				}
			});
			$("#table_field").on('click','#remove',function(){
				$(this).closest('tr').remove();
				x--; 
			});

		});
	</script>
</head>
<body>
	<div class="container">
		<form class="insert-form" id="insert_form" method="post" action="">
			<hr>
			<h1 class="text-center">Dynamicaly Add INput field and Insert Data </h1>

			<div class="input-field">
				<table class="table table-bordered"  id="table_field">
					<tr>
						<th> Full Name</th>
						<th> Email Address</th>
						<th> Phone</th>
						<th> Address</th>
					</tr>
					<tr>
						<td><input class="form-control" type="text" name="txtfullname" required=""></td>
						<td><input class="form-control"  type="text" name="txtfullname" required=""></td>
						<td><input class="form-control"  type="text" name="txtfullname" required=""></td>
						<td><input class="form-control"  type="text" name="txtfullname" required=""></td>
						<td><input type="button" class="btn btn-warning" name="add" id="add" value="add" required=""></td>
					</tr>
					
				</table>
				<center><input type="submit" class="btn btn-success" name="addd" id="save" value="Save Data" required=""></center>
			</div>
		</form>
		
	</div>
</body>
</html>