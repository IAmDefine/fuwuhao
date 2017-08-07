<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"E:\xampp\htdocs\wechat\public/../application/index\view\userinfo\auth.html";i:1501839044;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="/css/weui.min.css">
    <script type="text/javascript" src="/js/weui.min.js"></script>
    <script src="/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="/js/lib/plupload-2.1.2/js/plupload.full.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>实名认证</title>
    <style>
    html,body{
      width: 100%;
      height: auto;
      padding-bottom: 20px
    }
    div{box-sizing: border-box;}
        .weui-uploader__bd{
            overflow: inherit;
        }
        .type_img{
            width:45%;
            height:119px;
            float: left;
            margin-left:10px;
        }
        .img{
            width:100%;
            height:119px;}
        .ying{
            color: red;
            float: left;
            position: relative;
            left:-115px;
            font-size: 14px;
        }
        #up{
          position: fixed;
          left: 0;
          height: 50px;
          bottom: 0;
          background-color: #EB2000;
          border: 0;
          color: white;
        }
        .weui-uploader__bd{overflow: hidden;
            margin: 0;
        }

        .weui-uploader{
          border-bottom: 10px solid #EBEBEB;
          padding-bottom: 10px
        }
        .submit_btn{
          width: 100%;
          height: 50px;
        }
    </style>
</head>
<body ontouchstart>
<form id="form">
 <div class="weui-cells">
    <a class="weui-cell weui-cell_access type" href="javascript:;">
        <div class="weui-cell__bd">
            <p id="types">证件类型：多证合一</p>
            <input type="hidden" name="credtype" id="credtype" value="2">
        </div>
        <div class="weui-cell__ft">
        </div>
    </a>
</div>
<div class="weui-cells">
    <a class="weui-cell weui-cell_access gender" href="javascript:;">
        <div class="weui-cell__bd">
            <p id="gender">明星性别：女</p>
            <input type="hidden" name="gender" id="xingbie" value="1">
        </div>
        <div class="weui-cell__ft">
        </div>
    </a>
</div>
<div class="weui-cells weui-cells_form">

    <div id="f_dis" style="display: block">
    <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">企业名称：</label></div>
        <div class="weui-cell__bd">
            <input class="weui-input bizname" name="bizname" type="text" placeholder="请输入企业名称"/>
        </div>
    </div>
    <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">企业注册号：</label></div>
        <div class="weui-cell__bd">
            <input class="weui-input compno" name="compno" type="text" placeholder="请输入企业注册号"/>
        </div>
    </div>
    </div>
    <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">明星艺名：</label></div>
        <div class="weui-cell__bd">
            <input class="weui-input" name="names" type="text"  placeholder="请输入明星艺名"/>
        </div>

    </div>

    <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">明星姓名：</label></div>
        <div class="weui-cell__bd">
            <input class="weui-input" name="oldname" type="text" placeholder="请输入姓名"/>
        </div>
    </div>
    <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">身份证号：</label></div>
        <div class="weui-cell__bd">
            <input class="weui-input" type="text" name="idno" placeholder="请输入身份证号"/>
        </div>
    </div>
    <div class="weui-cell">
        <div class="weui-cell__hd"><label class="weui-label">邮箱：</label></div>
        <div class="weui-cell__bd">
            <input class="weui-input" type="text" name="email" placeholder="请输入电子邮箱"/>
        </div>
    </div>
</div>

<div id="dis2" style="display: block;overflow:hidden">
<div class="weui-uploader" style="">
    <div class="weui-uploader__bd">
        <div class="type_img">
            <image src="/imgs/upload_item1.png" class="img" />
        </div>
        <div class="weui-uploader__input-box"  style="width:45%;height:100px;margin: 10px 10px 0 0;" onclick="setvar(1)">
            <input id="selectfiles"  class="weui-uploader__input" />
            <input type="hidden" name="tradcert" id="imgurl1">
            <image src="" id="img1" style="width:100%;height:100%"/>
        </div>
        <div class="ying">
            营业执照
        </div>
    </div>
</div>
<div class="weui-uploader" >
    <div class="weui-uploader__bd">
        <div class="type_img">
            <image src="/imgs/upload_item1.png" class="img" />
        </div>

        <div class="weui-uploader__input-box"  style="width:45%;height:100px;margin: 10px 10px 0 0;" onclick="setvar(2);">
            <a class="weui-uploader__input" id="selectfiles2" ></a>
            <input type="hidden" name="entrus" id="imgurl2">
            <image src="" id="img2" style="width:100%;height:100%"/>
        </div>
        <div class="ying">企业委托书</div>
    </div>
