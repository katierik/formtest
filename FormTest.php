<?php
    session_start();
    include 'setup.php';

    //Counting which round we're on
    $count = $_SESSION["count"];

    //Send out to get the correct CSS for the current value in the testList.
    $css = getCSS($_SESSION["testList"][$count]);  

    //Grab the start time and put it in an array to keep track
    $_SESSION["resultsStartTime"][$_SESSION["count"]] = microtime(true);

    //Determining where to go next is in the form action
    $ran = mt_rand();

?>

<html>


    <head>
        <!--<link rel="stylesheet" type="text/css" href="testprototype.css" />-->
        <link rel="stylesheet" type="text/css" href="formdesign-base.css" />
        <!--Grab CSS based on the random case determined on the index -->
        <link rel="stylesheet" type="text/css" href="<?php echo ($css) ?>" />
        <link rel="stylesheet" type="text/css" href="controls.css" />

        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="setup.js"></script>
        
        <script>
            var startTime;
            
            $( document ).ready(function() {
                //set time on load
                startTime = Date.now();
                console.log(startTime);
                checkUncheck();
            });
            
            function endTimer() {
                //Caluculate the time between starting and clicking "submit"
                var totalTime = (Date.now() - startTime)/1000;
                console.log(totalTime);
                //Add the value to the form
                document.getElementById("timeHolder").value = totalTime;
                console.log(document.getElementById("timeHolder").value);

            }
            
            function checkUncheck(){
                $('#workatpega').click(function(){
                    if (this.checked){
                        $('.conditional').css({"display":"inline-block"});
                    }
                    else{
                        $('.conditional').css({"display":"none"});
                    }
                })
            }
            
            // Currently ENTER/RETURN submits a form when focuses on checkboxes or radios. Breaks many users mental model of selecting items in a list. Now it selects the item instead.
            function stopRKey(evt) {
               var evt = (evt) ? evt : ((event) ? event : null);
               var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
                if(evt.keyCode == 13 && $(':focus[type="checkbox"],:focus[type="radio"]')){
                  $(':focus').click();
                   return false;
               }
            }
            jQuery.fn.ready(function($){
              document.onkeypress = stopRKey;   
            });
            
        </script>
       

        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        
        <title>Form</title>
        
        </head>


    <body>
 <div id="content">
        <h1>Information about you!</h1>
        <form method="post" id="formTest" action="<?php echo whereTo($_SESSION["count"]) ?>">
            <input type="text" class="hidden" id="timeHolder" name="time" />
           
            <div class="questionblock block1">
                <div class="headerblock">
                    <h2>Personal</h2>
                </div>
              
                <!-- NAME -->
                
                <div class="question smartCondensed">
                    <div class="row">
                        <div class="part">
                            <label for="first<?php echo $ran ?>name">First name</label>
                            <input type="text" name="first<?php echo $ran ?>name" id="first<?php echo $ran ?>name" autocomplete="off"> 
                        </div>
                        <div class="part">
                            <label for="last<?php echo $ran ?>name">Last name</label>
                            <input type="text" name="last<?php echo $ran ?>name" id="last<?php echo $ran ?>name" autocomplete="off">
                        </div>
                    </div>     
                </div>
                     
                <div class="question noSmartCondensed part">
                    <label for="first<?php echo $ran ?>name">First name</label>
                    <input type="text" name="first<?php echo $ran ?>name" id="first<?php echo $ran ?>name" autocomplete="off"> 
                </div>
                <div class="question noSmartCondensed part">
                    <label for="last<?php echo $ran ?>name">Last name</label>
                    <input type="text" name="last<?php echo $ran ?>name" id="last<?php echo $ran ?>name" autocomplete="off">
                </div>
                
                <!-- End NAME -->
                <!-- ADDRESS -->
            
                <div class="question long smartCondensed">
                    <div class="part">
                        <label for="address">Your address</label>
                        <input type="text" name="address" id="address" autocomplete="off"> 
                    </div>
                    <div class="row">
                        <div class="part">
                            <label for="city">City</label>
                            <input type="text" name="city" id="city" autocomplete="off"> 
                        </div>

                        <div class="part">
                            <label for="state">State</label>
                            <input type="text" name="state" id="state" autocomplete="off"> 
                        </div>
                            
                        <div class="part short">    
                            <label for="zip">Zip</label>
                            <input class="short" type="text" name="zip" id="zip" autocomplete="off"> 
                        </div>
                    </div>
                </div>
        
                <div class="question noSmartCondensed part">
                    <label for="address">Your address</label>
                    <input type="text" name="address" id="address" autocomplete="off"> 
                </div>
                <div class="question noSmartCondensed part">
                    <label for="city">City</label>
                    <input type="text" name="city" id="city" autocomplete="off"> 
                </div>
                <div class="question noSmartCondensed part">
                    <label for="state">State</label>
                    <input type="text" name="state" id="state" autocomplete="off"> 
                </div>
                <div class="question noSmartCondensed part"> 
                    <label for="zip">Zip</label>
                    <input class="short" type="text" name="zip" id="zip" autocomplete="off"> 
                </div>
                
                <!-- End ADDRESS -->
    
                <div class="question">
                    <div class="part">
                        <label for="phonenum">Your phone number</label>
                        <input type="text" name="phonenum" id="phonenum" autocomplete="off"> 
                    </div>
                </div>
                
                <div class="question radio">
                    <div class="part">
                        <label for="dogscats">Do you prefer dogs or cats?</label>
                        <div class="radiogroup">
                            <input type="radio" name="dogscats" id="dogs" autocomplete="off"> Dogs <br/>
                            <input type="radio" name="dogscats" id="cats" autocomplete="off"> Cats  <br/>
                            <input type="radio" name="dogscats" id="both" autocomplete="off"> Both! <br/>
                            <input type="radio" name="dogscats" id="neither" autocomplete="off"> Neither<br/>
                        </div>
                    </div>
                </div>
                
                
                
            </div>


            <div class="questionblock block2">
                <div class="headerblock">
                    <h2>Fun facts</h2>
                </div>
                
                <div class="question">
                    <div class="part">
                        <label for="color1">What does the combination of <span class="blue">blue</span> and <span class="yellow">yellow</span> make?</label>
                        <input type="text" name="color1" id="color1" autocomplete="off"> 
                    </div>
                </div>
                
                <div class="question">
                    <div class="part">
                        <label for="color2">What does the combination of <span class="red">red</span> and <span class="blue">blue</span> make?</label>
                        <input type="text" name="color2" id="color2" autocomplete="off"> 
                    </div>
                </div>
                
                <div class="question">
                    <div class="part">
                        <label for="color3">What does the combination of <span class="yellow">yellow</span> and <span class="red">red</span> make?</label>
                        <input type="text" name="color3" id="color3" autocomplete="off"> 
                    </div>
                </div>
                
                <div class="question radio">
                    <div class="part">
                        <label for="location1">Where is the sky located?</label>
                        <div class="radiogroup">
                            <input type="radio" name="location1" id="above" autocomplete="off"> Above me <br/>
                            <input type="radio" name="location1" id="below" autocomplete="off"> Below me  <br/>
                            <input type="radio" name="location1" id="noidea" autocomplete="off"> No idea <br/>
                        </div>
                    </div>
                </div>
                
                <div class="question radio">
                    <div class="part">
                        <label for="location2">Where is the ground located?</label>
                        <div class="radiogroup">
                            <input type="radio" name="location2" id="above" autocomplete="off"> Above me <br/>
                            <input type="radio" name="location2" id="below" autocomplete="off"> Below me  <br/>
                            <input type="radio" name="location2" id="noidea" autocomplete="off"> No idea <br/>
                        </div>
                    </div>
                </div>
                

                <div class="question">
                    <div class="part">
                        <label for="cat">What noise does a cat make?</label>
                        <input type="text" name="cat" id="cat" autocomplete="off"> 
                    </div>
                </div>
                
                <div class="question">
                    <div class="part">
                        <label for="dog">What noise does a dog make?</label>
                        <input type="text" name="dog" id="dog" autocomplete="off"> 
                    </div>
                </div>

                <div class="question">
                    <div class="part">
                        <label for="cow">What noise does a cow make?</label>
                        <input type="text" name="cow" id="cow" autocomplete="off"> 
                    </div>
                </div>
 
            </div>
            
            <div class="questionblock block3">
                <div class="headerblock">
                    <h2>Work</h2>
                </div>
                

                <div class="question">
                    <div class="part">
                        <label for="job<?php echo $ran ?>title">What is your job?</label>
                        <input type="text" name="job<?php echo $ran ?>title" id="job<?php echo $ran ?>title" autocomplete="off"> 
                    </div>
                </div>
                
                <div class="question">
                    <div class="part checkbox">
                        <input type="checkbox" name="workatpega" id="workatpega" autocomplete="off">
                        <label for="workatpega"> I work at Pegasystems </label>
                    </div>
                </div>

                    <div class="question short conditional">
                        <div class="part">
                            <label for="yearsatpega">How many years have you worked at Pega?</label>
                            <input type="text" name="yearsatpega" id="yearsatpega" autocomplete="off"> 
                        </div>
                    </div>

                    <div class="question conditional">
                        <div class="part">
                            <label for="sitsclose">Who sits closest to you?</label>
                            <input type="text" name="sitsclose" id="sitsclose" autocomplete="off"> 
                        </div>
                    </div>
                
                    <div class="question short conditional">
                        <div class="part">
                            <label for="floor">Which floor do you sit on?</label>
                            <input type="text" name="floor" id="floor" autocomplete="off"> 
                        </div>
                    </div>
                
                    <!-- NAME -->

                    <div class="question smartCondensed conditional">
                        <div class="row">
                            <div class="part">
                                <label for="first<?php echo $ran ?>name">Pega CEO first name</label>
                                <input type="text" name="first<?php echo $ran ?>name" id="first<?php echo $ran ?>name" autocomplete="off"> 
                            </div>
                            <div class="part">
                                <label for="last<?php echo $ran ?>name">Pega CEO last name</label>
                                <input type="text" name="last<?php echo $ran ?>name" id="last<?php echo $ran ?>name" autocomplete="off">
                            </div>
                        </div>     
                    </div>

                    <div class="question noSmartCondensed part conditional">
                        <label for="first<?php echo $ran ?>name">Pega CEO first name</label>
                        <input type="text" name="first<?php echo $ran ?>name" id="first<?php echo $ran ?>name" autocomplete="off"> 
                    </div>
                    <div class="question noSmartCondensed part conditional">
                        <label for="last<?php echo $ran ?>name">Pega CEO last name</label>
                        <input type="text" name="last<?php echo $ran ?>name" id="last<?php echo $ran ?>name" autocomplete="off">
                    </div>

                    <!-- End NAME -->

                    <!-- ADDRESS -->

                    <div class="question long smartCondensed conditional">
                        <div class="part">
                            <label for="address">Pega's address</label>
                            <input type="text" name="address" id="address" autocomplete="off"> 
                        </div>
                        <div class="row">
                            <div class="part">
                                <label for="city">City</label>
                                <input type="text" name="city" id="city" autocomplete="off"> 
                            </div>

                            <div class="part">
                                <label for="state">State</label>
                                <input type="text" name="state" id="state" autocomplete="off"> 
                            </div>

                          
                        </div>
                    </div>

                    <div class="question noSmartCondensed conditional part">
                        <label for="address">Pega's address</label>
                        <input type="text" name="address" id="address" autocomplete="off"> 
                    </div>
                    <div class="question noSmartCondensed conditional part">
                        <label for="city">City</label>
                        <input type="text" name="city" id="city" autocomplete="off"> 
                    </div>
                    <div class="question noSmartCondensed part conditional ">
                        <label for="state">State</label>
                        <input type="text" name="state" id="state" autocomplete="off"> 
                    </div>
                   

                    <!-- End ADDRESS -->

                

            </div>
            
            
        <button id="submit" onClick="endTimer()">Submit</button>
            
        </form>
        </div>
    </body>





</html>