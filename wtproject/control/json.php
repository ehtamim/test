<?php

	   if(isset($_REQUEST["submit"])){
	   $formdata = array(
	      'firstName'=> $_REQUEST["name"],
	      'userName'=> $_REQUEST['username'],
	      'email'=>$_REQUEST['email'],
	      'password'=>$_REQUEST['password'],
		
	   );
       $existingdata = file_get_contents('data.json');
       $tempJSONdata = json_decode($existingdata);
       $tempJSONdata[] =$formdata;
       //Convert updated array to JSON
	   $jsondata = json_encode($tempJSONdata, JSON_PRETTY_PRINT);
	   
	   //write json data into data.json file
	   if(file_put_contents("data.json", $jsondata)) {
	        echo "Data successfully saved[JSON] <br>";
	    }
	   else 
	        echo "no data saved";

     $data = file_get_contents("data.json");
	 $mydata = json_decode($data);
	}

	//abc@gmail.com

?>