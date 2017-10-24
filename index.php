<!DOCTYPE html>
<html>
<head>
	<title>Autoregistracija</title>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div id="header" class="row">
			<h1>Car registration</h1>
		</div>
	</div>
	<div class="container">
		 <div class="row">
		 	<div class="col-md-8">
		 		<h2>Cars list</h2>
				<input class="form-control" type="search" name="search" id="search">
				<input id="last5" class="btn btn-warning" type="button" value="Last 5 registered">
				<select>
				  <option></option>
				</select>
				<table class="table table-sm">
					<thead>
						<th>Id</th><th>Owner</th><th>License</th><th>Model</th><th>Make</th><th>Date</th>
					</thead>
					<tbody id="user_table_body">
					</tbody>	
				</table>
			</div>

		 	<div class="col-md-4"><h2>Registration</h2>
		 		<div id="alert"></div>
				<div class="input-group">
					<input id="form_owner" class="form-control" type="text" name="owner" placeholder="Owner">
				</div><br/>
				<div class="input-group">
					<input id="form_license" class="form-control" type="text" name="license" placeholder="License">
				</div><br/>
				<div class="input-group">
					<input id="form_model" class="form-control" type="email" name="model" placeholder="Model">
				</div><br/>
				<div class="input-group">
					<input  id="form_make" class="form-control" type="text" name="make" placeholder="Make">
				</div><br/>

				<div class="input-group">
					<input id="ajax_post" class="btn btn-success" type="button" value="Register car">
				</div>
		 	</div>
		 </div>
	</div>
<script src="script.js"></script>
</body>
</html>