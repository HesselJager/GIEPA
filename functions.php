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
	


/*This array holds the station numbers of the stations that are required in our weatherapplication.
Incoming data will be filtered on these numbers by the function: parse_xml
The numbers must be inserted in string format
*/
$station_numbers=array(); 

/*This array will hold the required data for the weather application, 
in the form of a measurement object
The key for this array must be a number of a weather station, in string format
*/
$measurements=array();


//This class creates a measurement object, which holds data of a measuremnt in a weatherstation
class Measurement{
    public $stn;
    public $date;
    public $time;
    public $temp;
    public $dewp;
    public $stp;
    public $slp;
    public $visib;
    public $wdsp;
    public $prcp;
    public $sndp;
    public $frshtt;
    public $cldc;
    public $wnddir; 
}






	/*This function parses an xml file and filters based on the stationnummer
	 If the stationnumber belongs to a station that is needed an object will be created 
	 The object will be put in the measurements array
	*/

	function parse_xml($xml_file){
		global $station_numbers;
		global $measurements;
		$xml = simplexml_load_file($xml_file);
		
		foreach($xml->children() as $child){
            foreach($station_numbers as $station_id){
                if($station_id==$child->STN){
                
                  $measurement =new Measurement();
                  $measurement->stn=strval($child->STN);
                  $measurement->date=date($child->DATE);
                  $measurement->time=strval($child->TIME);
                  $measurement->temp=floatval($child->TEMP);
                  $measurement->dewp=floatval($child->DEWP);
                  $measurement->stp=floatval($child->STP);
                  $measurement->slp=floatval($child->SLP);
                  $measurement->visib=floatval($child->VISIB);
                  $measurement->wdsp=floatval($child->WDSP);
                  $measurement->prcp=floatval($child->PRCP);
                  $measurement->sndp=floatval($child->SNDP);
                  $measurement->frshtt=intval($child->FRSHTT);
                  $measurement->cldc=floatval($child->CLDC);
                  $measurement->wnddir=floatval($child->WNDDIR);
                  $measurements[$measurement->stn]=$measurement;
               
                    
                }
                
            }
            
		}
		
	}










	

?>
