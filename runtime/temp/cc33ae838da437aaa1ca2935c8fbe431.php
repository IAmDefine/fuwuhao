<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"E:\xampp\htdocs\wechat\public/../application/index\view\sign\myinfo.html";i:1502070122;}*/ ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
	<script type="text/javascript" src="/js/jquery-1.8.3.min.js"></script>
	<link rel="stylesheet" href="/css/weui.min.css">
	<script type="text/javascript" src="/js/weui.min.js"></script>
    <title>我的账号</title>
    <style>
		 .type_img{
            width:45%;
            height:150px;
            float: left;
            margin-left:10px;
        }
        .img{
            width:100%;
            height:119px;
        }
        .text{
        	float: left;
        	position: relative;
			left: 50px;
			top: -10px;
        }
         .con{
            width: 100px;
            height: 100px;
            border-radius:50%;
            margin-left: 38%;

            background: #EB2000;
        }
        .text1{
            color: white;
            line-height: 100px;
            text-align: center;
            font-size: 15px;
        }
        .why{
            position: relative;
            left: 110px;
            top: -60px;
            color: blue;
        }
         .weui-uploader__bd{
            overflow: inherit;
        }
    </style>
</head>
<body ontouchstart>
<div class="weui-msg">
<?php if(!empty($statrinfo)): switch($statrinfo['ifauth']): case "2": ?><div class="con"><text class="text1">核审通过</text></div><?php break; case "3": ?><div class="con"><text class='text1'>资料核审中</text></div><?php break; case "4": ?><div class="con"><text class='text1'>核审失败</text></div><?php break; default: ?>default
        <?php endswitch; else: ?>
<div class="con"><text class='text1'>尚未核审</text></div>
<?php endif; if(!empty($statrinfo)): switch($statrinfo['ifauth']): case "4": ?><a href="/index/sign/defeated/sid/<?php echo $statrinfo['id']; ?>" class="why">查看原因</a><?php break; endswitch; endif; ?>


	<div class="weui-msg__text-area">
		<!-- <h2 class="weui-msg__title">绑定成功</h2> -->
		<p class="weui-msg__desc" style="margin-top: 10px;">当前账号：<?php echo $wx_userinfo['mobile']; ?></p>
	</div>
</div>
<?php if(!empty($statrinfo)): if(($statrinfo['credtype']==1) OR ($statrinfo['credtype']==2)): ?>
<div class="weui-cells">
    <div class="weui-cell">
        <div class="weui-cell__bd">
            <p>企业名称：<?php echo $statrinfo['bizname']; ?></p>
        </div>
    </div>
    <div class="weui-cell">
        <div class="weui-cell__bd">
            <p>企业注册号：<?php echo $statrinfo['compno']; ?></p>
        </div>
    </div>
    <?php endif; ?>
      <div class="weui-cell">
        <div class="weui-cell__bd">
            <p>明星艺名：<?php echo $statrinfo['names']; ?></p>
        </div>
    </div>
       <div class="weui-cell">
        <div class="weui-cell__bd">
            <p>明星姓名：<?php echo $statrinfo['oldname']; ?></p>
        </div>
    </div>
     <div class="weui-cell">
        <div class="weui-cell__bd">
            <p>明星身份证号：<?php echo $statrinfo['idno']; ?></p>
        </div>
    </div>
</div>

<div class="weui-uploader" style="margin-top:10px">
	<?php if(($statrinfo['credtype']==1) OR ($statrinfo['credtype']==2)): ?>
    <div class="weui-uploader__bd">
        <div class="type_img">
            <image src="<?php echo $statrinfo['tradcert']; ?>" class="img" />
            <div class="text">营业执照</div>
        </div>

           <div class="type_img">
            <image src="<?php echo $statrinfo['entrus']; ?>" class="img" />
            <div class="text">企业委托书</div>
        </div>
    </div>
    <?php endif; ?>
      <div class="weui-uploader__bd">
        <div class="type_img">
            <image src="<?php echo $statrinfo['admcard']; ?>" class="img" />
            <div class="text">身份证正面</div>
        </div>
           <div class="type_img">
            <image src="<?php echo $statrinfo['reveside']; ?>" class="img" />
            <div class="text">身份证反面</div>
        </div>
    </div>
      <div class="weui-uploader__bd">
        <div class="type_img">
            <image src="<?php echo $statrinfo['handid']; ?>" class="img" />
            <div class="text" style="left:20px;">手持身份证正面照</div>
        </div>
		<?php if($statrinfo['credtype']==1): ?>
        <div class="type_img">
            <image src="<?php echo $statrinfo['groupcode']; ?>" class="img" />
            <div class="text" style="left:25px;">组织结构代码证</div>
        </div>
		<?php endif; ?>
    </div>
</div>
<?php endif; ?>
</body>
</html>
