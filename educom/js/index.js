 $(document).ready(function () {
     
 $(document).bind("contextmenu",function(e){
     return false;
     });
     
         document.onkeypress = function (event) {  
     event = (event || window.event);  
     if (event.keyCode == 123) {  
     return false;  
     }  
     }  
     document.onmousedown = function (event) {  
     event = (event || window.event);  
     if (event.keyCode == 123) {  
     return false;  
     }  
     }  
     document.onkeydown = function (event) {  
     event = (event || window.event);  
     if (event.keyCode == 123) {  
     return false;  
     }  
     } 

 $("#uname").keyup(function () {
     var name = $(this).val();
     if(name == ""){
         $(".check").html('<div class="text-danger">Enter an UserName.</div>');
         $("#signin").hide();
         $("#reset").show();
     }else{
     $.ajax({
         type: "POST",
         url: "check_em_ph.php",
         data: {
             "subind" : 1,
             "uname" : name,
         },
         success: function (data) {
             if(data == 0){
                 $(".check").html('<div class="text-danger">You have alrady submited.</div>');
                 $("#signin").hide();
                 $("#reset").show();
             }
             if(data == 1){
                $(".check").hide();
                 $("#signin").show();
                 $("#reset").hide();
             }
             if(data == 2){
                 $(".check").html('<div class="text-danger">Please enter a valid UserName.</div>');
                 $("#signin").hide();
                 $("#reset").show();
             }
         }
     });
 }
 });
 
 $("#signin").click(function (e) {
     e.preventDefault();
     var name = $("#uname").val();
     if(name == ""){
         $(".check").html('<div class="text-danger">Enter an UserName.</div>');
         $("#signin").hide();
         $("#reset").show();
     }else{
     $.ajax({
         type: "POST",
         url: "attendance.php",
         data: {
             "submit":1,
             "uname" : name,
         },
         success: function (data) {
             if(data == 0){
                 $(".check").html('<div class="text-danger">Sumthing went wrong.</div>');
                 $("#reset").show();
                 $("#signin").hide();
             }
             if(data == 1){
                 $("#uname").trigger("reset");
                 $(".success").show().html('<div class="text-success">Success</div>');
                 $("#signin").hide();
                 $("#reset").show();
             }
         }
     });
 }
 });
     
 });