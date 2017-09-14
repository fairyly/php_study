# Linux常用命令




```
ubantu:
yhq123  123456


yhq   yhq123456


ifconfig   查看IP



sudo是linux系统管理指令，是允许系统管理员让普通用户执行一些或者全部的root命令的一个工具;
sudo -i

su username 切换普通用户
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

cd是桌面,输入cd进入桌面目录，
cd /home 重新进入用户主目录

cd / 进入系统根目录
ls 查看根目录所有文件



复制一个文件夹中文件到另一个目录：先到需要复制文件的目录  cp 文件所在目录名/*  复制到的目录名


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


# ubantu 系统目录

```
ubuntu没有盘符这个概念，只有一个根目录/，所有文件都在它下面

/    根目录

    bin       //系统程序

    boot     //内核和启动程序，所有和启动相关的文件都保存在这里

         grub    //引导器相关文件

    dev      //设备文件

    etc      //系统软件的启动和配置文件，系统在启动过程中需要读取的文件都在这个目录。如LILO参数、用户账户和密码。

    home   //用户的主目录。下面是自己定义的用户名的文件夹

    lib       //系统程序库文件,这个目录里存放着系统最基本的动态链接共享库，类似于Windows下的system32目录，几乎所有的应用程序都需要用到这些共享库。

    media  //挂载媒体设备，如光驱、U盘等

    mnt    //目录是让用户临时挂载别的文件系统，如挂载Windows下的某个分区，ubuntu默认还是挂载在/media目录。

    opt     //可选的应用软件包（很少使用）

    proc     //这个目录是系统内存的映射，我们可以直接访问这个目录来获取系统信息。也就是说，这个目录的内容不在硬盘上而是在内存里。

    sbin    //管理员系统程序

    selinux

    srv

    sys   //udev用到的设备目录树，/sys反映你机器当前所接的设备

    tmp  //临时文件夹

    usr   //这是个最庞大的目录，我们要用到的很多应用程序和文件几乎都存放在这个目录下。]

          bin   // 应用程序

         game  //游戏程序

         include

         lib    //应用程序的库文件

         lib64

         local   //包含用户程序等

         sbin    //管理员应用程序

         share   //应用程序资源文件

         src      //源代码

    var    //动态数据，所有服务的登录文件或错误信息文件（log file）都在 /var/log下。此外一些数据库，如MYSQL则在/var/lib下，还有用户未读邮件的默认存放地点为/var/spool/mail。

    lost_found //磁盘修复文件，存放因非法关机而丢失的文件
```