</div>
</div>
<div class="weui-uploader" >
    <div class="weui-uploader__bd">
        <div class="type_img">
            <image src="/imgs/upload_item1.png" class="img" />
        </div>
        <div class="weui-uploader__input-box" style="width:45%;height:100px;margin: 10px 10px 0 0;" onclick="setvar(3)">
            <a id="selectfiles3" class="weui-uploader__input"></a>
            <input type="hidden" name="admcard" id="imgurl3">
            <image src="" id="img3" style="width:100%;height:100%"/>
        </div>
        <div class="ying" style="position: relative;left:-135px">明星身份证正面</div>
    </div>
</div>

<div class="weui-uploader" >
    <div class="weui-uploader__bd">
        <div class="type_img">
            <image src="/imgs/upload_item1.png" class="img" />
        </div>

        <div class="weui-uploader__input-box" style="width:45%;height:100px;margin: 10px 10px 0 0;" onclick="setvar(4)">
            <a id="selectfiles4" class="weui-uploader__input"></a>
            <input type="hidden" name="reveside" id="imgurl4">
            <image src="" id="img4" style="width:100%;height:100%"/>
        </div>
        <div class="ying" style="position: relative;left:-135px">明星身份证反面</div>
</div>
</div>

<div class="weui-uploader" >
    <div class="weui-uploader__bd">
        <div class="type_img">
            <image src="/imgs/upload_item1.png" class="img" />
        </div>

        <div class="weui-uploader__input-box" style="width:45%;height:100px;margin: 10px 10px 0 0;" onclick="setvar(5)">
            <a  id="selectfiles5" class="weui-uploader__input"></a>
            <input type="hidden" name="handid" id="imgurl5">
            <image src="" id="img5" style="width:100%;height:100%"/>
        </div>
        <div class="ying" style="position: relative;left:-155px">明星手持身份证正面照</div>
    </div>
</div>

<div id="dis1" style="display: none">
 <div class="weui-uploader" style="">
    <div class="weui-uploader__bd">
        <div class="type_img">
            <image src="/imgs/upload_item1.png" class="img" />
        </div>
        <div class="weui-uploader__input-box" style="width:45%;height:100px;margin: 10px 10px 0 0;" onclick="setvar(6)">
            <a id="selectfiles6" class="weui-uploader__input"></a>
            <input type="hidden" name="groupcode" id="imgurl6">
            <image src="" id="img6" style="width:100%;height:100%"/>
        </div>
        <div class="ying" style="position: relative;left:-135px">组织结构代码证</div>
    </div>
</div>
</div>

</form>

<button class="submit_btn" id="up">保存并上传</button>


