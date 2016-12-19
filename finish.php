<?php

    session_start();
    include 'setup.php';
    $image1 = getImage($_SESSION["testList"][0]);
    $desc1 = getDescription($_SESSION["testList"][0]);
    $image2 = getImage($_SESSION["testList"][1]);
    $desc2 = getDescription($_SESSION["testList"][1]);

    //Record the time
    $_SESSION["resultsTime"][1] = $_POST["time"];
?>

<html>


    <head>
        
        <link rel="stylesheet" type="text/css" href="formdesign-base.css" />
        <link rel="stylesheet" type="text/css" href="testprototype.css" />
        <link rel="stylesheet" type="text/css" href="controls.css" />
              
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="timezone.js"></script>
       
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        
        <title>Form test</title>
        
        <script>
    
            $( document ).ready(function() {
                
                //Calculate timezone
                document.getElementById("timezone").value = calculate_time_zone();
                
                //Hide the no preference checkboxes as we don't need them yet
                $("#nopref").addClass("hidden");  
                             
                //Shows&hides the appropriate checkbox group based on what radio button was selected for preference
                $("#preferenceRadio input[type=radio]").change(function(){ 
                    var selection= $("#preferenceRadio input[type='radio']:checked").val();
                    
                    //if it is not a test, show no pref group
                    if (selection=="notsure" | selection=="neither"){
                        $("#nopref").removeClass("hidden");
                        $("#pref").addClass("hidden");
                        //Inside this, also show the appropriate label
                        if(selection=="notsure"){
                            $("#notSure").removeClass("hidden");
                            $("#norem").removeClass("hidden");
                            $("#neither").addClass("hidden");
                        }
                        if(selection=="neither"){
                            $("#notSure").addClass("hidden");
                            $("#norem").addClass("hidden");
                            $("#neither").removeClass("hidden");
                        }
                    }
                    else{ //if the user selected a test, show the pref group
                        $("#nopref").addClass("hidden");
                        $("#pref").removeClass("hidden");
                    }
                
                });
                
            });
                
            
        </script>
        
    </head>
    
    <body>
    
    <div id="content">
        
        <h1>Thanks for finishing!</h1>
        <p>You filled out your information using two different layouts. Before you're finished and entered into a drawing for a $100 Amazon gift card, we have a few questions about these layouts.</p>
        <div id="choices">
                <div class="option">
                    <div class="header"><h2>Round 1</h2></div>
                    <div class="optionContent"><img src="<?php echo $image1 ?>"/></div>
                    <div class="description"><?php echo $desc1 ?></div>
                </div>
                <div class="option">
                    <div class="header"><h2>Round 2</h2></div>
                    <div class="optionContent"><img src="<?php echo $image2 ?>"/></div>
                    <div class="description"><?php echo $desc2 ?></div>
                </div>
            </div>
        
        <form id="preference" name="preference" method="post" action="form-to-email.php"> 
            

            <input id="timezone" type="text" class="hidden">
            
            <label>Which of these form layouts did you prefer to fill out?</label>
          
            <div id="preferenceRadio">
                <input type="radio" name="preference" value="test<?php echo $_SESSION["testList"][0]?>"> Round 1 <br/>
                <input type="radio" name="preference" value="test<?php echo $_SESSION["testList"][1]?>"> Round 2 <br />
                <input type="radio" name="preference" value="notsure"> Not sure <br />
                <input type="radio" name="preference" value="neither"> I didn't like either option <br />
            </div>
            <br/>
            
            <div id="pref" class="aClass">
                <label for="reason" id="pickedOne">Why did you prefer this layout? (Pick all that apply)</label>
                <input type="checkbox" id="pref" name="pref[]" value="thiseasy" />It was easy <br />
                <input type="checkbox" id="pref" name="pref[]" value="thisfast" />It was fast <br />
                <input type="checkbox" id="pref" name="pref[]" value="thisnatural" />It felt natural <br />
                <input type="checkbox" id="pref" name="pref[]" value="thispredictable" />It was predictable <br />
                <input type="checkbox" id="pref" name="pref[]" value="otherdifficult" />The other one was difficult <br />
                <input type="checkbox" id="pref" name="pref[]" value="otherslow" />The other one was slow <br />
                <input type="checkbox" id="pref" name="pref[]" value="other" />Other (please explain below) <br />
                <br />
            </div>
            
            <div id="nopref" class="aClass">
                <label for="reason" id="notSure">Why are you not sure? (Pick all that apply)</label>
                <label for="reason" id="neither" class="hidden">Why did you dislike both? (Pick all that apply)</label>
                <input type="checkbox" id="nopref" name="nopref[]" value="nodifference" />Couldn’t tell the difference <br />
                <input type="checkbox" id="nopref" name="nopref[]" value="noremember" /> I don't remember them <br />
                <input type="checkbox" id="nopref" name="nopref[]" value="botheasy" />Both were easy <br />
                <input type="checkbox" id="nopref" name="nopref[]" value="bothdifficult" />Both were difficult <br />
                <input type="checkbox" id="nopref" name="nopref[]" value="bothfast" />Both were fast <br />
                <input type="checkbox" id="nopref" name="nopref[]" value="bothslow" />Both were slow <br />
                <input type="checkbox" id="nopref" name="nopref[]" value="bothnatural" />Both felt natural <br />
                <input type="checkbox" id="nopref" name="nopref[]" value="other" />Other (please explain below) <br />
                <br />
            </div>

            
            <label for="comments">Do you have any other comments?</label>
            <textarea id="comments" name="comments" rows="4" cols="100"></textarea>
            <br/><br/>
            <label for="email">Enter your email if you'd like to be entered to win a $100 Amazon gift card</label>
            <input id="email" name="email" type=email /><br/>
            
            <button>Submit</button>
        
        </form>
        
        
        
    </div>
    
    
    </body>

</html>