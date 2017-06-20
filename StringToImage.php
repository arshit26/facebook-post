<?php
/**
 * StringToImage class
 * This class converts the user entered Quote to an image
 */
class StringToImage {
    private $img;
    
    /**
     * Create image from text
     * @param string text to convert into image
     * @param int font size of text
     * @param int width of the image
     * @param int height of the image
     */
    function createImage($text,$back_col,$txt_col, $fontSize = 20, $imgWidth = 400, $imgHeight = 400){

		//This is the path of the font to be given to the text
        $font = 'fonts/arial.ttf';
	    list($br, $bg, $bb) = sscanf($back_col, "#%02x%02x%02x"); // to convert the hex codes in to rgb format
		list($tr, $tg, $tb) = sscanf($txt_col, "#%02x%02x%02x");
        $angle = 0;
        //To create a Box For the Image
        $this->img = imagecreatetruecolor($imgWidth, $imgHeight);
        //Now declaring some Colors
        $background = imagecolorallocate($this->img, $br,$bg,$bb); // the color for background of quote
        $grey = imagecolorallocate($this->img, 128, 128, 128);
        $txtColor = imagecolorallocate($this->img, $tr,$tg,$tb); // the color for the text on the image
        imagefilledrectangle($this->img, 0, 0, $imgWidth - 1, $imgHeight - 1, $background);
        
        //break lines
        $splitText = explode ( " " , $text ); // Exploding the String on the base of WhiteSpaces
        $lines = count($splitText);
        // Now individually adding each line to the image
        foreach($splitText as $txt){
            $textBox = imagettfbbox($fontSize,$angle,$font,$txt); //  Give the bounding box of a text using TrueType fonts
            $textWidth = abs(max($textBox[2], $textBox[4])); // index 2 and 4 are x coordinates of lower right and upper right corner
            $textHeight = abs(max($textBox[5], $textBox[7]));// index 5 and 5 are y coordinates of upper right and upper left corner
            $x = (imagesx($this->img) - $textWidth)/2;
            $y = ((imagesy($this->img) + $textHeight)/2)-($lines-2)*$textHeight;
            $lines = $lines-1;
        
            //add some shadow to the text
            imagettftext($this->img, $fontSize, $angle, $x-1, $y-1, $grey, $font, $txt);
            
            //add the text
            imagettftext($this->img, $fontSize, $angle, $x, $y, $txtColor, $font, $txt);
        }
	return true;
    }
    
    /**
     * Display image
     */
    function showImage(){
        header('Content-Type: image/png');
        return imagepng($this->img);
    }
    
    /**
     * Save image as png format
     * @param string file name to save
     * @param string location to save image file
     */
    function saveImage($fileName = 'text-image', $location = 'images/'){
        $fileName = $fileName.".png";
        $fileName = !empty($location)?$location.$fileName:$fileName;
        return imagepng($this->img, $fileName);
    }

}
