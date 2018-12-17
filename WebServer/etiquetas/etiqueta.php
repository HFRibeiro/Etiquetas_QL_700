<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require('DB.php'); // Get database data

include('src/BarcodeGenerator.php');
include('src/BarcodeGeneratorPNG.php');
include('src/BarcodeGeneratorSVG.php');
include('src/BarcodeGeneratorJPG.php');
include('src/BarcodeGeneratorHTML.php');

$reference = $_GET['reference'];
$price_get = $_GET['price'];

$query = "SELECT `price` , `name` FROM `produtosMoloni` WHERE `reference` = '$reference'";

	try {
	$stmt2 = $pdo->prepare($query);
	$data2 = $stmt2->execute();
        $primary_search2 = $stmt2->fetchAll();
	$number_of_rows = $stmt2->rowCount();
	$k=0;
	Foreach($primary_search2 as $match2)
	{
		$price = $match2['price']*1.23;
		$price = number_format($price, 2);
                $price .= "€";
                $name = $match2['name'];
	}

	} catch (PDOException $e) {
		echo "Error: " . $e->getMessage() . "<br />\n";
	}


$generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
file_put_contents('gerado.png', $generatorPNG->getBarcode($reference, $generatorPNG::TYPE_CODE_128));

$x=536;
$y=278;
//header('Content-Type: image/png');
$targetFolder = '';
$targetPath = $targetFolder;

$img1 = $targetPath.'logo.jpg';
$img2 = $targetPath.'gerado.png';

$outputImage = imagecreatetruecolor($x, $y);

// set background to white
$white = imagecolorallocate($outputImage, 255, 255, 255);
$black = imagecolorallocate($outputImage, 0, 0, 0);
imagefill($outputImage, 0, 0, $white);

$first = imagecreatefromjpeg($img1);
$second = imagecreatefrompng($img2);

imagecopyresized($outputImage,$first,0,0,0,0, 213, 96,213,96);
imagecopyresized($outputImage,$second,20,190,0,0, 492, 60,246,30);


// Add the text
//imagettftext ( resource $image , float $size , float $angle , int $x , int $y , int $color , string $fontfile , string $text )
//$white = imagecolorallocate($im, 255, 255, 255);
$font = 'fonts/Arial.ttf';
$angle = 0;
$dimensions = imagettfbbox(55, $angle, $font, $price);
$textWidth = abs($dimensions[4] - $dimensions[0]);

$x_margin = $x - $textWidth-2;

if($price_get==1)
{
	imagettftext($outputImage, 55, 0, $x_margin, 55, $black, $font, $price);
}


$name_explded = str_split($name,33);
for($i=0;$i<count($name_explded);$i++)
{
//echo $name_explded[$i]."<br>";
	$dimensions = imagettfbbox(25, 0, $font, $name_explded[$i]);
	$textWidth = abs($dimensions[4] - $dimensions[0]);
	$margin_left = ($x-$textWidth)/2;

	imagettftext($outputImage, 25, 0, $margin_left, 135+(40*$i), $black, $font, $name_explded[$i]);
}


$dimensions = imagettfbbox(25, 0, $font, $reference);
$textWidth = abs($dimensions[4] - $dimensions[0]);
$margin_left = ($x-$textWidth)/2;
imagettftext($outputImage, 23, 0, $margin_left, 278, $black, $font, $reference);


$filename ='generated.png';
imagepng($outputImage, $filename);

if($_GET['print']==1)
{
	$myfile = fopen("state.txt", "w") or die("Unable to open file!");
	$txt = "1";
	fwrite($myfile, $txt);
	fclose($myfile);
}
echo "<img src='generated.png?dummy=".rand()."' alt='error' style='border:1px solid black;'>";

 ?>
