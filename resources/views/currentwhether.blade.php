<html>
<title>Current Weather</title>
<header>

	<link rel="stylesheet" href="{{ asset('/assets/front/css/bootstrap.min.css?v=1') }}">
	<link rel="stylesheet" href="{{ asset('/assets/front/css/bootstrap-theme.min.css?v=1') }}">
	<link rel="stylesheet" href="{{ asset('/assets/front/css/custom.css?v=1') }}">
	
	
	<script src="{{ asset('/assets/front/js/jquery.min.js?v=1') }}"></script>
	<script src="{{ asset('/assets/front/js/bootstrap.min.js?v=1') }}"></script>
	
</header>

<body>
	<div class="row">
		<div class="col-sm-4" style="margin-left: 475 px">
			<div class="form-group">
				<div class="controls">
					<label>Enter Location</label>
					<input type="text" class="form-control" name="location_value" id="location_value" placeholder="Enter Location">
					
				</div>
			</div>
		</div>

		<div class="col-sm-4" style="margin-left: 475 px">
			<div class="form-group">
				<div class="d-flex justify-content-center bd-highlight mb-3">
					<div class=""> Weather description : <span id="weather_description"></span></div>
					</br>
					<div class="">Current Temp <span id="current_tmp">45`c</span></div>
					<div class="">Feels Like  <span id="feels_like">45`c</span></div>
					</br>
					<div class="">Humidity<span id="humadity">20%</span></div>
				</div>
			</div>
		</div>
	  

		<div class="col-sm-4" style="margin-left: 475 px">
			<div class="form-group">
				<div class="d-flex justify-content-center bd-highlight mb-3">
					<span class=""><a href="{{route('current.whether') }}">Current Whether</a></span>
					<span class=""><a href="{{route('next24hour.whether')}}">Next 24 Hour</a></span>
					<span class=""><a href="{{route('next7days.whether')}}">Next 7 Days</a></span>
				</div>
			</div>
		</div>
	
	</div>
	<script>
	$(document).ready(function(){
	  $("#location_value").blur(function(){
	 
			
			if($("#location_value").val().length > 2)
			{
				requestAjaxCall();
			}
		 
	  });
	});
	
	
	function requestAjaxCall()
	{
		
		var location_value = $('#location_value').val();
		$.ajax({
			url: '{{route("currentWeatherGetData")}}',
			type: 'POST',
			data: {
				'_token': '{{csrf_token()}}',
				'location_value':location_value
			},
			beforeSend: function () {
				$('#order_return_details_model_body').html("<img src='{{ asset("assets/admin/images/ajax-loader.gif") }}'/>");
			},
			success: function (response) {

				var obj = jQuery.parseJSON(response);
				$('#order_return_details_model_body').html(obj['DATA'].order_return_details);
				$('#load_popup_modal_show_id').modal('show');
				
			
				  
			}
		});
	}
	
	</script>
</body>
</html>
