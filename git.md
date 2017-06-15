# #git config 

- git 配置

```
  1. $ ssh-keygen  
  2. $ git config --global user.name "username"  
  3. $ git config --global user.email "useremail"  
``` 
- 参考：https://help.github.com/articles/setting-your-username-in-git/
- git 简明指南：http://rogerdudler.github.io/git-guide/index.zh.html 
- git-flow简明教程：فhttp://www.jianshu.com/p/b446c43577f9

# 常用命令

- 克隆git仓库：git clone https://github.com/用户名/仓库名.git

- 克隆git仓库中一个分支：git clone -b 分支名 https://github.com/用户名/仓库名.git

-克隆仓库到本地的情况：

```
1、git clone https://github.com/用户名/仓库名.git
2、git add . //添加当前目录中的所有文件到索引
3、git commit -m "first commit" //提交到本地源码库，并附加提交注释
4、git push -u origin master //把本地源码库push到github
```
- git status 查看更改状态

- 本地没有克隆仓库的时候：

```
1、mkdir first
  cd first

2、git init  ////生成本地git管理

3、git add . //添加当前目录中的所有文件到索引

4、git commit -m "first commit" //提交到本地源码库，并附加提交注释

5、git remote add origin https://github.com/用户名/first.git

6、git push -u origin master //把本地源码库push到github

如果出现! [rejected]        master -> master (fetch first)
error: failed to push some refs to 'git@github.com:zapnaa/abcappp.git'在stackoverflow给出的解决办法是一种是   git fetch,然后git merge,还有一种是git push origin master --force，但是说的将来这样会有问题

还有一种方法就是把github上的下载下：git pull --rebase origin master，再去git push -u origin master

```

- 删除 GitHub 上 repository 里的某个文件：

```
git submodule update
git rm -rf dir
git add .
git commit -a -m "Remove the now ignored directory dir"
git push -u origin master
```


- 查看分支：git branch
- 创建分支：git branch <name>
- 切换分支：git checkout <name>
- 创建+切换分支：git checkout -b <name>
- 合并某分支到当前分支：git merge<name>
- 删除分支：git branch -d <name>

- git push origin 分支名：把文件push到仓库分支中

- 项目上有一个分支test，使用git branch -a看不到该远程分支，直接使用命令git checkout test报错如下：

 error: pathspec 'origin/test' did not match any file(s) known to git.
 
```
解决方法： 
1、执行命令git fetch取回所有分支的更新

2、执行git branch -a可以看到test分支（已经更新分支信息）

3、切换分支git checkout test

```

- git stash //暂存文件

- git stash list //查看暂存

- git stash pop //打开暂存

- git status 查看状态

- git diff 查看差异

- git log 提交日志

- git pull --rebase 拉取最新

- 有两个分支，dev和master，先更新dev分支文件后，切换git checkout master， git rebase dev，就把dev分支的文件合并到master分支中,然后提交；

- 回退操作：git reset --hard （commit hash）
