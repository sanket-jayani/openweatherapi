<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

/*
	Created By : Sanket
	Date : 01-03-2023
	Desc: Weather Controller
*/
	
class WhetherController extends Controller
{
	
	protected $api_key;
	protected $base_url;
	
	
	public function __construct()
	{
		$this->api_key = config('constants.OPEN_WEATHER_API_KEY');
		$this->base_url = "http://api.openweathermap.org";
	}
	
	/*
	Created By : Sanket
	Date : 01-03-2023
	Desc: Loading view for Next24Hour
	*/
  
    public function Next24Hour()
    {
        return view('next24hour');
    }
	
	/*
	Created By : Sanket
	Date : 01-03-2023
	Desc: loading view for CurrentWhether
	*/
	
    public function CurrentWhether()
    {
        return view('currentwhether');
    }
	
	/*
	Created By : Sanket
	Date : 01-03-2023
	Desc: loading view for Next7Days
	*/
	
    public function Next7Days()
    {
        return view('next7days');
    }

	/*
	Created By : Sanket
	Date : 01-03-2023
	Desc: Getting current weather data by geo-coordinates
	*/
	
	public function currentWeatherGetData(Request $request)
	{
		
		$location_value = trim($request->location_value);
		$location_lat_long  = $this->getGeoCoOrdinates($location_value);
		
		if(is_array($location_lat_long) && count($location_lat_long) > 0)
		{
			$loc_lat = $location_lat_long['lat'];
			$loc_long = $location_lat_long['long'];
			
			
			$current_weather = $this->getCurrentWeather($loc_lat,$loc_long);
		}
	}
	
	/*
	Created By : Sanket
	Date : 01-03-2023
	Desc: Curl Reuqest for getting geo cordinates
	Parameters: Location name
	*/
	
	private function getGeoCoOrdinates($location_value)
	{
		$client_details = [];
		$ch = curl_init();
		
		
		$curl_url = $this->base_url."/geo/1.0/direct?q=$location_value&appid=$this->api_key";
		curl_setopt_array($ch, array(
			CURLOPT_URL => $curl_url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_POST => true,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_POSTFIELDS => http_build_query($client_details),
			CURLOPT_FOLLOWLOCATION => true
		));
		
		$output = curl_exec($ch);
			curl_close($ch);
		$output = json_decode($output, 1);
		
		
		$response_array = [];
		if(is_array($output) && count($output) > 0)
		{
			$response_array['lat'] 	= $output[0]['lat'];
			$response_array['long'] = $output[0]['lon'];
			
			
		}
		
		//returning array with lat,long
		return $response_array;
	}
	
	
	/*
	Created By : Sanket
	Date : 01-03-2023
	Desc: Curl Reuqest for getting weather data
	Parameters: Location lat,long
	*/
	private function getCurrentWeather($lat,$long)
	{
		$ch = curl_init();
		$client_details = [];
		
		$curl_url = $this->base_url."/data/3.0/onecall?lat=$lat&lon=$long&&exclude=minutely,hourly,daily,alertsappid=$this->api_key";
		curl_setopt_array($ch, array(
			CURLOPT_URL => $curl_url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_POST => true,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_POSTFIELDS => http_build_query($client_details),
			CURLOPT_FOLLOWLOCATION => true
		));
		
		$output = curl_exec($ch);
			curl_close($ch);
		$output = json_decode($output, 1);
		
		//dd($output);
		$response_array = [];
		if(is_array($output) && count($output) > 0)
		{
			$response_array['lat'] 	= $output[0]['lat'];
			$response_array['long'] = $output[0]['lon'];
		}
		
		//returning array with current weather data
		return $response_array;
	}

    

  
}
