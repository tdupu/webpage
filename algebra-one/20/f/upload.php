


<?php
    
    /*
    AUTHOR: Taylor Dupuy
    DATE: August, 2020
    
    This code is covered by Gnu public license.
    
    DESCRIPTION OF THE CODE:
     upload.php file that is going to be called from upload.html where students upload files for peer review.
     This is organized and called from my_submissions.py.
     
    INFORMATION ABOUT THIS FILE:
     *This file needs permission to execute new_submission.py. To do this run
     
     chmod +x new_submission.py
     
     *The python script new_submission.py needs a #! statement at the top of its file in order not to be confused about its path. I have no idea what this does.
     
     *For testing: in directory where you want the CLI webserver to be rooted run:
     
     php -S localhost:8000 -c php.ini
     
     or
     
     php -S localhost:8000 -c "file_uploads =On"
     
     the following option sets the root to public_html
     
     -t public_html/
     
     Information about the CLI webserver can be found here:
         
     https://www.php.net/manual/en/features.commandline.webserver.php
     
     Also, when uploads stopped working there was a time when restarting the computer helped.
     
     *The php.ini file should have the following three lines:
     
     file_uploads = On
     max_execution_time = 3M
     upload_max_filesize = 4M
     
     *don't forget your dollar signs when coding in PHP.
    */

    $path_to_data = "../../../../data/algebra-one/20/f/";
    $target_dir = "../../../../data/algebra-one/20/f/uploads/"
    $path_to_dev = "../../../../dev/submission_tools/";
    $python_script_path = "../../../../dev/submission_tools/";
    $python_script_name = "new_submission.py ";
    
    $mystring = file_get_contents($path_to_dev . "variables.json");
    $variables = json_decode($mystring,true);
    

    $fname1 = basename($_FILES["file1"]["name"]); #needs to change
    $target1 = $path_to_data . $user_filename1;
    $type1 = strtolower(pathinfo($fname1,PATHINFO_EXTENSION));
    $tmp1 =$_FILES['file1']['tmp_name'];
    
    if (!isset($postData)) $postData = new stdClass();
    
    $t=time();
    $postData->timestamp = $t;
    $postData->user_id = $_POST["netid"];
    $postData->password = $_POST["password_entry"];
    $postData->password2 = $_POST["password_entry2"];
    $postData->new_password = $_POST["new_password"];
    
    
    $postData->assignment1 = $_POST["assignment1"];
    $postData->problem1 = $_POST["problem1"];
    $postData->assignment2 = $_POST["assignment2"];
    $postData->problem2 = $_POST["problem2"];
    $postData->assignment3 = $_POST["assignment3"];
    $postData->problem3 = $_POST["problem3"];
    $postData->assignment4 = $_POST["assignment4"];
    $postData->problem4 = $_POST["problem4"];
    $postData->assignment5 = $_POST["assignment5"];
    $postData->problem5 = $_POST["problem5"];
      
    $postData->subnumber1 = $_POST["subnumber1"];
    $postData->score1 = $_POST["score1"];
    $postData->review1 = $_POST["review1"];
    $postData->subnumber2 = $_POST["subnumber2"];
    $postData->score2 = $_POST["score2"];
    $postData->review2 = $_POST["review2"];
    $postData->subnumber3 = $_POST["subnumber3"];
    $postData->score3 = $_POST["score3"];
    $postData->review3 = $_POST["review3"];
    $postData->subnumber4 = $_POST["subnumber4"];
    $postData->score4 = $_POST["score4"];
    $postData->review4 = $_POST["review4"];
    $postData->subnumber5 = $_POST["subnumber5"];
    $postData->score5 = $_POST["score5"];
    $postData->review5 = $_POST["review5"];
    $postData->subnumber6 = $_POST["subnumber6"];
    $postData->score6 = $_POST["score6"];
    $postData->review6 = $_POST["review6"];
    $postData->subnumber7 = $_POST["subnumber7"];
    $postData->score7 = $_POST["score7"];
    $postData->review7 = $_POST["review7"];
    $postData->subnumber8 = $_POST["subnumber8"];
    $postData->score8 = $_POST["score8"];
    $postData->review8 = $_POST["review8"];
    $postData->subnumber9 = $_POST["subnumber9"];
    $postData->score9 = $_POST["score9"];
    $postData->review9 = $_POST["review9"];
    $postData->subnumber10 = $_POST["subnumber10"];
    $postData->score10 = $_POST["score10"];
    $postData->review10 = $_POST["review10"];
    
    
    if ($variables["server_down"]==1){
     
        echo "The server is down for maintainence. It should be back up shortly. <br>";
        
        
    } else {
        
        $mydata = strip_tags($_POST['jojo']);
        if(isset($mydata)) {
            
            //writing to JSON file
            $postJSON = json_encode($postData);
            $temp_file_path = $path_to_data . "temp.json";
            unlink($temp_file_path); #DELETES STUFF, DO NOT MODIFY
            $fp = fopen($temp_file_path, 'a');
            fwrite($fp, $postJSON);
            fclose($fp);
            #somehow I need to unlink this or be able to add more entries.
            
            echo("post data to json... <br>");
            echo("running new_submission.py... <br> <br>");
            
            $shell_command = $python_script_path . $python_script_name;
            $pyoutput = shell_exec('python helloworld.py');
            echo($pyoutput);
            
            #$mystring2 = file_get_contents($path_to_data ."temp2.json");
            #$writetofile = json_decode($mystring2,true);
            
            
        }
        

    
    }
    
    

    
    /*
    RUN SCRIPT
     
    WARNING - DO NOT LET USERS PASS DATA TO SHELL!!!
    */
    
    
    /*
    


    $user_filename1 = basename($_FILES["file1"]["name"]);
    $filetype1 = strtolower(pathinfo($user_filename1,PATHINFO_EXTENSION));
    $user_filename2 = basename($_FILES["file2"]["name"]);
    $filetype2 = strtolower(pathinfo($user_filename2,PATHINFO_EXTENSION));
    $user_filename3 = basename($_FILES["file3"]["name"]);
    $filetype3 = strtolower(pathinfo($user_filename3,PATHINFO_EXTENSION));
    $user_filename4 = basename($_FILES["file4"]["name"]);
    $filetype4 = strtolower(pathinfo($user_filename4,PATHINFO_EXTENSION));
    $user_filename5 = basename($_FILES["file5"]["name"]);
    $filetype5 = strtolower(pathinfo($user_filename4,PATHINFO_EXTENSION));
    */
     
    
    
    
     
    /*
    for($x=1; x<=5; $x++){
        if(writetofile[x]==1){
            echo "attempting to upload PDF" . $x . "<br>";
        
            
            // Check if file already exists
            if (file_exists($target_file)) {
                echo "The previous submission will be overwritten..." . "<br>";
              $upload1Ok = 1;
                
                $target_file = $target_dir . $user_id . "-" . $hwnumber . ".pdf";
             
            }
        }
    */
    








    

 



