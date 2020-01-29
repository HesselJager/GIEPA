<?php
	// Set username and password
	$USER_USERNAME = "user";
	$USER_PASSWORD = '$argon2i$v=19$m=1024,t=2,p=2$RGVNME4weFFwMmMyd01IZw$a28OeXYplLovOamT/0VITKf3kMsWi+mQVMJjAVKlxcw'; // GAINEXPRAG2020

	// Array of the stations used for this project
	$allowed_stations = array(617010, 85940, 619020, 889030, 888890, 888900, 888910, 689060);

	// Array with the names of the stations, the names are at the exact locations as the $allowes_stations array
	$station_locations = array("BANJUL/YUNDUM", "SAL", "WIDE AWAKE FIELD", "GRYTVIKEN S.GEORGIA", "MOUNT PLEASANT AIRP", "STANLEY", "STANLEY AIRPORT", "GOUGH ISLAND");
	/* This function compares username and password credentials
	 * and checks if the input is correct
	 */
	function verify_login($username, $password) {
		global $USER_USERNAME, $USER_PASSWORD; 
		if(password_verify($password, $USER_PASSWORD) == 1 && $username == $USER_USERNAME) {
			return true;
		}
		else{
			return false;
		}
	}
	/* This function checks if a login
	 * session is active, if it is not, redirect to login screen
	 */
	function check_login() {
		if(!isset($_SESSION['logged_in'])) {
			header('location: index.php');
		}
	}
	// Array of the stations used for this project
	$allowed_stations = array(617010, 85940, 619020, 889030, 888890, 888900, 888910, 689060);
	/* This function checks if the selected weather station
	 * is one of the stations used for this project
	 */
	function check_station($station) {
		global $allowed_stations;
		if(in_array($station, $allowed_stations)) {
			return true;
		} else {
			return false;
		}
	}

	/* This function returns the name of a station. It uses the key of
	 * the $allowed_stations array to search the $station_locations array
	 */
	function get_station_name($station) {
		global $allowed_stations, $station_locations;

		$key = array_search($station, $allowed_stations);

		$name = $station_locations[$key];

		return $name;
	}
	/* This array will hold the required data for the weather application, 
	 * in the form of a measurement object
	 * The key is the stationnumber, the value is an array of the measurement objects belonging to the 
	 * station, holding this stationnumber.
	 */
	$measurements=array();
	/* This class creates a measurement object,
	 * which holds data of a measuremnt in a weatherstation
	 */
	class Measurement{
	    public $stn;
	    public $date_and_time;
	    public $temp;
	    public $wdsp;
	    public $wnddir; 
	}
	/* This function parses an bin file and filters based on the stationnumber
	 * If the stationnumber belongs to a station that is needed an object will be created 
	 * The object will be put in the measurements array
	 */
	 
	function parse_csv($csv_file){
		global $measurements;
		//if file doesnt exist: clear measurements
		if(! file_exists($csv_file)){
			$measurements=array();
			return;
		}
		
		$file=fopen($csv_file, "r");
		
		
		
		
		
		
		while(! feof($file)){
			$file_data=fgetcsv($file);
		   $measurement =new Measurement(); 
            $measurement->stn=intval($file_data[0]);
 		 	$measurement->date_and_time=date_create($file_data[1]." ".$file_data[2]);
	        $measurement->temp=floatval($file_data[3]);
	        $measurement->wdsp=floatval($file_data[8]);
	        $measurement->wnddir=floatval($file_data[13]);
	        $measurements=array_merge($measurements,array($measurement));  
		}
		fclose($file);
	}

	/* This function reads wind direction
	 * and converts it to a direction in words, like north east
	 */
	function wnddir_to_words($wnddir){
		if($wnddir>=340 || $wnddir<=20){
			return "NORTH";
		}
		elseif(in_array($wnddir,range(70,110))){
			return "EAST";
		}
		elseif(in_array($wnddir,range(160,200))){
			return "SOUTH";
		}
		elseif(in_array($wnddir,range(250,290))){
			return "WEST";
		}
		elseif(in_array($wnddir,range(21,69))){
			return "NORTH-EAST";
		}
		elseif(in_array($wnddir,range(111,159))){
			return "SOUTH-EAST";
		}
		elseif(in_array($wnddir,range(201,249))){
			return "SOUTH-WEST";
		} 
		else{
			return "NORTH-WEST";
		}
	}
	function createCompass($degrees){
		$degrees=-1*$degrees;
	header("Content-type: image/png");
	$img_width = 701;
	$img_height = 701;
	$dest_image = imagecreatetruecolor($img_width, $img_height);
	$a = imagecreatefrompng("image.png");
	$b = imagecreatefrompng("arrow.png");
	$c = imagecreatefrompng("sides.png");
	$source = $b;
	$sw = imagesx($source);
	$sh = imagesy($source);

	$rotate = imagerotate($source, $degrees, 0);
	$rw = imagesx($rotate);
	$rh = imagesy($rotate);
		
	$croppedarrow = imagecrop($rotate, array(
		'x' => $rw * (1 - $sw / $rw) * 0.5,
		'y' => $rh * (1 - $sh / $rh) * 0.5,
		'width' => $sw,
		'height'=> $sh
	));

	imagecopy($dest_image, $a, 0, 0, 0, 0, $img_width, $img_height);
	imagecopy($dest_image, $croppedarrow, 0, 0, 0, 0, $img_width, $img_height);
	imagecopy($dest_image, $c, 0, 0, 0, 0, $img_width, $img_height);

	header('Content-Type: image/png');
	imagepng($dest_image,"compass.png");
   }
	
	
	
	
	
?>
