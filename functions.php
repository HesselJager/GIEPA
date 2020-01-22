<?php


	$USER_USERNAME = "user";
	$USER_PASSWORD = '$argon2i$v=19$m=1024,t=2,p=2$RGVNME4weFFwMmMyd01IZw$a28OeXYplLovOamT/0VITKf3kMsWi+mQVMJjAVKlxcw'; // GAINEXPRAG2020

	function verify_login($username, $password) {
		global $USER_USERNAME, $USER_PASSWORD; 
		if(password_verify($password, $USER_PASSWORD) == 1 && $username == $USER_USERNAME) {
			return true;
		}
		else{
			return false;
		}
	}

	function check_login() {
		if(!isset($_SESSION['logged_in'])) {
			header('location: index.php');
		}
	}
$allowed_stations = array(617010, 85940, 619020, 889030, 888890, 888900, 888910, 689060);
	function check_station($station) {
		global $allowed_stations;
		
	
		if(in_array($station, $allowed_stations)) {
			return true;
		} else {
			return false;
		}
	}
	





/*This array will hold the required data for the weather application, 
in the form of a measurement object
The key is the stationnumber, the value is an array of the measurement objects belonging to the 
station, holding this stationnumber.
*/
$measurements=array_fill_keys($allowed_stations,array());


//This class creates a measurement object, which holds data of a measuremnt in a weatherstation
class Measurement{
    public $stn;
    public $date_and_time;
    public $temp;
    public $wdsp;
    public $wnddir; 
}






	/*This function parses an xml file and filters based on the stationnumber
	 If the stationnumber belongs to a station that is needed an object will be created 
	 The object will be put in the measurements array
	*/

	function parse_xml($xml_file){
		global $measurements;
		$xml = simplexml_load_file($xml_file);
		
		foreach($xml->children() as $child){
            
                
                
                  $measurement =new Measurement();
                  $measurement->stn=intval($child->STN);
				  $measurement->date_and_time=date_create($child->DATE." ".$child->TIME);
                  $measurement->temp=floatval($child->TEMP);
                  $measurement->wdsp=floatval($child->WDSP);
                  $measurement->wnddir=floatval($child->WNDDIR);
                  $measurements[$measurement->stn]=array_merge($measurements[$measurement->stn],array($measurement));
			      
       
                
            
            
		}
		
	}
/*
This function reads an directory of xml_files and uses the parse_xml function al these files
*/
function parse_xml_dir($dir){
	$dir=$dir."/";
	
	if (is_dir($dir)){
		 if ($dh = opendir($dir)){
    while (($file = readdir($dh)) !== false){
		if(check_station(intval(substr($file,0,-4) ))){
		parse_xml($dir.$file);
		}
    }
    closedir($dh);
       }
		
		
		
	}
	
	
	
}
/*
This function sorts and array that holds multiple $measurement objects based on the date and time

*/
function time_based_sort($array){
	
}
         




	

?>
