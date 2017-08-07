<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"E:\xampp\htdocs\wechat\public/../application/index\view\sign\per_contract.html";i:1502091973;}*/ ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
  	<link rel="stylesheet" href="/css/weui.min.css">
      <script src="/js/jquery-1.8.3.min.js"></script>
  	<script type="text/javascript" src="/js/weui.min.js"></script>
    <title>个人代理合同</title>
  </head>
  <body>

    	<h3 style="margin-top:20px;margin-left:20%">商务代理协议</h3>

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

    <div class="weui-cells">
        <div class="weui-cell">
            <div class="weui-cell__bd">
                <p>乙方：</p>
            </div>
        </div>
            <div class="weui-cell">
            <div class="weui-cell__bd">
                <p>地址：</p>
            </div>
        </div>
          <div class="weui-cell">
            <div class="weui-cell__bd">
                <p>联系人：</p>
            </div>
        </div>
           <div class="weui-cell">
            <div class="weui-cell__bd">
                <p>电子邮箱：</p>
            </div>
        </div>
         <div class="weui-cell">
            <div class="weui-cell__bd">
                <p>联系人电话：</p>
            </div>
        </div>
    </div>
    	<h4 style="margin-left:15px;margin-top:20px;">鉴于：</h4>
    		<text style="margin-left:30px;margin-top:20px;">1.甲方系注册于北京的公司。</text>
    		<br />
    		<text style="margin-left:30px;margin-top:20px;">2.愿意就经纪事务展开合作。</text>

    	<button id="but" class="weui-btn weui-btn_warn sign_up" style="margin:30px 0 30px 0;">申请签约</button>
  </body>
  <script type="text/javascript">
    $(".sign_up").click(function(){
      $.ajax({
          url:"/index/sign/con_data",
          type:"POST",
          data:'',
          dataType:'JSON',
          success:function (data) {
            if(!data){
              window.location.href='/index/sign/sign_agency'
            }else{
                weui.confirm('去查看？', {
                  title: '您已经签约过了！',
                  buttons: [{
                      label: '取消',
                      type: 'default',
                      onClick: function(){
                        }
                  }, {
                      label: '确定',
                      type: 'primary',
                      onClick: function(){
                        window.location.href='/index/sign/contractinfo'
                      }
                  }]
                });
            }
          }
      })
    });
  </script>
</html>