/*
#####################################
  #####################################
  #####################################
  #####################################
  #####################################
 */

/*
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Your file was not uploaded. \n ";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["file1"]["tmp_name"], $target_file)) {
      //echo "I have no idea what is going on";
      echo "The file " . $user_filename . " has been uploaded. <br> Any resubmission will overwrite the current one. <br>";
      //echo "The file has been uploaded. <br> Any resubmission will overwrite the current one.";
      
  } else {
      echo "Sorry, there was an error uploading your file." . "<br>";
  }
*/


/*
 This is code that we need to put in
 $data[] = $_POST['data'];

 $inp = file_get_contents('results.json');
 $tempArray = json_decode($inp);
 array_push($tempArray, $data);
 $jsonData = json_encode($tempArray);
 file_put_contents('results.json', $jsonData);
 */
//echo $postJSON;


//echo $shell_command;
//echo $docFileType;
//$path = $target_dir;
//echo "Path : $path";
//require "$path";

/*
$myObject = new stdClass();
$mySmallerObject = new stdClass();
for($x=1; x<=5; $x++){
    $mySmallerObject->x = x^2;
}
$myObject->ff = $mySmallerObject;
$myObject->gg = "some text";

for($x=1; x<=5; $x++){
    echo("" . x . "" . $myObject['ff'][x])
}
*/


/*
 $myArray = array();
 $mySmallerArray = array();
 for($x=1; $x<=5; $x++){
     $mySmallerArray[x] = x^2;
 }
$myArray["ff"] = $mySmallerArray;
$myArray["gg"] = "some text";
 
 for($x=1; $x<=5; $x++){
     echo("$x $myArray['ff'][x]");
 }
 */

/*
$myArray = array();
$mySmallerArray = array();
 for($x=1; $x<=5; $x++){
     $mySmallerArray[$x] = $x**2; #not $x^2
 }
$myArray["ff"] = $mySmallerArray;
$myArray["gg"] = "some text";
 
#$y = int();
 for($x=1; $x<=5; $x++){
     $y=$myArray['ff'][$x];
     echo("$x $y <br>");
 }*/

?>
