<?php 

    function do_html_header($title) {
    
?>

    <!DOCTYPE html>
    <html>
    <head>
        <title><?php echo $title;?></title>
    </head>
    <body>
        <h1>PHPbookmark</h1>
        <hr/>
        <?php 
            if ($title) {
                # code...
                do_html_header($title);
            }
    }

    function do_html_footer() {
        ?>   
    </body>
    </html>
    <?php }



    function display_login_form() {
        ?>
        <form action="member.php" method="post">
            <div><input type="text" name="username" placeholder="用户名"></div>
            <div><input type="text" name="passwd" placeholder="密码"></div>
            <div><input type="submit" name="submit" value="登陆"></div>
        </form>
    <?php } 

    function do_html_heading($heading) {
      // print heading
    ?>
      <h2><?php echo $heading;?></h2>
    <?php
    }

    function do_html_URL($url, $name) {
      // output URL as link and br
    ?>
      <br /><a href="<?php echo $url;?>"><?php echo $name;?></a><br />
    <?php
    }

    function display_site_info() {
      // display some marketing info
    ?>
      <ul>
      <li>Store your bookmarks online with us!</li>
      <li>See what other users use!</li>
      <li>Share your favorite links with others!</li>
      </ul>
    <?php
    }
    function display_registration_form() {
        ?>
        <form action="reg_new.php" method="post">
            <div><input type="text" name="username" placeholder="用户名"></div>
            <div><input type="password" name="passwd" placeholder="密码"></div>
            <div><input type="password" name="passwd2" placeholder="确认密码"></div>
            <div><input type="email" name="email" placeholder="邮箱"></div>
            <div><input type="submit" name="submit" value="注册"></div>
        </form>
    <?php }  ?> 
