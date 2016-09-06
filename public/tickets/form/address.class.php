<?
########################################
## GEOCODER
########################################
	$google_key = 'AIzaSyDf5TJ4zmGc9gADgK8h_C5_an3doRZCm0M'; // Google Maps API (http://code.google.com/apis/maps/signup.html)
	$yahoo_key = 'MuNDSZvV34F8fH5fb4HOdJxRtiMK7RKAfLgS1afiehg_vMAKR5w8aymDsK74sGORalw-'; // yahoo developer id (http://developer.yahoo.com/wsregapp/)
	
	
	function geocode($location) {
			// get latitude, longitude using Google Maps Geocoder API
			$a = google_geo($location);
			$lat = $a[0];
			$long = $a[1];
	
			if(!$lat) { // no match, try using Yahoo! Geocoder API
				$a = yahoo_geo($location);
				$lat = $a['ResultSet']['Result']['Latitude'];
				$long = $a['ResultSet']['Result']['Longitude'];
				$zip = $a['ResultSet']['Result']['Zip'];
			}
			if(!$lat) { // multiple matches, use first
				$lat = $a['ResultSet']['Result'][0]['Latitude'];
				$long = $a['ResultSet']['Result'][0]['Longitude'];
				$zip = $a['ResultSet']['Result'][0]['Zip'];
			}
			if($lat) return array($lat,$long,$zip);
			else return false;
	}
	
	
	########################################
	## Yahoo! Geocoder
	########################################
	function request_cache($url, $dest_file, $timeout=129600) {
	  global $root;
	 
	  // if not in the cache
	  if(!file_exists($dest_file)) {
		$stream = fopen($url,'r');
		$tmpf = tempnam($root.'/geo_tmp','YWS');
		file_put_contents($tmpf, $stream);
		fclose($stream);
		rename($tmpf, $dest_file);
	  }
	}
	function yahoo_geo($location) {
	  global $root,$yahoo_key;
	  $appid = $yahoo_key; // developer id
	  
	  $q = 'http://api.local.yahoo.com/MapsService/V1/geocode';
	  $q .= '?appid='.$appid.'&output=php&location='.rawurlencode($location);
	  $tmp = $root.'/geo_tmp/yws_geo_'.md5($q);
	  request_cache($q, $tmp, 43200);
	  $php = file_get_contents($tmp);
	  $ret = unserialize($php);
	  return $ret;
	}
	
	#############################################
	## Google Geocoder
	#############################################
	function google_cache($url, $dest_file, $timeout=129600) {
	  global $root;
	  // if not in the cache or cache is older than 36 hours
	  //if(!file_exists($dest_file) || filemtime($dest_file) < (time()-$timeout)) {
	  
	  // if not in the cache
	  if(!file_exists($dest_file)) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER,0); //Change this to a 1 to return headers
		curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$data = curl_exec($ch);
		curl_close($ch);
		$tmpf = tempnam($root.'/geo_tmp','YWS');
		file_put_contents($tmpf, $data);
		rename($tmpf, $dest_file);
	  }
	}
	
	function google_geo($location) {
	  global $root,$google_key;
	  $key = $google_key;
	  //$q = 'http://maps.google.com/maps/geo?q='.rawurlencode($location);
	  $q = 'http://maps.googleapis.com/maps/api/geocode/json?address='.rawurlencode($location);
	  $q .= '&sensor=false';
	  //$q .= '&output=csv&key='.$key;
	  $tmp = $root.'/geo_tmp/ggl_geo_'.md5($q);
	  google_cache($q, $tmp, 43200);
	  //libxml_use_internal_errors(true);
	  $csv = file_get_contents($tmp);
	  $geo = json_decode($csv);
	  $x = $geo->results;
	  $x = $x[0]->geometry->location;
	  $ret = array($x->lat,$x->lng);
	  return $ret;
	}



########################################
## STATE POSTAL CODE FORMATTER
########################################

$state_abbr = array(
  'AL' => 'Alabama',
  'AK' => 'Alaska',
  'AS' => 'America Samoa',
  'AZ' => 'Arizona',
  'AR' => 'Arkansas',
  'CA' => 'California',
  'CO' => 'Colorado',
  'CT' => 'Connecticut',
  'DE' => 'Delaware',
  'DC' => 'District of Columbia',
  'FM' => 'Micronesia1',
  'FL' => 'Florida',
  'GA' => 'Georgia',
  'GU' => 'Guam',
  'HI' => 'Hawaii',
  'ID' => 'Idaho',
  'IL' => 'Illinois',
  'IN' => 'Indiana',
  'IA' => 'Iowa',
  'KS' => 'Kansas',
  'KY' => 'Kentucky',
  'LA' => 'Louisiana',
  'ME' => 'Maine',
  'MH' => 'Islands1',
  'MD' => 'Maryland',
  'MA' => 'Massachusetts',
  'MI' => 'Michigan',
  'MN' => 'Minnesota',
  'MS' => 'Mississippi',
  'MO' => 'Missouri',
  'MT' => 'Montana',
  'NE' => 'Nebraska',
  'NV' => 'Nevada',
  'NH' => 'New Hampshire',
  'NJ' => 'New Jersey',
  'NM' => 'New Mexico',
  'NY' => 'New York',
  'NC' => 'North Carolina',
  'ND' => 'North Dakota',
  'OH' => 'Ohio',
  'OK' => 'Oklahoma',
  'OR' => 'Oregon',
  'PW' => 'Palau',
  'PA' => 'Pennsylvania',
  'PR' => 'Puerto Rico',
  'RI' => 'Rhode Island',
  'SC' => 'South Carolina',
  'SD' => 'South Dakota',
  'TN' => 'Tennessee',
  'TX' => 'Texas',
  'UT' => 'Utah',
  'VT' => 'Vermont',
  'VI' => 'Virgin Islands',
  'VA' => 'Virginia',
  'WA' => 'Washington',
  'WV' => 'West Virginia',
  'WI' => 'Wisconsin',
  'WY' => 'Wyoming'
);

########################################
## OTHER ADDRESS FUNCTIONS
########################################

function array_isearch($str, $array){
    $str = strtolower($str);
    foreach ($array as $k => $v) if (strtolower($v) == $str) return $k;
    return false;
}
function format_state($var) {
	global $state_abbr;
	
	if(strlen($var) == 2) return strtoupper($var);
	
	if($state = array_isearch($var,$state_abbr)) return $state;
	else return $var;
}
function format_phone($ph,$format) { 
	$onlynums = preg_replace('/[^0-9]/','',$ph);
	if (strlen($onlynums)==10) { 
		$areacode = substr($onlynums, 0,3);
		$exch = substr($onlynums,3,3);
		$num = substr($onlynums,6,4);
		if($format == 'standard') $thisphone = $areacode . '-' . $exch . '-' . $num;
		else $thisphone = '(' . $areacode . ') ' . $exch . '-' . $num;
		return $thisphone;
	}
	elseif (strlen($onlynums)==11) {
		$prefix = substr($onlynums, 0,1);
		$areacode = substr($onlynums, 1,3);
		$exch = substr($onlynums,4,3);
		$num = substr($onlynums,5,4);
		if($format == 'standard') $thisphone = $prefix . '-' . $areacode . '-' . $exch . '-' . $num;
		else $thisphone = $prefix . ' (' . $areacode . ') ' . $exch . '-' . $num;
		$thisphone = trim($thisphone);
		return $thisphone;
	}
	else return $ph;
}
?>