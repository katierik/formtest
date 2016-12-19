<?php
    session_start();
    include 'setup.php';

?>

<html>


    <head>
        <!--<link rel="stylesheet" type="text/css" href="testprototype.css" />-->
        <link rel="stylesheet" type="text/css" href="formdesign-base.css" />
        <!--Grab CSS based on the random case determined on the index -->
        <link rel="stylesheet" type="text/css" href="formdesign-onecol.css" />
        <link rel="stylesheet" type="text/css" href="controls.css" />

        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="setup.js"></script>
        
        <script>
            
            $( document ).ready(function() {
                checkUncheck();
            });
            
            
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
        
        <title>Form practice</title>
        
        </head>


    <body>
 <div id="content">
        <h1>Practice filling out this form</h1>
        <form method="post" id="formTest" action="start.php">
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
                        <label for="color2">What does the combination of <span class="red">red</span> and <span class="blue">blue</span> make?</label>
                        <input type="text" name="color2" id="color2" autocomplete="off"> 
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


                    <div class="question conditional">
                        <div class="part">
                            <label for="sitsclose">Who sits closest to you?</label>
                            <input type="text" name="sitsclose" id="sitsclose" autocomplete="off"> 
                        </div>
                    </div>
                

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