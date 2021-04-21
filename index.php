<!DOCTYPE html>
<html>
<head>
   <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="style.css">
   <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
  <div class="container bootdey">

     <div class="col-md-12 bootstrap snippets">
     	 <div class="Alerts">
     	 	
     	 </div>
     	 <div class="panel">
     	 	 <div class="panel-body">
     	 	    <div class="form-group">
             <label for="usr">Name:</label>
                <input type="text" class="form-control" id="name_user">
                </div>
                
                <label for="text_user">write something:</label>
                <textarea class="form-control" 
                 placeholder="what are you thinking" id="text_user"></textarea>

                <div id="mar-top clearfix">
                 <button type="submit" id="Insert" class="btn btn-sm btn-primary pull-right">INSERT</button>
              </div>
     	    	 </div>
        	 </div>
     	  <div id="text_val">
     	 	
     	  </div>
     </div> 
  </div>
</body>
<script type="text/javascript">
   $(document).ready(function(){
    
      $(document).on('click','#Insert',function(){
      	var name_user=$("#name_user").val();
      	var text_user=$("#text_user").val();
      	var action="insert_data";

      	if (name_user == "" || text_user == "") {

      		$(".Alerts").html('<div class="alert alert-danger" role="alert">Fields are required</div>');
      	}else{

            $.ajax({
                url:"code.php",
                type:"post",
                data:{name_user:name_user,text_user:
                	text_user,action:action},
                success:function(data)
                {
                   $(".Alerts").html(data);
                   fetch_text_user();
                }
            });
      	  }
        });

       fetch_text_user();
       function fetch_text_user()
       {
       	 var action="fetch_data";

       	 $.ajax({
             url:"code.php",
             type:"post",
             data:{action:action},
             success:function(data)
             {
               $("#text_val").html(data);
             }
          });
         }

         $(document).on('click','#click_unlike_like',function(){

              var type=$(this).data('type_click');
              var text_id=$(this).data('id_text');

              var count_like=parseInt($(".count_like"+text_id).text());
              var count_unlike=parseInt($(".count_unlike"+text_id).text());

              var ch_like=$("#ch_like"+text_id).val();
              var ch_unlike=$("#ch_unlike"+text_id).val();

              function Minus_like()
              {
                $(".count_like"+text_id).text(count_like-1);
                $("#ch_like"+text_id).val("");
              }

              function Minus_unlike()
              {
                $(".count_unlike"+text_id).text(count_unlike-1);
                $("#ch_unlike"+text_id).val("");

              }


              if (type == "like") 
              {  
                
                if (ch_unlike == "yes") 
                {
                  Minus_unlike()
                 $(".add_styleun"+text_id).removeAttr('style');

                }

                if (ch_like == "yes") 
                {
                  Minus_like();
                  $(".add_style"+text_id).removeAttr('style');
                } 

                if (ch_like == "") 
                {
                  $(".count_like"+text_id).text(count_like+1);
                  $("#ch_like"+text_id).val("yes");
                  $(".add_style"+text_id).css('background-color','red');
                }
              }


              if (type == "unlike") 
              {  
                if (ch_like == "yes") 
                {
                   Minus_like();
                  $(".add_style"+text_id).removeAttr('style');
                }

                if (ch_unlike == "yes") 
                {
                   Minus_unlike();
                  $(".add_styleun"+text_id).removeAttr('style');
                }
                if (ch_unlike == "") 
                {
                   $(".count_unlike"+text_id).text(count_unlike+1);
                   $("#ch_unlike"+text_id).val("yes");
                   $(".add_styleun"+text_id).css('background-color','red');
                }
              }
          });
       });
</script>
</html>