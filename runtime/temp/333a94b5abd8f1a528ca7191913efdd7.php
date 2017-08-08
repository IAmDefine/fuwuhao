<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"E:\xampp\htdocs\wechat\public/../application/index\view\sign\sign_agency.html";i:1502164385;}*/ ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
  	<link rel="stylesheet" href="/css/weui.min.css">
    <script src="/js/jquery-1.8.3.min.js"></script>
  	<script type="text/javascript" src="/js/weui.min.js"></script>
    <title>签约</title>
  </head>
  <body>
    <form id="form">
    	<div class="weui-cells weui-cells_form">
        <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">乙方：</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input" type="text" value="<?php echo (isset($sinfo['bizname'] ) && ($sinfo['bizname']  !== '')?$sinfo['bizname'] :''); ?>" name="bizname" placeholder="请输入公司名称"/>
            </div>
        </div>

         <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">地址：</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input" type="text" value="<?php echo (isset($sinfo['addr'] ) && ($sinfo['addr']  !== '')?$sinfo['addr'] :''); ?>" name="addr" placeholder="请输入公司地址"/>
            </div>
        </div>
     <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">证件号码：</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input" type="text" value="<?php echo $sinfo['idno']; ?>"  readonly="readonly"/>
            </div>
        </div>
         <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">电子邮箱：</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input" type="text" name="email" value="<?php echo $sinfo['email']; ?>" placeholder="请输入邮箱"/>
            </div>
        </div>
         <div class="weui-cell">
            <div class="weui-cell__hd"><label class="weui-label">联系人电话：</label></div>
            <div class="weui-cell__bd">
                <input class="weui-input" type="number" name='tel' value="<?php echo \think\Session::get('wx_userinfo')['mobile']; ?>" placeholder="请输入电话"/>
            </div>
        </div>
        <div class="weui-cell">
           <div class="weui-cell__hd"><label class="weui-label">艺名：</label></div>
           <div class="weui-cell__bd">
               <input class="weui-input" value="<?php echo $sinfo['names']; ?>"  readonly="readonly"/>
           </div>
       </div>

       <a class="weui-cell weui-cell_access deadline" href="javascript:;">
         <div class="weui-cell__bd">
             <p id="deadline">合作期限：24个月</p>
             <input type="hidden" name="time" id="time" value="24">
         </div>
         <div class="weui-cell__ft">
         </div>
        </a>

        <a class="weui-cell weui-cell_access country" href="javascript:;">
          <div class="weui-cell__bd">
              <p id="country">国籍：中国</p>
              <input type="hidden" name="country" id="con" value="1">
          </div>
          <div class="weui-cell__ft">
          </div>
         </a>

        <div class="weui-cell">
           <div class="weui-cell__hd"><label class="weui-label">维权费用：</label></div>
           <div class="weui-cell__bd">
               <input class="weui-input" type="number" name="weiquan" placeholder="请输入维权费用占比"/>
           </div>
       </div>
       <div class="weui-cell">
          <div class="weui-cell__hd"><label class="weui-label">商务收入：</label></div>
          <div class="weui-cell__bd">
              <input class="weui-input" type="number" name="shangwu" placeholder="请输入商务收入占比"/>
          </div>
      </div>
      <div class="weui-cell">
         <div class="weui-cell__hd"><label class="weui-label">开户银行：</label></div>
         <div class="weui-cell__bd">
             <input class="weui-input" type="text" value="<?php echo (isset($sinfo['openbank']) && ($sinfo['openbank'] !== '')?$sinfo['openbank']:''); ?>" name="openbank" placeholder="请输入开户银行"/>
         </div>
     </div>
      <div class="weui-cell">
         <div class="weui-cell__hd"><label class="weui-label">银行账户：</label></div>
         <div class="weui-cell__bd">
             <input class="weui-input" type="text" value="<?php echo (isset($sinfo['account']) && ($sinfo['account'] !== '')?$sinfo['account']:''); ?>" name="account" placeholder="请输入银行账户"/>
         </div>
     </div>
    	</div>
    </form>
    <button class="weui-btn weui-btn_warn up" style="margin-top:20px;">提交</button>
  </body>
  <script type="text/javascript">
    $(".deadline").click(function(){
       weui.picker([
            {
                label: '24个月',
                value: 24

            },
            {
                label: '36个月',
                value: 36
            },

        ], {
            className: 'custom-classname',
            defaultValue: [1],
            onConfirm: function (result) {
                $("#deadline").text('合作期限：'+result[0]['label']);
                var gender = result[0]['value'];
                $("#time").val(gender)

            },
            id: 'singleLinePicker'
        });
    });
    //国籍
    var items = [
         {
             label: '中国',
             value: 1

         },
         {
             label: '韩国',
             value: 2
         },
         {
             label: '日本',
             value: 3
         },
         {
             label: '新加坡',
             value: 4
         },
         {
             label: '美国',
             value: 5
         },

     ];
    $("#country").click(function(){
      weui.picker(
        items,
        {
           className: 'custom-classname',
           defaultValue: [1],
           onConfirm: function (result) {
               $("#country").text('国籍：'+result[0]['label']);
               var con = result[0]['value'];
              $("#con").val(con)

           },
           id: 'singleLinePicker'
       });
    });

    //提交表单
    $('.up').click(function(){
      var info = $("form").serialize()
      info = decodeURIComponent(info,true);
      $.ajax({
        url:"/index/sign/signup",
        type:"POST",
        data:info,
        dataType:'JSON',
        success:function (data) {
        //  console.log(data);return;
          if(data['status']==1){
            window.location.href='/index/sign/contractinfo'
          }else{
            weui.alert(data['msg']);            
          }
        }
      });
    })
  </script>
</html>
