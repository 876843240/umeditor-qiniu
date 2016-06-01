# umeditor-qiniu
很多umeditor的项目上传图片到qiniu都是通过后端上传，此项目是通过javascript的方式直接传到qiniu，（获取token除外），这样能够提升速度，减少服务器压力
目前不支持IE9已下浏览器 (支持HTML5即可)

## UMeditor
UMeditor，简称UM，是 [Ueditor](http://ueditor.baidu.com) 的简版。是为满足广大门户网站对于简单发帖框和回复框的需求，专门定制的在线富文本编辑器，UM的主要特点就是容量和加载速度上的改变，主文件的代码量为139k，而且放弃了使用传统的iframe模式，采用了div的加载方式，因为这种优势，所以本人在后台管理系统中也习惯用这个编辑器

##QINIU
七牛云存储（以下简称七牛），是专为移动时代开发者打造的数据管理平台，为互联网网站和移动App提供数据的在线托管、传输加速以及图片、音视频等富媒体的云处理服务。

##配置
再editor目录下找到umeditor.config.js
```
,qiniuTokenUrl: "/getQiniuToken.php"       //获取上传Token地址
,qiniuUploadUrl: "http://upload.qiniu.com" //QINIU提交地址
```
getQiniuToken.php是获取QINIU上传授权的token，可以换成java、python或是其他的地址，当放回的数据json数据必须包括以下两个字段：
```
{
  "token": "xxxxxxx"    // QINIU token,
  "path": "http://...." // QINIU文件地址域名
  "key": "editor/images/".md5(time().microtime()).".jpg"; // 文件名称
}
```
key为选填, 如果为空则按qiniu自动生成的hash作为文件名, 如果需要自定义文件名设置key字段
