# docker study

- 安装Kitematic：https://docs.docker.com/kitematic/ 
- 最新的 Kitematic 发行版：https://github.com/docker/kitematic/releases
- Docker从入门到实战：https://yeasy.gitbooks.io/docker_practice/content/

>>>

## docker-machine命令：

- # Windows和OSX需要
- $ docker-machine create --driver virtualbox default #创建docker主机
- $ docker-machine start default #启动docker主机
- $ eval "$(docker-machine env default)" #配置docker主机连接信息
- $ docker-machine ssh default #ssh连接到docker主机

## docker 命令

- 搜索镜像：https://hub.docker.com/
- $ docker pull node:4 #拉取镜像
- $ docker run -it --rm --name test_node -v "$PWD":/usr/src/app -w /usr/src/app node:4 node script.js 
  直接执行nodejs程序
- $ docker run -it --name study_node -v ~/work:/root -w /root node:4 bash  #创建容器
