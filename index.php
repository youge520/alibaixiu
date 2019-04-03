<!--

   我们之前写都是完全的前后端分离：前端只有前端代码，后端只有后端代码，没有混合
   这样的好处：
        代码维护更简单，代码更易读
   也有缺点：
        1.显示效果不太好，会有数据被替换的效果
        2.一个页面要想展示出来时，会发多个请求


    还有种开发模式叫前后端混编：其实就是之前PHP阶段大家写的代码
    好处：
        1.数据没有被替换的效果，因为你请求的是PHP文件，当你能看到页面的时候。PHP早就执行完把数据替换上去了
        2.请求相对少一点

    缺点：
        代码不易读，维护要相对难一点
        不能“同时”改同一个页面


    一般都是看公司需求

    大部分是：
        前后端混编+ajax

    如果是前后端+ajax，那么我们写什么代码？
      
-->

<?php

  //导入工具文件
  require_once "admin/api/tools/doSql.php";

  //查出轮播图数据
  $sql = "select *from sliders";
  $sliderList = my_select($sql);


  //查出焦点关注中的5篇文章
  $newPosts = my_select("select id,title,feature from posts where status = 'published' order by id desc limit 5");


  //查出5篇热门文章
  $sql = "select id,title,feature,views,likes from posts where status = 'published' order by views desc limit 5";
  $hotPosts = my_select($sql);


  //查出3篇最新文章（详细版）
  $sql = "select p.id,p.title,c.name,u.nickname,p.created,p.content,p.views,p.likes,p.feature from posts p
                inner join categories c
                on p.category_id = c.id
                inner join users u
                on p.user_id = u.id
              where p.status = 'published'
              order by p.id desc
              limit 3";

  $detailPosts = my_select($sql);
  // var_dump($detailPosts);
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>阿里百秀-发现生活，发现美!</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.css">

  <style>
    .swipe-wrapper li img{

      height:273px;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <div class="topnav">
    <?php 
        $sql = "select *from categories";
        $cateList = my_select($sql);

        //准备一个保存所有类名的数组
        //只要这个数组尽可能的长就能满足需求
        $classArray = array('fa-glass','fa-phone','fa-fire','fa-gift','fa-plane','fa-home','....' );

    ?>
      <ul>
      <?php foreach($cateList as $key => $value): ?>
        <li><a href="list.php?name=<?php echo $value['name'];?>&id=<?php echo $value['id']; ?>"><i class="fa <?php echo $classArray[$key]; ?>"></i><?php echo $value['name']; ?></a></li>
  <?php endforeach; ?>
      </ul>
    </div>
    <div class="header">
      <h1 class="logo"><a href="index.html"><img src="assets/img/logo.png" alt=""></a></h1>
      <ul class="nav">

      <?php foreach($cateList as $key => $value): ?>
        <li><a href="list.php?name=<?php echo $value['name'];?>&id=<?php echo $value['id']; ?>"><i class="fa <?php echo $classArray[$key]; ?>"></i><?php echo $value['name']; ?></a></li>
  <?php endforeach; ?>
      </ul>
      <div class="search">
        <form>
          <input type="text" class="keys" placeholder="输入关键字">
          <input type="submit" class="btn" value="搜索">
        </form>
      </div>
      <div class="slink">
        <a href="javascript:;">链接01</a> | <a href="javascript:;">链接02</a>
      </div>
    </div>
    <div class="aside">
      <div class="widgets">
        <h4>搜索</h4>
        <div class="body search">
          <form>
            <input type="text" class="keys" placeholder="输入关键字">
            <input type="submit" class="btn" value="搜索">
          </form>
        </div>
      </div>
      <div class="widgets">
        <h4>随机推荐</h4>
        <ul class="body random">

      <?php 
         //查出5篇随机文章
        $sql = "select  id,title,feature,views from posts 
                              where status = 'published'
                              order by rand()
                          limit 5";
        $randPost = my_select($sql);

      foreach( $randPost as $value ): ?>
          <li>
            <a href="detail.php?id=<?php echo $value['id'];?>">
              <p class="title"><?php echo $value['title']; ?></p>
              <p class="reading">阅读(<?php echo $value['views']; ?>)</p>
              <div class="pic">
                <img src="<?php echo $value['feature']; ?>" alt="">
              </div>
            </a>
          </li>
  <?php endforeach; ?>

        </ul>
      </div>
      <div class="widgets">
        <h4>最新评论</h4>
        <ul class="body discuz">
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="uploads/avatar_1.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="uploads/avatar_1.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="uploads/avatar_2.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="uploads/avatar_1.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="uploads/avatar_2.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="uploads/avatar_1.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="content">
      <div class="swipe">
        <ul class="swipe-wrapper">

        <!-- 循环生成li -->
        <?php foreach($sliderList as $value):  ?>
          <li>
            <a href="<?php echo $value['link']; ?>">
              <img src="<?php echo $value['image']; ?>">
              <span><?php echo $value['text']; ?></span>
            </a>
          </li>
       <?php endforeach; ?>

        </ul>
        <p class="cursor">

        <!-- 循环生成页码 -->
        <?php foreach($sliderList as $key => $value): ?>

        <?php if($key == 0): ?>
          <span class="active"></span>
        <?php else: ?>
          <span></span>
        <?php endif;?>

        <?php endforeach; ?>

        </p>
        <a href="javascript:;" class="arrow prev"><i class="fa fa-chevron-left"></i></a>
        <a href="javascript:;" class="arrow next"><i class="fa fa-chevron-right"></i></a>
      </div>
      <div class="panel focus">
        <h3>焦点关注</h3>
        <ul>

      <?php foreach($newPosts as $key => $value):  ?>
      <?php if($key == 0) :?>
          <li class="large">
      <?php else: ?>
          <li>
  <?php endif; ?>
            <a href="detail.php?id=<?php echo $value['id'];?>">
              <img src="<?php echo $value['feature'];?>" alt="">
              <span><?php echo $value['title'];?></span>
            </a>
          </li>
  <?php endforeach; ?>
        </ul>
      </div>
      <div class="panel top">
        <h3>一周热门排行</h3>
        <ol>

    <?php foreach($hotPosts as $key => $value): ?>
          <li>
            <i><?php echo $key + 1; ?></i>
            <a href="detail.php?id=<?php echo $value['id'];?>"><?php echo $value['title'];?></a>
            <a href="javascript:;" postID="<?php echo $value['id'];?>" class="like">赞(<?php echo $value['likes'];?>)</a>
            <span>阅读 (<?php echo $value['views'];?>)</span>
          </li>
  <?php endforeach; ?>

        </ol>
      </div>
      <div class="panel hots">
        <h3>热门推荐</h3>
        <ul>
        
        <?php for($i = 0; $i < 4; $i++): ?>
          <li>
            <a href="detail.php?id=<?php echo $hotPosts[$i]['id']; ?>">
              <img src="<?php echo $hotPosts[$i]['feature']; ?>" alt="">
              <span><?php echo $hotPosts[$i]['title']; ?></span>
            </a>
          </li>
  <?php endfor; ?>
        </ul>
      </div>
      <div class="panel new">
        <h3>最新发布</h3>

      <?php foreach($detailPosts as $value):
        $pID = $value['id'];
        //循环里才能查出当前这篇文章的评论数
        $sql = "select *from comments where post_id=$pID  and status ='approved'";

        $count = count(my_select($sql));
      ?>
        <div class="entry">
          <div class="head">
            <span class="sort"><?php echo $value['name']; ?></span>
            <a href="detail.php?id=<?php echo $value['id']; ?>"><?php echo $value['title']; ?></a>
          </div>
          <div class="main">
            <p class="info"><?php echo $value['nickname']; ?> 发表于 <?php echo $value['created']; ?></p>
            <p class="brief"><?php echo $value['content']; ?></p>
            <p class="extra">
              <span class="reading">阅读(<?php echo $value['views']; ?>)</span>
              <span class="comment">评论(<?php echo $count;?>)</span>
              <a href="javascript:;" postid=<?php echo $value['id']; ?>  class="like">
                <i class="fa fa-thumbs-up"></i>
                <span>赞(<?php echo $value['likes']; ?>)</span>
              </a>
              <a href="javascript:;" class="tags">
                分类：<span><?php echo $value['name']; ?></span>
              </a>
            </p>
            <a href="javascript:;" class="thumb">
              <img src="<?php echo $value['feature']; ?>" alt="">
            </a>
          </div>
        </div>
  <?php endforeach; ?>
      </div>
    </div>
    <div class="footer">
      <p>© 2016 XIU主题演示 本站主题由 themebetter 提供</p>
    </div>
  </div>
  <script src="assets/vendors/jquery/jquery.js"></script>
  <script src="assets/vendors/swipe/swipe.js"></script>
  <script>
    //
    var swiper = Swipe(document.querySelector('.swipe'), {
      auto: 3000,
      transitionEnd: function (index) {
        // index++;

        $('.cursor span').eq(index).addClass('active').siblings('.active').removeClass('active');
      }
    });

    // 上/下一张
    $('.swipe .arrow').on('click', function () {
      var _this = $(this);

      if(_this.is('.prev')) {
        swiper.prev();
      } else if(_this.is('.next')) {
        swiper.next();
      }
    })


    //--------------------------下面是自己写的代码-----------------------------

    // $('.like').click(function(){

    //   //此处要记得强制转换成数字，不然取到的是字符串！
    //   var zan = $(this).attr('zan');
    //   // 让赞+1
    //   zan++;

    //   var postID = $(this).attr('postID');
    //   // console.log(zan,postId);

    //   //先用一个that保存被点击的a标签，因为回调函数里的this改变了指向
    //   var that = this;
      
    //    //只能发请求
    //    $.post({
    //      url:"admin/api/zan.php",
    //      data:{ zan:zan, id: postID },
    //      success:function(obj){

    //         if(obj == "ok"){

    //             //让被点击的赞显示为新的赞
    //             $(that).html('赞(' + zan +')');

    //         }else{

    //           alert('点赞失败！请跟管理员联系！');
    //         }
    //      }
    //    });

      $('.like').click(function(){

        //取出被点击的那个a标签的自定义属性
        var postID = $(this).attr('postid');

        var that = this;

        //用一个变量记录一下，被点的赞是有手还是木有手的
        // 大于0会得到true，代表有手，否则代表木有手
        var haveHand = $(this).children().length > 0;
        
         $.post({
         url:"admin/api/zan.php",
         data:{ id: postID },
         success:function(obj){

            if(obj != "fail"){

              if(haveHand){
                  $(that).html('<i class="fa fa-thumbs-up"></i><span>赞('+ obj +')</span>');
              }else
                //让被点击的赞显示为新的赞
                $(that).html('赞(' + obj +')');

            }else{

              alert('点赞失败！请跟管理员联系！');
            }
         }
      });
      
    });
  </script>


</body>
</html>
