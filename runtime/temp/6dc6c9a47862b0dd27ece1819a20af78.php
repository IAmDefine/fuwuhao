<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"E:\xampp\htdocs\wechat\public/../application/index\view\sign\contractinfo.html";i:1502345107;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="/css/weui.min.css">
    <script type="text/javascript" src="/js/weui.min.js"></script>
    <script src="/js/jquery-1.8.3.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>合同详情</title>
	<style>

		.con{
			width: 100px;
			height: 100px;
			border-radius:50%;
			margin-left: 35%;
			margin-top: 15%;
			background: #EB2000;
		}
		.text{
			color: white;
			line-height: 100px;
			text-align: center;
			font-size: 15px;
		}
		.title{
			margin-left:22%;
			margin-top: 30px;
		}

		.con_img{
			width: 100%;
			height: 100%;
			position: relative;
			top: 100px;
			left: 32%;
		}
		.con_img >img{
			width: 137px;
			height: 145px;
		}
		.aaa{
			position: relative;
			left: 6%;
			top: 10px;
		}

	</style>
</head>
<body ontouchstart>
	<?php if(!empty($contractinfo)): ?>
	<div class="con">
        <?php switch($contractinfo['states']): case "1": ?><div class="text">正在核审中</div><?php break; case "2": ?><div class="text">等待签约</div><?php break; case "3": ?><div class="text">核审未通过</div><?php break; case "4": ?><div class="text">签约成功</div><?php break; default: ?>default
        <?php endswitch; ?>
	</div>

        <?php switch($contractinfo['types']): case "1": ?><h4 class="title">商务全约</h4><?php break; case "2": ?><h4 class="title">肖像独家</h4><?php break; case "3": ?><h4 class="title">代理合作</h4><?php break; default: ?>default
        <?php endswitch; ?>

<div class="weui-cells">
    <div class="weui-cell">
        <div class="weui-cell__bd">
            <p>甲方：前锋锐吉（北京）传媒有限公司</p>
        </div>
    </div>
        <div class="weui-cell">
        <div class="weui-cell__bd">
            <p>地址：北京市亦庄经海路7号贞观国际1号楼2层</p>
        </div>
    </div>
      <div class="weui-cell">
        <div class="weui-cell__bd">
            <p>联系人：010-85952988</p>
        </div>
    </div>
       <div class="weui-cell">
        <div class="weui-cell__bd">
            <p>电子邮箱：celianmedia@ce-lian.com</p>
        </div>
    </div>
     <div class="weui-cell">
        <div class="weui-cell__bd">
            <p>联系人电话：010-85952988</p>
        </div>
    </div>
</div>
        <?php switch($contractinfo['states']): case "1": ?><a href="javascript:;" style="margin-top:20px" class="weui-btn weui-btn_plain-default weui-btn_plain-disabled">签约</a><?php break; case "2": ?><a style="margin-top:20px" class="weui-btn weui-btn_warn sign" href="javascript:;">签约</a><?php break; case "4": ?><a style="margin-top:20px" class="weui-btn weui-btn_warn sign" href="<?php echo $contractinfo['docurl']; ?>">查看合同</a><?php break; endswitch; else: ?>
<div class="con_img">
	<img src="/imgs/no_con.png">
	<div class="aaa">暂无签约数据</div>
</div>
<?php endif; ?>
</body>
<script type="text/javascript">
	$('.sign').click(function(){
		$.ajax({
			url:"/index/sign/begin",
			type:"POST",
			data:'',
			dataType:'JSON',
			success:function (data) {
				if(data==1){
				 window.location.href='/index/sign/contractinfo'
				}
			}
		})
	})
</script>
</html>
