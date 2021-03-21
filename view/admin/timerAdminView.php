<h1>Countdown Timer</h1>
<hr>


<div id="adminTimeTabs">
    <ul id="CT_tabsAdmin">
    <li><a class="nav-tab" href="#TimeTab"><span>DURATION TIME</span> </a> </li>
    <li><a class="nav-tab" href="#DateTab"><span>DATE & TIME</span> </a> </li>
    <!-- <li><a class="nav-tab" href="#UserTab"><span>USER</span> </a> </li> -->
    </ul>
    <hr style="clear:both; margin-top:0px;"/>

<!-- -->
  
  <div id="TimeTab">   
    
    <h1> DURATION TIME </h1>
    Name:      <input type="text" name="CTtimename" id="CTtimename" placeholder="workout">   
    <p>
        
        Hours:     <input type="number" name="CTTsethour" id="CTsethour" min="0" max="24">
        Minutes:   <input type="number" name="CTsetmin" id="CTsetmin" min="0" max="60">
        Seconds:   <input type="number" name="CTsetsec" id="CTsetsec" min="0" max="60">
        <button id="CTgettime"type="submit">Set Time</button>
    </p>
  <!--<div id="numbImg">
      
      <h1>Ex.</h1>
      <img id="hourNumb1" src="php echo $plugin; ?>/images/Timer_0.png" alt="">
      <img id="hourNumb2"src="?php echo $plugin; ?>/images/Timer_0.png" alt="">
      <img id="semiImg"src="<php echo $plugin; ?>/images/Timer_semi.png" alt="">
      <img id="minNumb1" src="?php echo $plugin; ?>/images/Timer_0.png" alt="">
      <img id="minNumb2"src="<php echo $plugin; ?>/images/Timer_0.png" alt="">
      <img id="semiImg"src="<php echo $plugin; ?>/images/Timer_semi.png" alt="">
      <img id="secNumb1" src="?php echo $plugin; ?>/images/Timer_0.png" alt="">
      <img id="secNumb2"src="?php echo $plugin; ?>/images/Timer_0.png" alt="">
        
  </div>-->
  <br>
  <div>
    <h1>Ex. <span id="CTshowtimer" class="displayCTtime"> </span></h1>
  </div>
   
  </div>

<!-- -->

  <div id="DateTab">
    
    <h1> DATE & TIME </h1> 
    <input type="time" name="CTsettime" id="CTsettime"> 
    <input type="date" name="CTsetdate" id="CTsetdate">
    <button id="GTTgetdate"type="submit">Set Date</button>
   
    <div id="dateImg">
       <h1>Ex. <span id="CTshowdate" class="displayCTtime">  </span></h1>
      
  </div>
  </div>

</div>



    <?php
  echo $dir;
    ?>

