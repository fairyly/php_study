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
    <form >
        <div>name：<input type="text" name="name" placeholder="name" class ="name"/></div>
        <div>address: <input type="text" name="address" class="address" placeholder="address"/></div>
        <div>city: <input type="text" name="city" class="city" placeholder="city"/></div>
        <div><input type="button" value="add" class="submit"/></div>
    </form>
    <script src="js/jquery-3.2.0.min.js"></script>
    <script>
    	$(function(){
    		$('.submit').on('click',function(){
    			var name = $('.name').val();
    			var address = $('.address').val();
    			var city = $('.city').val();
    			console.log(name+'/'+address+'/'+city);
    			$.ajax({
    				type:"POST",
    				url:"addaction.php",
    				data:{name:name,address:address,city:city},
    				success:function(data){
    					console.log(data);
    				}
    			})
    		});
    	})
    </script>
</body>
</html>