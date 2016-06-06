<!doctype html>
<html>
<head>
	<title>Weather App</title>
	<meta charset="utf-8" />
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
</head>
<style>
	html, body{
		height: 100%;
	}
	.container{
		background-image: url(nature.gif);
		height: 100%;
		width: 100%;
		background-size: cover;
		background-position: center;
		padding-top: 150px;
	}
	.center{
		text-align: center;
	}
	.white {
		color: white;
	}
	.head {
		color: #2F4F4F;
	}
	p {
		padding-top: 35px;
		padding-bottom: 15px;
		color: #2F4F4F;
	}
	button{
		margin-top: 20px;
		margin-bottom:20px;	
	}
	.alert {	
		margin-top:20px;	
		display:none;	
	}	
</style>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 center">
				<h1 class="head"><b>Find your weather</b></h1>
				<p class="lead center">Enter a city below to get a forecast of the weather </p>
				<form>
					<div class="form-group">
						<input type="text" class="form-control" name="city" id="city" placeholder="Eg. Toronto, New York, San Francisco..."/>
					</div>
					<button id="findMyWeather"class="btn btn-success btn-lg">Find My Weather</button>
				</form>
				<div id="success" class="alert alert-success">Success!</div>	
				<div id="fail" class="alert alert-danger">Could not find weather data for that city. Please try again.</div>
				<div id="noCity" class="alert alert-danger">Please enter a city!</div>
			</div>
		</div>
	</div>
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script>
		$("#findMyWeather").click(function(event) {				
			event.preventDefault();	
			$(".alert").hide();	
			if ($("#city").val()!="") {					
				$.get("scraper.php?city="+$("#city").val(),
					function( data ) {	
						if (data=="") {
							$("#fail").fadeIn();
						} else {	
							$("#success").html(data).fadeIn();	
						}	
					});					
			} else {					
				$("#noCity").fadeIn();					
			}				
		});	
	</script>
</body>
</html>