</body>
<script>
  $(".type").click(function(){
      weui.picker([
          {
              label: '多证合一',
              value: 2

          },
          {
              label: '普通证件',
              value: 1
          },
          {
              label: '个人认证',
              value: 3
          }
      ], {
          className: 'custom-classname',
          defaultValue: [2],
          onConfirm: function (result) {
              $("#types").text('证件类型：'+result[0]['label']);
              var types = result[0]['value'];
              $("#credtype").val(types);
              if(types==2){
                  $("#dis1").css('display','none');
                  $("#dis2").css('display','block');
                  $("#f_dis").css('display','block');
                  $("#imgurl6").val("");
                 $("#img6").attr('src',"");
              }else if(types==1){
                  $("#dis1").css('display','block');
                  $("#dis2").css('display','block');
                  $("#f_dis").css('display','block')
              }else if(types==3){
                  $("#dis2").css('display','none');
                  $("#dis1").css('display','none');
                  $("#f_dis").css('display','none');
                 $(".compno").val("");
                 $(".bizname").val("");
                 $("#imgurl1").val("");
                 $("#img1").attr('src',"");
                 $("#imgurl2").val("");
                 $("#img2").attr('src',"");
                $("#imgurl6").val("");
                 $("#img6").attr('src',"");
              }
          },
          id: 'singleLinePicker'
      });
  })

  //性别
  $(".gender").click(function(){
     weui.picker([
          {
              label: '女',
              value: 1

          },
          {
              label: '男',
              value: 2
          },

      ], {
          className: 'custom-classname',
          defaultValue: [1],
          onConfirm: function (result) {
              $("#gender").text('明星性别：'+result[0]['label']);
              var gender = result[0]['value'];
              $("#xingbie").val(gender)

          },
          id: 'singleLinePicker'
      });

  });


    //上传
  function setvar(valnum) {
      whichf = valnum;
  }

  accessid = '';
  accesskey = '';
  host = '';
  policyBase64 = '';
  signature = '';
  callbackbody = '';
  filename = '';
  key = '';
  expire = 0;
  g_object_name = '';
  g_object_name_type = '';
  now = timestamp = Date.parse(new Date()) / 1000;
  fname = '';
  whichf = 1;

  //实例化一个plupload上传对象
  var uploader = new plupload.Uploader({
      browse_button: ['selectfiles', 'selectfiles2', 'selectfiles3', 'selectfiles4', 'selectfiles5', 'selectfiles6'], //触发文件选择对话框的按钮，为那个元素id
      url: 'upload.php', //服务器端的上传页面地址
      flash_swf_url: 'js/Moxie.swf', //swf文件，当需要使用swf方式进行上传时需要配置该参数
      silverlight_xap_url: 'js/Moxie.xap' //silverlight文件，当需要使用silverlight方式进行上传时需要配置该参数

  });

  uploader.init();
  uploader.bind('FilesAdded', function (uploader, files) {
    // var loading = weui.loading('请稍后', {
    //   className: 'custom-classname'
    // });
//        var index = layer.load(1, {
//            shade: [0.1,'#fff'] //0.1透明度的白色背景
//        });
      plupload.each(files, function (file) {
          //document.getElementById('ossfile').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ')<b></b>'+ '<div class="progress"><div class="progress-bar" style="width: 0%"></div></div>'+ '</div>';
      });
      uploader.start();
  });
  uploader.bind('UploadProgress', function (uploader, file) {
//var d = document.getElementById(file.id);
//d.getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
//var prog = d.getElementsByTagName('div')[0];
//var progBar = prog.getElementsByTagName('div')[0]
//progBar.style.width = 2 * file.percent + 'px';
//progBar.setAttribute('aria-valuenow', file.percent);
  });
  uploader.bind('FileUploaded', function (uploader, file, info) {
      if (info.status == 200)
      {

          $("#img" + whichf).attr('src', host + "/" + g_object_name);
          $("#imgurl" + whichf).val( host + "/" + g_object_name);
          console.log(whichf)
            console.log(host + "/" + g_object_name)
      } else
      {
          document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = info.response;
      }
  });
  uploader.bind('BeforeUpload', function (uploader, file) {
      ret = get_signature();
      g_object_name = key;
      filetmp = file.name;
      if (filetmp != '') {
          suffix = get_suffix(filetmp)
          calculate_object_name(filetmp)
      }
      new_multipart_params = {
          'key': g_object_name,
          'policy': policyBase64,
          'OSSAccessKeyId': accessid,
          'success_action_status': '200', //让服务端返回200,不然，默认会返回204
          'callback': callbackbody,
          'signature': signature,
      };

      uploader.setOption({
          'url': host,
          'multipart_params': new_multipart_params
      });

  });
  function get_signature()
  {
//可以判断当前expire是否超过了当前时间,如果超过了当前时间,就重新取一下.3s 做为缓冲
      now = timestamp = Date.parse(new Date()) / 1000;
//if (expire < now + 3)
//{
      body = send_request();
      var obj = eval("(" + body + ")");
      host = obj['data']['domain']
      policyBase64 = obj['data']['policy']
      accessid = obj['data']['accessid']
      signature = obj['data']['signature']
      expire = parseInt(obj['data']['expire'])
      callbackbody = obj['data']['callback']
      key = obj['data']['dir']
      fname = obj['data']['fname']
      return true;
//}
//return false;
  }
  function calculate_object_name(filename)
  {
      suffix = get_suffix(filename);
      g_object_name = g_object_name + "/" + fname + suffix;
      return '';
  }
  function send_request()
  {
      var xmlhttp = null;
      if (window.XMLHttpRequest)
      {
          xmlhttp = new XMLHttpRequest();
      } else if (window.ActiveXObject)
      {
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }

      if (xmlhttp != null)
      {
          serverUrl = 'https://api.youxingku.cn/aliyun/upload/php/get.php';
          xmlhttp.open("POST", serverUrl, false);
          xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
          xmlhttp.send("types=1&uid=777");
          return xmlhttp.responseText;
      } else
      {
          alert("Your browser does not support XMLHTTP.");
      }
  }
  function get_suffix(filename) {
      pos = filename.lastIndexOf('.')
      suffix = ''
      if (pos != -1) {
          suffix = filename.substring(pos)
      }
      return suffix;
  }
</script>
<script>
    $("#up").click(function(){
        var info = $("#form").serialize()
        info = decodeURIComponent(info,true);
        var loading = weui.loading('请稍后', {
          className: 'custom-classname'
        });
       $.ajax({
           url:"/index/userinfo/addauth",
           type:"POST",
           data:info,
           dataType:'JSON',
           success:function (data) {
            if(data==1){
               loading.hide(function() {
               });
                weui.toast('操作成功', {
                  duration: 1500,
                  className: 'custom-classname',
                  callback: function(){
                     window.location.href = '/index/sign/myinfo';
                 }
            });
            }
           }
       });
    })
</script>
</html>
