jQuery.noConflict();
(
  function($)
  {
    var pluginStr='/testmode/wp-content/plugins/testplugin/';
    var hourVal=0;
    var minVal=5;
    var secVal=0;
    var userName = $('#CTtimename');
    var hourStr;
    var minStr;
    var secStr;
    var countdownticker = -1;
    var imgArray = new Array(
      pluginStr+'images/Timer_0.png',
      pluginStr+'images/Timer_1.png',
      pluginStr+'images/Timer_2.png',
      pluginStr+'images/Timer_3.png',
      pluginStr+'images/Timer_4.png',
      pluginStr+'images/Timer_5.png',
      pluginStr+'images/Timer_6.png',
      pluginStr+'images/Timer_7.png',
      pluginStr+'images/Timer_8.png',
      pluginStr+'images/Timer_9.png'
    );

    //creates the tabs in view using jquery css
    $('#adminTimeTabs').tabs();
    //display time on admin;
    //displaytime();
    //function of grabbing the numbersfrom user and displaying them on click.
  
    $(document).ready(function(){

      $("#CTgettime").click(function() {getCTtime();}); 
      //function starting the function on click
      $("#startCTtimer").click(function() {startCTtimer();});
      //funciton stopping the timer on click
      $("#stopCTtimer").click(function() {stopCTtimer();});
  
    function getCTtime()
    {   
       
        hourVal = $("#CThour").val();
        minVal = $("#CTminute").val();
        secVal = $("#CTsecond").val();
        //stopCTtimer();
        $.ajax(
          {
            url: AU_TimerAdminObj.ajax_url,
            data:
            {
              _ajax_nonce: AU_TimerAdminObj.CTTimeNonce,
              action: "getTimertimes",
              cur_name: userName,
              cur_hour: hourVal,
              cur_min: minVal,
              cur_sec: secVal
            },
            type: "POST",
            dataType: "json",
            success: function(jsonData) {saveNewTimer(jsonData);},
            error: function(){ newTimerErr()}
          }
        )

        function saveNewTimer(jsonData)
        {
          console.log(jsonData.msgType);
        }

        function newTimerErr()
        {
          console.log("nobueno");
        }

        //console.log("letsGo");
        displaytime();
    }  
    function startCTtimer()
    {
      //console.log("That's All Folks");
      countdownticker = setInterval(countdowntimer, 1000);
    }
    function stopCTtimer()
    {
      clearInterval(countdownticker);
    }
    function countdowntimer()
    {
        if(secVal<1)
        {
          if(minVal<1)
          {
            if((hourVal+minVal+secVal)<1)
            {
              $('#CTshowtimer').text("That's All Folk's");
              stopCTtimer();
            }
            else
            {
              hourVal = hourVal - 1;
              minVal = 59;
              secVal = 59;
              displaytime();
            }
          }
          else
          {
            minVal = minVal - 1;
            secVal = 59;
            displaytime();
          }
        }
        else
        {
          secVal = secVal - 1;
          displaytime();

        }
        
    }
    function displaytime()
        {
          if (hourVal < 10 )
          {
              hourStr = "0" + hourVal;
          }
          else if(hourVal > 24)
          {
             hourVal = 24;
             hourStr = hourVal;
             $('#CThour').val(hourVal);
          }
          else
          {
            hourStr = hourVal;
          }
               
            
          if (minVal < 10 )
          {
            minStr = "0" + minVal;
          }
          else if (minVal > 60)
          {
            minVal = 60;
            minStr = minVal;
            $('#CTminute').val(minVal);
          }
          else
          {
            minStr = minVal;
          }
            
                       
          if (secVal < 10)
          {
            secStr = "0" + secVal;
          }
          else if (secVal > 60)
          {
            secVal = 60;
            secStr = secVal;
            $('#CTsecond').val(secVal);
          }
          else
          {
            secStr = secVal;
          }
            
            
            //console.log(hourVal + ":" + minVal + ":" + secVal);

            //displays time on modal under set time.
            $("#CTshowtimer").text(hourStr + ":" + minStr + ":" + secStr);
            //console.log($('#GTTshowtimer').text());
            //displayVal.text = val(hourVal + " : " + minVal + " : " + secVal);
            //displayVal.style.display = "block";
            //String.split(hourStr);

            //console.log(hourStr);
            //console.log(minStr);
            //console.log(secStr);
            hourStr = hourStr + " ";
            minStr = minStr + " ";
            secStr = secStr + " ";
/*
            hourArr = hourStr.split("");

            console.log(hourArr);
            console.log("Hour 1: " + hourArr[0]);
            console.log("Hour 2: " + hourArr[1]);

            var minArr = minStr.split("");

            console.log(minArr);
            console.log("Minute 1; " + minArr[0]);
            console.log("minute 2: " + minArr[1]);

            var secArr = secStr.split("");




            console.log(secArr);
            console.log("Second 1: " + secArr[0]);
            console.log("Second 2: " + secArr[1]);
            
            //$("#minNumb2").attr("src", "images/Timer_1.png");
            $("#hourNumb1").attr("src",styledDisplay(hourStr[0]));
            $("#hourNumb2").attr("src",styledDisplay(hourStr[1]));

            $("#minNumb1").attr("src",styledDisplay(minStr[0]));
            $("#minNumb2").attr("src",styledDisplay(minStr[1]));

            $("#secNumb1").attr("src",styledDisplay(secStr[0]));
            $("#secNumb2").attr("src",styledDisplay(secStr[1]));
*/
    }
    function styledDisplay(numbStr)
        {
          var imgStr;
 
          switch (numbStr)
          {
             case "0":
                   {
                     imgStr = imgArray[0];
                   }
             break;
             
             case "1":
                   {
                     imgStr = imgArray[1];
                   }
             break;
             
             case "2":
                   {
                     imgStr = imgArray[2];
                   }
             break;
             
             case "3":
                   {
                     imgStr = imgArray[3];
                   }
             break;
             
             case "4":
                   {
                     imgStr = imgArray[4];
                   }
             break;
             
             case "5":
                   {
                     imgStr = imgArray[5];
                   }
             break;
             
             case "6":
                   {
                     imgStr = imgArray[6];
                   }
             break;
             
             case "7":
                   {
                     imgStr = imgArray[7];
                   }
             break;
 
             case "8":
                   {
                     imgStr = imgArray[8];
                   }
             break;
 
             case "9":
                   {
                     imgStr = imgArray[9];
                   }
             break;
          }
          
          return imgStr;
    }
         console.log('2');
         displaytime();
         startCTtimer();
    //console.log(imgArray);
  });
//======================================================================================
  }

)(jQuery);