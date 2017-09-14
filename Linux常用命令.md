# Linux常用命令


```
ubantu:
yhq123  123456


yhq   yhq123456


ifconfig   查看IP



sudo是linux系统管理指令，是允许系统管理员让普通用户执行一些或者全部的root命令的一个工具;
sudo -i

su user 切换普通用户
sudo su 切换用户

给root用户设定密码： 只需执行命令：sudo passwd 


以后，不用再去用vmware自带的vmware tools了。

还是用下面这个
sudo apt-get install open-vm-tools
sudo mkdir /mnt/hgfs
sudo mount -t vmhgfs .host:/ /mnt/hgfs

sudo shutdown   //关机
sudo shutdown -c //取消关机



sudo vim conf/nginx.conf 编辑配置文件


按下 i, o, a 等字符就可以进入输入模式

:wq 保存退出

Esc 这个按键退出编辑模式；


sync 将数据由内存同步到硬盘中。

shutdown 关机指令，你可以man shutdown 来看一下帮助文档。例如你可以运行如下命令关机：

shutdown –h 10 ‘This server will shutdown after 10 mins’ 这个命令告诉大家，计算机将在10分钟后关机，并且会显示在登陆用户的当前屏幕中。

Shutdown –h now 立马关机

Shutdown –h 20:25 系统会在今天20:25关机

Shutdown –h +10 十分钟后关机

Shutdown –r now 系统立马重启

Shutdown –r +10 系统十分钟后重启

reboot 就是重启，等同于 shutdown –r now

halt 关闭系统，等同于shutdown –h now 和 poweroff


重新连接
ssh username@hostip   ssh yhq@192.168.235.130


在Linux中我们可以使用ll或者ls –l命令来显示一个文件的属性以及文件所属的用户和组


处理目录的常用命令
接下来我们就来看几个常见的处理目录的命令吧：
ls: 列出目录
cd：切换目录
pwd：显示目前的目录
mkdir：创建一个新的目录
rmdir：删除一个空的目录
cp: 复制文件或目录
rm: 移除文件或目录


附 ： 一些nginx有关基本命令

　 -> /usr/local/nginx/sbin/nginx 启动
    -> /usr/local/nginx/sbin/nginx -t 测试配置文件
    -> /usr/local/nginx/sbin/nginx -s reload 重启
    -> /usr/local/nginx/sbin/nginx -v 查看nginx版本
    -> /usr/local/nginx/sbin/nginx -V 查看nginx版本，及配置信息
    -> netstat -antlp | grep 80     nginx占用80端口，检查是否启动
    -> ps -ef | grep nginx 命令ps查找nginx的主进程号，检查是否启动(假设主进程号为3514)
    -> kill -QUIT 3514     从容停止
    -> kill -TERM 3514     快速停止
    -> kill -9 3514         强制停止，只关闭一个主进程号，其余进程号仍在运行
    -> kill -9 3514 3515 3525     强制关闭nginx所有进程号
    -> kill -HUP 3514 平滑重启



 ps aux | grep apache  linux命令ps aux|grep xxx详解:要对进程进行监测和控制,首先必须要了解当前进程的情况,也就是需要查看当前进程
```
