# php_study

- apache设置多个网站与别名

```
Listen 80
<VirtualHost _default_:9096>
DocumentRoot "D:\phpStudy\WWW"
  <Directory "D:\phpStudy\WWW">
    Options -Indexes +FollowSymLinks +ExecCGI
    AllowOverride All
    Order allow,deny
    Allow from all
    Require all granted
  </Directory>
</VirtualHost>

<VirtualHost *:80>
DocumentRoot "D:\phpStudy\WWW\web\public"
ServerName tusdk.t
</VirtualHost>

<VirtualHost *:80>
DocumentRoot "D:\phpStudy\WWW\web\public"
ServerName tutucloud.t
</VirtualHost>

```
