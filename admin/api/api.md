## 判断登录账号和密码是否正确的接口
type: post
url: api/doLogin.php
data:
    email：邮箱
    password:密码

响应体：
    JSON

    { "code":10000, "msg":"ok" }
    或者
    { "code":10001, "msg":"fail" }


## 判断有没有登录的接口
type:get
url: api/checkLogin.php
data:没有
响应体：
    JSON

    { "code":10000, "msg":"ok" }
    或者
    { "code":10001, "msg":"fail" }


## 获取当前登录的用户信息接口
type:get
url:api/getUserInfo.php
data:没有
响应体：
    JSON
    { "id":1,"slug":"admin",...... }


## 获取网站统计数据的接口
type:get
url:api/getWebInfo.php
data:没有
响应体：
    JSON
    {wenzhang:700  caogao:210  fenlei:4  pinglun:400  daishenhe:83}


## 获取分页评论数据的接口
type:get
url:api/getComments.php
data:
    pageIndex: 页码
    pageSize: 页容量

响应体：
    JSON
    {
        data:[
            {},
            {},
            {}
        ],
        totalPages:43
    }


## 修改评论状态的接口
type:post
url:api/editComments.php
data:
    status：告诉我要修改成什么状态
    ids： 告诉我要修改成哪些数据
            如果单行值传一个id，如果多行，就传多个id
            ids的取值要么是 “3" 这样的，要么就是 "3,9,10,11"这样的

响应体：
    JSON
    
    { "code":10000, "msg":"ok" }
    或者
    { "code":10001, "msg":"fail" }


## 获得文章的接口
type:get
url: api/getPosts.php
data:
    pageIndex:页码
    pageSize:页容量
    category:要筛选的分类
    status:要筛选的状态

响应体：
    JSON
    {
        data:[ {},{} ],
        totalPages:76
    }


## 获得所有分类的接口
type:get
url:api/getCategory.php
data:无
响应体：
    JSON
    [{},{},{},{}]


## 删除文章的接口
type:post
url:api/deletePosts.php
data:
    ids：传入要删除的文章的id，多个传一个id，批量就传多个id，多个id之间逗号连接

响应体：
    JSON
    { "code":10000, "msg":"ok" }
    或者
    { "code":10001, "msg":"fail" }


## 新增文章的接口
type:post
url:api/addPosts.php
data:
    title
    content
    slug
    feature
    created
    category
    status
响应体：
    JSON
    { "code":10000, "msg":"ok" }
    或者
    { "code":10001, "msg":"fail" }



## 根据id获取某篇文章详情的接口
type:get
url:api/getPostById.php
data:
    id:文章id
响应体
    JSON
    { slug,title,content}


## 修改文章的接口
type: post
url: api/editPosts.php
data:
    title
    content
    slug
    feature
    created
    category
    status
    id: 文章的id，通过id去修改

响应体：
    JSON
    { "code":10000, "msg":"ok" }
    或者
    { "code":10001, "msg":"fail" }



## 修改用户信息的接口
type:post
url: api/editUser.php
data:
    avatar：头像
    email:邮箱 把它当where条件
    slug:别名
    nickname:昵称
    bio：简介

响应体：
    JSON
    { "code":10000, "msg":"ok" }
    或者
    { "code":10001, "msg":"fail" }


## 修改密码的接口
type:post
url:api/changePassword.php
data:
    oldPass：旧密码
    newPass：新密码

响应体：
    JSON
    { "code":10000, "msg":"ok" }
    或者
    { "code":10001, "msg":"fail" }



## 新增分类的接口
type:post
url:api/addCategory.php
data:
    name：分类名
    slug：别名
响应体：
    JSON
    { "code":10000, "msg":"ok" }
    或者
    { "code":10001, "msg":"fail" }


## 修改分类的接口
type:post
url:api/editCategory.php
data:
    name：分类名
    slug：别名
    id: 要修改的分类的id
响应体：
    JSON
    { "code":10000, "msg":"ok" }
    或者
    { "code":10001, "msg":"fail" }


## 删除分类的接口
type:post
url:api/deleteCategory.php
data:
    ids:要删除的id
响应体：
    JSON
    { "code":10000, "msg":"ok" }
    或者
    { "code":10001, "msg":"fail" }


## 获取所有轮播图的接口
type:get
url:www.baixiu.com/admin/api/getSliders.php
data:无
响应体：
    JSON
    [
        {},
        {}
    ]


## 新增轮播图的接口
type:post
url:api/addSlider.php
data:
    image:图片
    text:文本
    link:连接
响应体：
    JSON
    { "code":10000, "msg":"ok" }
    或者
    { "code":10001, "msg":"fail" }


## 删除轮播图的接口
type:post
url:api/deleteSlider.php
data:
    ids:要删除的id

响应体：
    JSON
    { "code":10000, "msg":"ok" }
    或者
    { "code":10001, "msg":"fail" }