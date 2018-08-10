# 大学生心理健康网站  

关键字:`心理健康` `美好` `php` `sql` `cms` `web` `网站`  

参考链接:[点击进入](http://psy.fh21.com.cn)  

![index](http://www.galaxee.cn/static/PsyWeb/design/%E9%A6%96%E9%A1%B5.png) 

# 1.开发流程

## 1.1 数据库设计

## 1.2 前端设计

### 1.21 主题风格

### 1.22 页面结构

### 1.23 跳转逻辑

## 1.3 后台搭建
    

## 1.4 数据集成

# 2.安装步骤

## 2.1 安装依赖包  

    composer install  
  
## 2.2 配置`.env`格式  
        
        APP_NAME=BAOXIN
        APP_ENV=local
        APP_KEY=base64:ljUKyuVyoiCGgvbElJlE7eSWbxRFMuES/SfnlqsWQDM=
        APP_DEBUG=true
        APP_LOG_LEVEL=debug
        APP_URL=http://baoxin

        DB_CONNECTION=mysql
        #数据库地址
        DB_HOST=127.0.0.1 
        DB_PORT=3306
        #数据库名称
        DB_DATABASE=psyweb
        #数据库用户名
        DB_USERNAME=root
        #数据库密码(默认是空)
        DB_PASSWORD=

        BROADCAST_DRIVER=log
        CACHE_DRIVER=file
        SESSION_DRIVER=file
        QUEUE_DRIVER=sync

        REDIS_HOST=127.0.0.1
        REDIS_PASSWORD=null
        REDIS_PORT=6379

        MAIL_DRIVER=smtp
        MAIL_HOST=smtp.qq.com
        MAIL_PORT=587
        MAIL_USERNAME=yunlike@foxmail.com
        MAIL_PASSWORD=zcjy0724
        MAIL_ENCRYPTION=null

        PUSHER_APP_ID=
        PUSHER_APP_KEY=
        PUSHER_APP_SECRET=
  
## 2.3 生成数据表结构  


        php artisan migrate  
    
## 2.4 预插入数据 


        php artisan db:seed
   
## 2.5 初始化key
  
  
        php artisan key:generate
 
  

# 3.说明





