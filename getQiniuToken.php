<?php
/**
 * Created by PhpStorm.
 * User: yongsheng.li
 * Date: 6/1/16
 * Time: 5:15 PM
 */
include('qiniu-php/autoload.php');

use Qiniu\Auth;

// 用于签名的公钥和私钥
$accessKey = ''; // 公钥
$secretKey = ''; // 私钥
$bucket = '';   // Bucket目录

// 初始化签权对象
$auth = new Auth($accessKey, $secretKey);

$response = array();
$response['path'] = 'http://xxx.z0.glb.clouddn.com'; // 设置图片目录路径
$response['token'] = $auth->uploadToken($bucket);

echo json_encode($response);
