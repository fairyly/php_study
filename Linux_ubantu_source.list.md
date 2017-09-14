# ubuntu有效的sourcelist配置

* [ubuntu发布的版本](https://wiki.ubuntu.com/Releases)
* [ 清华大学开源软件镜像站](https://mirrors.tuna.tsinghua.edu.cn/help/ubuntu/)
* [ubantu源列表](http://wiki.ubuntu.org.cn/%E6%BA%90%E5%88%97%E8%A1%A8)
* [原始安装 Ubuntu16.04.1 安装Nginx](http://www.cnblogs.com/piscesLoveCc/p/5794926.html)

**一定要查看版本号**

可以看到ubuntu数字版本号和英文名称的对应关系，也可以看到以04结尾的版本LTS标识，标识长期维护，这些版本的源在archive.ubuntu.com中呆的时间就比较长。

第一步：备份原来的源文件
```
cd /etc/apt/  
然后会显示下面的源文件sources.list 
输入命令 
sudo cp sources.list sources.list.bak 
就是将sources.list备份到sources.list.bak
```

第二步：替换源
  
替换并保存 

sudo gedit sources.list打开文件，替换成阿里云文件即可,也可以用vim sources.list;

第三步：更新源和软件

   sudo apt-get update 更新源  
   
   

原有的source.list文件内容如下：

```
# 

# deb cdrom:[Ubuntu-Server 16.04.2 LTS _Xenial Xerus_ - Release amd64 (20170215.8)]/ xenial main restricted

#deb cdrom:[Ubuntu-Server 16.04.2 LTS _Xenial Xerus_ - Release amd64 (20170215.8)]/ xenial main restricted

# See http://help.ubuntu.com/community/UpgradeNotes for how to upgrade to
# newer versions of the distribution.
deb http://cn.archive.ubuntu.com/ubuntu/ xenial main restricted
deb-src http://cn.archive.ubuntu.com/ubuntu/ xenial main restricted

## Major bug fix updates produced after the final release of the
## distribution.
deb http://cn.archive.ubuntu.com/ubuntu/ xenial-updates main restricted
# deb-src http://cn.archive.ubuntu.com/ubuntu/ xenial-updates main restricted

## N.B. software from this repository is ENTIRELY UNSUPPORTED by the Ubuntu
## team. Also, please note that software in universe WILL NOT receive any
## review or updates from the Ubuntu security team.
deb http://cn.archive.ubuntu.com/ubuntu/ xenial universe
# deb-src http://cn.archive.ubuntu.com/ubuntu/ xenial universe
deb http://cn.archive.ubuntu.com/ubuntu/ xenial-updates universe
# deb-src http://cn.archive.ubuntu.com/ubuntu/ xenial-updates universe

## N.B. software from this repository is ENTIRELY UNSUPPORTED by the Ubuntu 
## team, and may not be under a free licence. Please satisfy yourself as to 
## your rights to use the software. Also, please note that software in 
## multiverse WILL NOT receive any review or updates from the Ubuntu
## security team.
deb http://cn.archive.ubuntu.com/ubuntu/ xenial multiverse
# deb-src http://cn.archive.ubuntu.com/ubuntu/ xenial multiverse
deb http://cn.archive.ubuntu.com/ubuntu/ xenial-updates multiverse
# deb-src http://cn.archive.ubuntu.com/ubuntu/ xenial-updates multiverse

## N.B. software from this repository may not have been tested as
## extensively as that contained in the main release, although it includes
## newer versions of some applications which may provide useful features.
## Also, please note that software in backports WILL NOT receive any review
## or updates from the Ubuntu security team.
deb http://cn.archive.ubuntu.com/ubuntu/ xenial-backports main restricted universe multiverse
# deb-src http://cn.archive.ubuntu.com/ubuntu/ xenial-backports main restricted universe multiverse

## Uncomment the following two lines to add software from Canonical's
## 'partner' repository.
## This software is not part of Ubuntu, but is offered by Canonical and the
## respective vendors as a service to Ubuntu users.
# deb http://archive.canonical.com/ubuntu xenial partner
# deb-src http://archive.canonical.com/ubuntu xenial partner

deb http://security.ubuntu.com/ubuntu xenial-security main restricted
# deb-src http://security.ubuntu.com/ubuntu xenial-security main restricted
deb http://security.ubuntu.com/ubuntu xenial-security universe
# deb-src http://security.ubuntu.com/ubuntu xenial-security universe
deb http://security.ubuntu.com/ubuntu xenial-security multiverse
# deb-src http://security.ubuntu.com/ubuntu xenial-security multiverse

```

使用：

```
使用gedit将sources.list文件打开: #sudo gedit /etc/apt/sources.list
保存退出。然后执行命令： #sudo apt-get update

```
