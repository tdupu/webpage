<?php
    
    /*
     
     AUTHOR: TAYLOR DUPUY
     DATE: September 2020
     
     
     *web_constants.json needs to be modified for the particular course this file is for.
     git is set to upload rename_to_web_constants.json
     it should be copied to a file web_constants.json and the entries need to be modified.
     target_dir is the path the the uploads
     path_to_dev is the path to the folder above submission_tools
     path_to_data is the path that should be the same as PATH_TO_DATA
     
     
     *target_dir needed a chmod +w
     
     *on your server the php.ini file needs to be set to upload
     
     *a good command for debugging
     
         echo "<pre>";
         print_r($_FILES);
         echo "</pre>";
     
     *One can run
     
        which python3
     
     to get a version of the python3 we need to use.
        
        /usr/bin/python3
     
     */
    
    $mystring0 = file_get_contents("web_constants.json");
    $CONSTANTS = json_decode($mystring0,true);
   
    $target_dir = $CONSTANTS['target_dir'];
    echo($target_dir);
    $path_to_dev = $CONSTANTS['path_to_dev'];
    $path_to_data = $CONSTANTS['path_to_data'];
    
    $mystring = file_get_contents($path_to_data . "variables.json");
    $variables = json_decode($mystring,true);
    #echo($variables);
    $testing_mode = $variables["testing"];
    #echo($testin_mode);
    
