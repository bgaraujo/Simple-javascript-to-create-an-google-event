<!-- Simple javascript to create an google event -->
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

		<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

		<script type="text/javascript">
			$( document ).ready(function() {
				$( "#form" ).submit(function( event ) {
  					create();
  					event.preventDefault();
				});
			});
					
		
			function copy() {
				text = document.getElementById('exit').value;
				window.clipboardData.setData("Text", text);
			}
			
			function configString(string) {
				return string.replace(new RegExp(' ', 'g'), '+');
			}
			
			function formDate(date) {
				return date.replace(new RegExp("-", 'g'), "");
			}
			
			function formTime(time) {
				return time.replace(':','');
			}
			
			function create() {
				link = "https://www.google.com/calendar/render?action=TEMPLATE&text=[name]&dates=[dtf]T[tmf]Z/[dtt]T[tmt]Z&details=[description]&location=[location]&sf=true&output=xml";
				var_name = document.getElementById("name").value;
				var_datefrom = document.getElementById("datefrom").value;
				var_timefrom = document.getElementById("timefrom").value;
				var_dateto = document.getElementById("dateto").value;
				var_timeto = document.getElementById("timeto").value;
				var_description = document.getElementById("description").value;
				var_location = document.getElementById("location").value;
				link = link.replace("[name]",configString(var_name));
				link = link.replace("[dtf]",formDate(var_datefrom));
				link = link.replace("[tmf]",formTime(var_timefrom)+'00');
				link = link.replace("[dtt]",formDate(var_dateto));
				link = link.replace("[tmt]",formTime(var_timeto)+'00');
				link = link.replace("[description]",configString(var_description));
				link = link.replace("[location]",configString(var_location));
				
				document.getElementById('exit').value = "<a href='"+link+"'><img src='https://raw.githubusercontent.com/bgaraujo/EventOnGoogle/master/img/calendar.png'></a>";
				
				document.getElementById('formExit').style.display = 'table';
				
				$('#test').html("<a href='"+link+"' target='_blank' class='btn btn-success'>Test Link</a>");	
			}
		</script>		
		
		
	</head>
	<body>	
		<div class="panel panel-default">
			<div class="panel-heading">Create a new event</div>
 			<div class="panel-body">
				<form id="form">
			 		<div class="form-group">
    					<label>Name</label>
    					<input type="text" class="form-control" placeholder="Name" id="name" required>
  					</div>
  					<div class="form-group">
    					<div class="form-inline">
  							<div class="form-group">
    							<label for="exampleInputName2">Date from</label>
    							<input type="date" class="form-control" id="datefrom" required>
  							</div>
  							<div class="form-group">
    							<label for="exampleInputName2">Time from</label>
    							<input type="time" class="form-control" id="timefrom" required>
  							</div>
  							<div class="form-group">
    							<label for="exampleInputEmail2">Date to</label>
    							<input type="date" class="form-control" id="dateto" required>
  							</div>
  							<div class="form-group">
    							<label for="exampleInputName2">Time to</label>
    							<input type="time" class="form-control" id="timeto" required>
  							</div>
  						</div>
  					</div>
  					<div class="form-group">
    					<label>Description</label>
    					<textarea class="form-control" rows="3" placeholder="Description" id="description" required></textarea>
  					</div>
  					<div class="form-group">
    					<label>Location</label>
    					<input type="text" class="form-control" placeholder="Location" id="location" required>
  					</div>

			</div>
			<div class="panel-footer">
				<input type="submit" class="btn btn-default">	
				</form>		
			</div>
		</div>
	</body>
</html>
<div id="test"></div>
<div class="input-group" id="formExit" style="display:none;">
  <span class="input-group-addon" id="basic-addon1" onclick="copy();">link</span>
  <input type="text" class="form-control" id="exit" aria-describedby="basic-addon1">
</div>

