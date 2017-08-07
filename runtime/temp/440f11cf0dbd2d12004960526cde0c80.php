<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"E:\xampp\htdocs\wechat\public/../application/index\view\sign\agency.html";i:1502074958;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
	<link rel="stylesheet" href="/css/weui.min.css">
    <script src="/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="/js/weui.min.js"></script>
	<title>代理合作</title>
	<style>
		.ic_s{width:58px;height: 60px}
		.title{margin-left: 20px;margin-top: 20px;}
		.checkstyle{
			text-align: center;
		}
	</style>
</head>
<body ontouchstart>
		<div class="weui-grids" style="margin-top:10px;">
	    <a href="javascript:;" class="weui-grid">
	    <label>
	        <div class="weui-grid__icon ic_s"><img src="/imgs/star_homepage1.png" alt=""></div>
	        <p class="weui-grid__label">个人签约</p>
			<p class="checkstyle"><input type="radio" class="num" value="1" name="num" checked></p>
			</label>
	    </a>

	    <a href="javascript:;" class="weui-grid">
	     <label>
	        <div class="weui-grid__icon ic_s"><img src="/imgs/star_homepage2.png" alt=""></div>
	        <p class="weui-grid__label">工作室签约</p>
			<p class="checkstyle"><input type="radio" class="num" value="2" name="num"></p>
	    </label>
	    </a>
		<a href="javascript:;" class="weui-grid">
		  <label>
	        <div class="weui-grid__icon ic_s"><img src="/imgs/star_homepage3.png" alt=""></div>
	        <p class="weui-grid__label">经纪公司签约</p>
			<p class="checkstyle"><input type="radio" class="num" value="3" name="num"></p>
			</label>
	    </a>
	</div>
	<button class="weui-btn weui-btn_warn check" style="margin-top:100px;">下一步</button>
</body>
<script>
$(".check").click(function(){
	var num = $(".num");
	var a = ''; //模板号
	for(var i=0;i<num.length;i++){
		if(num[i].checked){
			a = num[i].value;
		}
	}
	if(a==3){
		weui.topTips('敬请期待');
    return;
	}else if(a==2){
    weui.topTips('敬请期待');
    return;
    // window.location.href='/index/business/agency_info/cid/'+a
  }else if(a==1){
		$.ajax({
				url:"/index/userinfo/getstarinfo",
				type:"POST",
				data:{'signtype':a},
				dataType:'JSON',
				success:function (data) {
					if(data==1){
						window.location.href='/index/sign/per_contract'
					}else if(data=2){
						//去填写认证信息
						window.location.href='/index/userinfo/auth'
					}
				}
		})
  }




});
</script>
</html>
