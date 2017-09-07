<?php 


class Db{
	protected static $connection;

	public function connect(){
		    // Try and connect to the database
        if(!isset(self::$connection)) {
            // Load configuration as an array. Use the actual location of your configuration file
            $config = parse_ini_file('./config.ini'); 
            self::$connection = new mysqli('localhost',$config['username'],$config['password'],$config['dbname']);
        }

        // If connection was not successful, handle the error
        if(self::$connection === false) {
            // Handle error - notify administrator, log to a file, show an error screen, etc.
            return false;
        }
        return self::$connection;
	}

	public function query($query) {
        // Connect to the database
        $connection = $this -> connect();

        // Query the database
        //echo nl2br("\nThe query is:\n");
        //echo $query;
        $result =  mysqli_query($connection, $query);
       // echo $result;
        //$this->show_result($result);
        return $result;
    }

    public function show_result($result)
    {   
    	if (mysqli_num_rows($result) > 0) {
    // output data of each row
    		while($row = mysqli_fetch_assoc($result)) {
    			 echo nl2br("\nThe query result is:\n");
        		print_r($row);
    		}
		} else {
    		echo "0 results";
		}
    }

    public function fetch_data($source)
    {
        $array=[];
        $i =0;

        if (mysqli_num_rows($source) > 0) 
        {
            while($row = mysqli_fetch_assoc($source)) 
            {
                 $array[$i]=$row;
                 $i++;
            }
        }

        return $array; 
    }
}
/*	
This file defines the function used for connecting database.
Including connect database and authorised.
Created by: Amy XIE 2017
*/

?>