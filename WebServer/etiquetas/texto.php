<?php

$text = $_GET['text'];
$font = $_GET['font'];
$size_font = $_GET['size_font'];
$size_paper = $_GET['size_paper'];

$text = str_replace("<br>", PHP_EOL, $text);


function createimageinstantly($text,$font,$size_font,$size_paper){
    $x=536;
    $y=278;
    //header('Content-Type: image/png');
    $targetFolder = '';
    $targetPath = $targetFolder;


    $outputImage = imagecreatetruecolor($x, $y);

    // set background to white
    $white = imagecolorallocate($outputImage, 255, 255, 255);
    $black = imagecolorallocate($outputImage, 0, 0, 0);
    imagefill($outputImage, 0, 0, $white);


    $font = "fonts/".$font.".ttf";
		$angle = 0;

		$dimensions = imagettfbbox($size_font, 0, $font, $text);

		$textWidth = abs($dimensions[4] - $dimensions[0]);
		$textHeigh = abs($dimensions[7] - $dimensions[1]);
		$margin_midlle = ($y-$textHeigh)/2;

		if($textWidth<$x)
		{
			if(strrpos($text,PHP_EOL)!=-1)
			{
					$divided = explode(PHP_EOL,$text);
					for($i=0;$i<count($divided);$i++)
					{
						$dimensions = imagettfbbox($size_font, 0, $font, $divided[$i]);
						$textWidth = abs($dimensions[4] - $dimensions[0]);
						$margin_left = ($x-$textWidth)/2;
						imagettftext($outputImage, $size_font, 0, $margin_left, $size_font+$margin_midlle+($size_font*1.2*$i), $black, $font, $divided[$i]);
					}
			}
			else {
				$dimensions = imagettfbbox($size_font, 0, $font, $text);
				$textWidth = abs($dimensions[4] - $dimensions[0]);
				$margin_left = ($x-$textWidth)/2;
				imagettftext($outputImage, $size_font, 0, $margin_left, $size_font, $black, $font, $text);
			}

		}
		else
		{
			echo "maior";
			$name_explded = str_split($text,33);
			for($i=0;$i<count($name_explded);$i++)
			{
				$dimensions = imagettfbbox($size_font, 0, $font, $name_explded[$i]);
				$textWidth = abs($dimensions[4] - $dimensions[0]);
				$margin_left = ($x-$textWidth)/2;

				imagettftext($outputImage, $size_font, 0, $margin_left, $size_font+($size_font*$i), $black, $font, $name_explded[$i]);
			}

		}


    $filename ='generated.png';
    imagepng($outputImage, $filename);

}



createimageinstantly($text,$font,$size_font,$size_paper);

if($_GET['print']==1) exec('sh /var/www/html/print.sh '.$size_paper.' generated.png',$output);
//echo "<img src='generated.png' alt='error' style='border:1px solid gray;'>";

 ?>
