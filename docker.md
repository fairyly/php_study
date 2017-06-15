# docker study

- 安装Kitematic：https://docs.docker.com/kitematic/ 
- 最新的 Kitematic 发行版：https://github.com/docker/kitematic/releases
- Docker从入门到实战：https://yeasy.gitbooks.io/docker_practice/content/

>>>

## docker-machin命令：

- # Windows和OSX需要
- $ docker-machine create --driver virtualbox default #创建docker主机
- $ docker-machine start default #启动docker主机
- $ eval "$(docker-machine env default)" #配置docker主机连接信息
- $ docker-machine ssh default #ssh连接到docker主机
