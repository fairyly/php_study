<?php 
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PHP 添加</title>
</head>
<body>
    <!-- 添加books列表 -->
   <!--  <form action="addaction.php" method="post">
       <div>ISBN：<input type="name" name="isbn" placeholder="isbn" /></div>
       <div>Author: <input type="text" name="author" placeholder="author"/></div>
       <div>Title: <input type="text" name="title" placeholder="title"/></div>
       <div>Price: $<input type="text" name="price" placeholder="price"/></div>
       <div><input type="submit" value="add"/></div>
   </form> -->

    <!-- 添加customers列表 -->
    <form action="uploadaction.php" method="post" enctype="multipart/form-data">
        <div>name：<input type="file" name="myfile" placeholder="name"  class="file-img" /></div>
        <input type="hidden" name="MAX-FILE-SIZE" placeholder="name"  value="1000000" />
        <div><input type="submit" value="add" class="submit"/></div>
    </form>
    <div class="re-img"><img  alt=""></div>
    <script src="js/jquery-3.2.0.min.js" type="text/javascript"></script>
    <script type="text/javascript">
    	$(function(){
    		$('.file-img').on('change',function(){
	        	/*var objUrl = getObjectURL(this.files[0]);
	        	if (objUrl) {
	           		$(".re-img img").attr("src", objUrl);
	            }*/
	            var reader = new FileReader();
		        reader.onload = function(e){
		            var dataURL=this.result;
		            $(".re-img img").attr("src", dataURL);
		        }
		        reader.readAsDataURL(this.files[0]);

	        });
	        
	         //建立一个可存取到该file的url
	       /* function getObjectURL(file){
		        var url = null; 
		        if (window.createObjectURL!=undefined) { // basic
		          url = window.createObjectURL(file);
		        } else if (window.URL!=undefined) { // mozilla(firefox)
		          url = window.URL.createObjectURL(file);
		        } else if (window.webkitURL!=undefined) { // webkit or chrome
		          url = window.webkitURL.createObjectURL(file);
		        }
		        return url;
		    }*/
    		
    		// $('.submit').on('click',function(){
    		// 	var src = $(".re-img img").attr("src");
    		// 	$.ajax({
    		// 		type:"POST",
    		// 		url:"uploadaction.php",
    		// 		data:{src:src},
    		// 		success:function(data){
    		// 			console.log(data);
    		// 		}
    		// 	})
    		// });
    	})
    </script>
</body>
</html>
