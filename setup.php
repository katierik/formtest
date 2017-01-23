<?php
    //Finds a random number
    function pickValue(){
        //This used to pick between 0 and 5, but since I only want to include option 0, 2 & 3, I'm having it pick between 1-3 and changing 1 to 0 if its picked.
        $min = 1;
        $max = 3; 
        $test = mt_rand($min,$max);
        
        if ($test == 1){
            $test = 0;
        }
        
        
        return $test;
    }
	
    //Make an array of test values
    function pickTests(){        
        $tests[0] = pickValue();
        $tests[1] = pickValue();
        //$tests[2] = pickValue();
        
        //Get rid of 1, 4, 5
        
        while ($tests[1] == $tests[0]){
            $tests[1] = pickValue();
        }
        
        return $tests;    
    }
    
    //Assign a CSS file to each test number and return the CSS based on which test number is given
    function getCSS($testID){
        
        //List all possible tests here
        
        $testList[0] = "formdesign-proposed.css";
        $testList[1] = "formdesign-leftlabels.css";
        $testList[2] = "formdesign-onecoltight.css";
        $testList[3] = "formdesign-onecol.css";
        $testList[4] = "formdesign-twostacked.css";
        $testList[5] = "formdesign-2col.css";
        
        
        //Match testID with the appropriate test
        return $testList[$testID];
        
    }

    function getImage($testID){
        
        //List all images for each test
        $testList[0] = "images/proposed.svg";
        $testList[1] = "images/leftlabels.svg";
        $testList[2] = "images/onecoltight.svg";
        $testList[3] = "images/onecol.svg";
        $testList[4] = "images/twostacked.svg";
        $testList[5] = "images/twocol.svg";
        
        
        //Match testID with the appropriate test
        return $testList[$testID];
        
    }

    function getDescription($testID){
        
        //List all images for each test
        $testList[0] = "Everything was primarily displayed in one column, but things like names and addresses were compressed into a single row";
        $testList[1] = "Everything was in one column, and the labels were on the left.";
        $testList[2] = "Everything was in one column, and very tightly spaced.";
        $testList[3] = "Everything was in one column, with 'traditional' spacing";
        $testList[4] = "Each section was one column of data, and each section took up 1/2 the screen.";
        $testList[5] = "Everything was presented in two columns.";
        
        
        //Match testID with the appropriate test
        return $testList[$testID];
        
    }

    //Figure out if the user needs to go to a middle page, or to the finish
    function whereTo($count){
        if ($count == 0){
            return "middle.php";
        }
        else{
            return "finish.php";
        }
    }

    //Record the time, and then figure out where to go
    function endTest(){
        $_SESSION["resultsEndTime"][$_SESSION["count"]] = microtime(true);
        echo $_SESSION["resultsEndTime"][$_SESSION["count"]];
    }



?>