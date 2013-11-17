<?php
if ( isset ( $_GET["width"] ) && isset ( $_GET["text"] ) ) {
  $width = $_GET["width"];
  $height = 20;
  $text = $_GET["text"];
  $im = imagecreatetruecolor ( 200, $height );				// 创建图像
  $white = imagecolorallocate ( $im, 255, 255, 255 );		// 分配颜色
  $black = imagecolorallocate ( $im, 0, 0, 0 );
  $blue = imagecolorallocate ( $im, 0, 0, 255 );
  $red = imagecolorallocate ( $im, 255, 0, 0 );
  $green = imagecolorallocate ( $im, 0, 255, 0 );
  $magenta = imagecolorallocate($im, 255, 0, 255);
  $text = iconv ( "GB2312", "UTF-8", $text );	// 对字符串进行字符集转换
  $font = "simsun.ttc";							// 设置字体文件

  imagefilledrectangle ( $im, 0, 0, 200, $height, $white );		// 画一填充矩形
  imagefilledrectangle ( $im, 0, 0, $width, $height, $magenta );	// 画一填充矩形
  imagerectangle ( $im, 0, 0, 200 - 1, $height - 1, $blue );	// 画一矩形

  imagettftext ( $im, 9, 0, 80, 15, $black, $font, $text );		// 添加文本（红色）
  header ( "Content-type: image/gif" );				// 设置输出内容的类型
  imagegif ( $im );								// 以PNG格式输出图像
  imagedestroy($im);
}
?>