<html>
<title>Next 7 Days Weather</title>

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
					<input type="text" 
						class="form-control" placeholder="Location">
					
				</div>
			</div>
		</div>
		<table>
			<thead>
				<tr class="text-center">
					<th class="text-center">Hour</th>
					<th class="text-center">Whether</th>
					<th class="text-center">Temp</th>
				</tr>
			</thead>
			<tbody>
				<tr class="text-center">
					<td class="text-center">Wed,feb 1</td>
					<td class="text-center">Sunny</td>
					<td class="text-center">15`c</td>
				</tr>
				<tr>
					<td class="text-center">Thu,feb 2</td>
					<td class="text-center">Rainy</td>
					<td class="text-center">16`c</td>
				</tr>
				<tr>
					<td class="text-center">Fri,feb 3</td>
					<td class="text-center">Sunny</td>
					<td class="text-center">17`c</td>
				</tr>
				<tr>
					<td class="text-center">Sat,feb 4</td>
					<td class="text-center">Sunny</td>
					<td class="text-center">18`c</td>
				</tr>

			</tbody>
		</table>

		<div class="col-sm-4" style="margin-left: 475 px">
			<div class="form-group">
				<div class="d-flex justify-content-center bd-highlight mb-3">
					<span class=""><a href="{{ route('current.whether') }}">Current Whether</a></span>
					<span class=""><a href="{{route('next24hour.whether')}}">Next 24 Hour</a></span>
					<span class=""><a href="{{route('next7days.whether')}}">Next 7 Days</a></span>
				</div>
			</div>
		</div>
	</div>
    

</body>

</html>
