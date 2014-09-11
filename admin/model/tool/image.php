<?php
class ModelToolImage extends Model {
	public function resize($filename, $width, $height) {
		if (!file_exists(DIR_IMAGE . $filename) || !is_file(DIR_IMAGE . $filename)) {
			return;
		} 
		
		$info = pathinfo($filename);
		
		$extension = $info['extension'];
		
		$old_image = $filename;
		$new_image = 'cache/' . utf8_substr($filename, 0, utf8_strrpos($filename, '.')) . '-' . $width . 'x' . $height . '.' . $extension;
		
		if (!file_exists(DIR_IMAGE . $new_image) || (filemtime(DIR_IMAGE . $old_image) > filemtime(DIR_IMAGE . $new_image))) {
			$path = '';
			
			$directories = explode('/', dirname(str_replace('../', '', $new_image)));
			
			foreach ($directories as $directory) {
				$path = $path . '/' . $directory;
				
				if (!file_exists(DIR_IMAGE . $path)) {
					@mkdir(DIR_IMAGE . $path, 0777);
				}		
			}
			
			$image = new Image(DIR_IMAGE . $old_image);
			$image->resize($width, $height);
			$image->save(DIR_IMAGE . $new_image);
		}
	
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			return HTTPS_CATALOG . 'image/' . $new_image;
		} else {
			return HTTP_CATALOG . 'image/' . $new_image;
		}	
	}

    /*
     * Blitz code
     * Adds text to image
     * @param text string
     * @param filename string
     * @param newfilename string
     */
    public function addTextToImage($text,$filename,$newfilename)
    {

        if (!file_exists(DIR_IMAGE . $filename) || !is_file(DIR_IMAGE . $filename)) {
            return;
        }

        $info = pathinfo($filename);

        $extension = $info['extension'];

        $old_image = $filename;
        $new_image = $newfilename.'.'.$extension;

        $path = '';

        $directories = explode('/', dirname(str_replace('../', '', $new_image)));

        foreach ($directories as $directory) {
            $path = $path . '/' . $directory;

            if (!file_exists(DIR_IMAGE . $path)) {
                @mkdir(DIR_IMAGE . $path, 0777);
            }
        }

        // Create Image From Existing File
        $jpg_image = imagecreatefromjpeg('sunset.jpg');

        // Allocate A Color For The Text
        $white = imagecolorallocate($jpg_image, 255, 255, 255);

        // Set Path to Font File
        $font_path = 'font.TTF';

        // Set Text to Be Printed On Image
        $text = "This is a sunset!";

        // Print Text On Image
        imagettftext($jpg_image, 25, 0, 75, 300, $white, $font_path, $text);

        // Send Image to Browser
        imagejpeg($jpg_image);

        // Clear Memory
        imagedestroy($jpg_image);
    }
}
?>