if ($variables["server_down"]==1){
     
    echo "the server is down. some scripts are running on the data. try back in 10 minutes. <br>";
        
} elseif (!isset($_POST['conduct'])) {
    
    echo "please certify code of conduct. <br>";
    
} else {
    
    $filename1 =basename($_FILES["file1"]["name"]);
    $filetype1 = $_FILES["file1"]["type"];
    $filename2 =basename($_FILES["file2"]["name"]);
    $filetype2 = $_FILES["file2"]["type"];
    $filename3 =basename($_FILES["file3"]["name"]);
    $filetype3 = $_FILES["file3"]["type"];
    $filename4 =basename($_FILES["file4"]["name"]);
    $filetype4 = $_FILES["file4"]["type"];
    $filename5 =basename($_FILES["file5"]["name"]);
    $filetype5 = $_FILES["file5"]["type"];
    
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
    
    $data2 = array();
    
    if($filename1==""){
        $data2[1]=0;
    } elseif($filetype1 != "application/pdf") {
        $data2[1]=0;
    } else {
        $data2[1]=1;
    }
    
    if($filename2==""){
        $data2[2]=0;
    } elseif($filetype2 != "application/pdf") {
        $data2[2]=0;
    } else {
        $data2[2]=1;
    }
    
    if($filename3==""){
        $data2[3]=0;
    } elseif($filetype3 != "application/pdf") {
        $data2[3]=0;
    } else {
        $data2[3]=1;
    }
    
    if($filename4==""){
        $data2[4]=0;
    } elseif($filetype4 != "application/pdf") {
        $data2[4]=0;
    } else {
        $data2[4]=1;
    }
    
    if($filename5==""){
        $data2[5]=0;
    } elseif($filetype5 != "application/pdf") {
        $data2[5]=0;
    } else {
        $data2[5]=1;
    }
    
    
    $mydata = strip_tags($_POST['jojo']);
    if(isset($mydata)) {
        
        //writing to JSON file
        $postJSON = json_encode($postData);
        $temp_file_path = $path_to_data . "temp.json";
        unlink($temp_file_path); #DELETES STUFF, DO NOT MODIFY
        $fp = fopen($temp_file_path, 'a');
        fwrite($fp, $postJSON);
        fclose($fp);
        
        $dataJSON2 = json_encode($data2);
        $temp_file_path = $path_to_data . "temp2.json";
        unlink($temp_file_path); #DELETES STUFF, DO NOT MODIFY
        $fp = fopen($temp_file_path, 'a');
        fwrite($fp, $dataJSON2);
        fclose($fp);

         /*
         We had a fiasco with discrepancies between PHP paths and python paths.
         This is what you are seeing.
         The solution was to hard code the paths.
         This is going to a bitch when we move it to the server.
         
         shell_exec
         system
         exec
         shell_exec
         
         these are the three types of ways to interact with the unix shell.
         "system" outputs the execute code which should return 0 if everything is good.
          
          FOR SECURITY: do NOT modify this to allow user input. that is a big no no.
         */
         
        $shell_command = "python36 " . $path_to_dev . "submission_tools/" . "new_submission.py " . $path_to_data . " $testing_mode";
        #echo($shell_command);
        system($shell_command,$exitstatus); //got an error here about an unexpected "echo"
        
    }
    
    /*
     
     $data3 is list of 0,1's that is produced from_new_submissions.py which tells us if the entry was sucessfully processed.
     
     */
    $mystring3 = file_get_contents($path_to_data . "temp3.json");
    $data3 = json_decode($mystring3,true);
    $user_id = $_POST["netid"];
    
    $uploadOk1 = $data3[1]['uploadOk'];
    $subnumber1 = $data3[1]['submission_number'];
    $assignment1= $_POST['assignment1'];
    $problem1= $_POST['problem1'];
    $pdfname1 = $user_id . "-" . $assignment1  ."-" . $problem1 . ".pdf";
    $target1 = $target_dir . $pdfname1;
    $tmp1 =$_FILES['file1']['tmp_name'];
    
    $uploadOk2 = $data3[2]['uploadOk'];
    $subnumber2 = $data3[2]['submission_number'];
    $assignment2= $_POST['assignment2'];
    $problem2= $_POST['problem2'];
    $pdfname2 = $user_id . "-" . $assignment2  ."-" . $problem2 . ".pdf";
    $target2 = $target_dir . $pdfname2;
    $tmp2 =$_FILES['file2']['tmp_name'];
    
    $uploadOk3 = $data3[3]['uploadOk'];
    $subnumber3 = $data3[3]['submission_number'];
    $assignment3= $_POST['assignment3'];
    $problem3= $_POST['problem3'];
    $pdfname3 = $user_id . "-" . $assignment3  ."-" . $problem3 . ".pdf";
    $target3 = $target_dir . $pdfname3;
    $tmp3 =$_FILES['file3']['tmp_name'];
    

    $uploadOk4 = $data3[4]['uploadOk'];
    $subnumber4 = $data3[4]['submission_number'];
    $assignment4= $_POST['assignment4'];
    $problem4= $_POST['problem4'];
    $pdfname4 = $user_id . "-" . $assignment4  ."-" . $problem4 . ".pdf";
    $target4 = $target_dir . $pdfname4;
    $tmp4 =$_FILES['file4']['tmp_name'];
    
    $uploadOk5 = $data3[5]['uploadOk'];
    $subnumber5 = $data3[5]['submission_number']; //got an error here.
    $assignment5= $_POST['assignment5'];
    $problem5= $_POST['problem5'];
    $pdfname5 = $user_id . "-" . $assignment5  ."-" . $problem5 . ".pdf";
    $target5 = $target_dir . $pdfname5;
    $tmp5 =$_FILES['file5']['tmp_name'];
        
    
    // Check if files already exists
    
    echo "<h4> PDF uploads </h4>";
        
    if ($uploadOk1 == 1) {
        if (file_exists($target1)) {
            echo "*assignment " . $assignment1 . ", problem" . $problem1 . " overwritten. <br>";
        }
        if (move_uploaded_file($tmp1, $target1)) {
            echo $filename1 . " uploaded. <br>";
        } else {
            echo "*error. " . $filename1 . " not uploaded. <br>";
        }
    } else {
        echo "<br>";
    }
    
    if ($uploadOk2 == 1) {
        if (file_exists($target2)) {
            echo "*assignment " . $assignment2 . ", problem" . $problem2 . " overwritten. <br>";
        }
        if (move_uploaded_file($tmp2, $target2)) {
            echo $filename2 . " uploaded. <br>";
        } else {
            echo "*error. " . $filename2 . " not uploaded. <br>";
        }
    } else {
        echo "<br>";
    }
    
    if ($uploadOk3 == 1) {
        if (file_exists($target3)) {
            echo "*assignment " . $assignment3 . ", problem" . $problem3 . " overwritten. <br>";
        }
        if (move_uploaded_file($tmp3, $target3)) {
            echo $filename3 . " uploaded. <br>";
        } else {
            echo "*error. " . $filename3 . " not uploaded. <br>";
        }
    } else {
        echo "<br>";
    }
    
    if ($uploadOk4 == 1) {
        if (file_exists($target4)) {
            echo "*assignment " . $assignment4 . ", problem" . $problem4 . " overwritten. <br>";
        }
        if (move_uploaded_file($tmp4, $target4)) {
            echo $filename4 . " uploaded. <br>";
        } else {
            echo "*error. " . $filename4 . " not uploaded. <br>";
        }
    } else {
        echo "<br>";
    }
    
    if ($uploadOk5 == 1) {
        if (file_exists($target5)) {
            echo "*assignment " . $assignment5 . ", problem" . $problem5 . " overwritten. <br>";
        }
        if (move_uploaded_file($tmp5, $target5)) {
            echo $filename5 . " uploaded. <br>";
        } else {
            echo "*error. " . $filename5 . " not uploaded. <br>";
        }
    } else {
        echo "<br>";
    }
    
    
    #in case of an error in the future, make sure nothing else uploads.
    $data3[1]['uploadOk']=0;
    $data3[2]['uploadOk']=0;
    $data3[3]['uploadOk']=0;
    $data3[4]['uploadOk']=0;
    $data3[5]['uploadOk']=0;
    
    $postJSON3 = json_encode($data3);
    $temp_file_path = $path_to_data . "temp3.json";
    unlink($temp_file_path); #DELETES STUFF, DO NOT MODIFY
    $fp = fopen($temp_file_path, 'a');
    fwrite($fp, $postJSON3);
    fclose($fp);
    
    echo "<h6> exit status: </h6>  <p style='font-size:10'>" . $exitstatus . " (if anything other than zero, email tdupuy@uvm.edu with this error message.) </p>";
    
}
?>
