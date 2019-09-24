<?php
/**
 * Functions
 * ------------------
 * By Az
 *
 */


/**
 * ----------------------------------------
 * ANTI INJECTION
 * ----------------------------------------
 */
if ( ! function_exists( 'anti_injection' ) ) {
	function anti_injection( $data ){
		$filter = stripslashes( strip_tags( htmlspecialchars( $data, ENT_QUOTES ) ) );
		return $filter;
	}
}


/**
 * ----------------------------------------
 * ENCYRPTION PASSWORD
 * ----------------------------------------
 */
if ( ! function_exists( 'encyript_password' ) ) {
	function encyript_password( $password ) {
		$salt = '!@#$%^&*()<>?:9876543210ABCDEFG';
		return md5( $password.md5( $password.$salt ) );
	}
}


/**
 * ----------------------------------------
 * RANDOM CHAR
 * ----------------------------------------
 */
if ( ! function_exists( 'random_char' ) ) {
	function random_char( $filename, $length ) {
		$char = '0987654321'. $filename;
		$str_replace = str_replace( array( ' ', '.', ',', '+', ':', '/', '*', '^', '%', '$', '#', '(', ')', '_', '-' ), '', $char );
		$shuffle_string = substr( str_shuffle( $str_replace ), 0, $length ); // exp use substr ->> substr( $str, 0, 5 );
		return $shuffle_string;
	}
}
// str_shuffle -> random character
// shuffle -> random char with array, 
// ex: $my_array = array("red","green","blue","yellow","purple"); shuffle( $my_array );


/**
 * ----------------------------------------
 * RANDOM NUMBER
 * ----------------------------------------
 */
if ( ! function_exists( 'random_number' ) ) {
	function random_number( $filename, $length ) {
		$char = '098765432101234567890';
		$str_replace = str_replace( array( ' ', '.', ',', '+', ':', '/', '*', '^', '%', '$', '#', '(', ')', '_', '-' ), '', $char );
		$shuffle_string = substr( str_shuffle( $str_replace ), 0, $length ); // exp use substr ->> substr( $str, 0, 5 );
		return $shuffle_string;
	}
}


/**
 * ----------------------------------------
 * LIMIT CHAR
 * ----------------------------------------
 */
if ( ! function_exists( 'limitChar' ) ) {
	function limitChar( $content, $limit ) {
	    if ( strlen( $content ) <= $limit ) {
	        return $content;
	    } else {
	        $excerpt = substr( $content, 0, $limit );
	        return $excerpt ." ... ";
	    }
	}
}


/**
 * ----------------------------------------
 * LIMIT WORD
 * ----------------------------------------
 */
if ( ! function_exists( 'limitWord' ) ) {
	function limitWord( $string, $word_limit ) {
	   $words = explode( " ", $string );
	   return implode( " ", array_splice( $words, 0, $word_limit ) );
	}
}


/**
 * ----------------------------------------
 * Filter Word For Parameter URL
 * ----------------------------------------
 * Mengganti spasi dengan (-) pada parameter url 
 *
 */
if ( ! function_exists( 'my_slug' ) ) {
	function my_slug( $string ) {
		$string_lowercase = strtolower( $string );
		$filter = str_replace( array( ' ', '.', ',', ':', '/', '*', '^', '%', '$', '#', '(', ')', '_', "'", '"' ), '-', $string_lowercase );
		$max_dash = 1;
		$val_find = '-';
		$val_replace = '';

		while ( $max_dash > 0 ) {
			$val_find = $val_find . '-';
			$val_replace = $val_replace . '-';
			$max_dash--;
		}

		while ( strrpos( $filter, $val_find ) !== false ) {
			 $filter = str_replace( $val_find, $val_replace, $filter );
		}
		return $filter;
	}
}


/**
 * ----------------------------------------
 * FORMAT NUMBER (RUPIAH)
 * ----------------------------------------
 */
if ( ! function_exists( 'idr' ) ) {
	function idr( $number ) {
		$money = "IDR ". number_format( $number,0,',','.' );
	return $money;
	}
}


/**
 * ----------------------------------------
 * GET BASE URL
 * ----------------------------------------
 */
if ( ! function_exists( 'base_url' ) ) {
	function base_url() {
		return sprintf(
			"%s://%s%s",
			isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
			$_SERVER['SERVER_NAME'],
			$_SERVER['REQUEST_URI']
		);
	}
}


/**
* ----------------------------------------
* RESIZE IMAGE
* ----------------------------------------
*/
if ( ! function_exists( 'resize' ) ) {
	function resize($newWidth, $targetFile, $originalFile) {

	    $info = getimagesize($originalFile);
	    $mime = $info['mime'];

	    switch ($mime) {
            case 'image/jpeg':
                $image_create_func = 'imagecreatefromjpeg';
                $image_save_func = 'imagejpeg';
                $new_image_ext = 'jpg';
                break;

            case 'image/png':
                $image_create_func = 'imagecreatefrompng';
                $image_save_func = 'imagepng';
                $new_image_ext = 'png';
                break;

            case 'image/gif':
                $image_create_func = 'imagecreatefromgif';
                $image_save_func = 'imagegif';
                $new_image_ext = 'gif';
                break;

            default: 
                throw new Exception('Unknown image type.');
	    }

	    $img = $image_create_func($originalFile);
	    list($width, $height) = getimagesize($originalFile);

	    $newHeight = ($height / $width) * $newWidth;
	    $tmp = imagecreatetruecolor($newWidth, $newHeight);
	    imagecopyresampled($tmp, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

	    if (file_exists($targetFile)) {
	            unlink($targetFile);
	    }
	    $image_save_func($tmp, "$targetFile.$new_image_ext");
	}
}


/**
* easy image resize function
* @param  $file - file name to resize
* @param  $string - The image data, as a string
* @param  $width - new image width
* @param  $height - new image height
* @param  $proportional - keep image proportional, default is no
* @param  $output - name of the new file (include path if needed)
* @param  $delete_original - if true the original image will be deleted
* @param  $use_linux_commands - if set to true will use "rm" to delete the image, if false will use PHP unlink
* @param  $quality - enter 1-100 (100 is best quality) default is 100
* @return boolean|resource
*/
if ( ! function_exists( 'smart_resize_image' ) ) {
	function smart_resize_image($file,
								$string             = null,
								$width              = 0, 
								$height             = 0, 
								$proportional       = false, 
								$output             = 'file', 
								$delete_original    = true, 
								$use_linux_commands = false,
								$quality = 100
	) {
	  
		if ( $height <= 0 && $width <= 0 ) return false;
		if ( $file === null && $string === null ) return false;

		# Setting defaults and meta
		$info                         = $file !== null ? getimagesize($file) : getimagesizefromstring($string);
		$image                        = '';
		$final_width                  = 0;
		$final_height                 = 0;
		list($width_old, $height_old) = $info;
		$cropHeight = $cropWidth = 0;

		# Calculating proportionality
		if ($proportional) {
		  if      ($width  == 0)  $factor = $height/$height_old;
		  elseif  ($height == 0)  $factor = $width/$width_old;
		  else                    $factor = min( $width / $width_old, $height / $height_old );

		  $final_width  = round( $width_old * $factor );
		  $final_height = round( $height_old * $factor );
		}
		else {
		  $final_width = ( $width <= 0 ) ? $width_old : $width;
		  $final_height = ( $height <= 0 ) ? $height_old : $height;
		  $widthX = $width_old / $width;
		  $heightX = $height_old / $height;
		  
		  $x = min($widthX, $heightX);
		  $cropWidth = ($width_old - $width * $x) / 2;
		  $cropHeight = ($height_old - $height * $x) / 2;
		}

		# Loading image to memory according to type
		switch ( $info[2] ) {
		  case IMAGETYPE_JPEG:  $file !== null ? $image = imagecreatefromjpeg($file) : $image = imagecreatefromstring($string);  break;
		  case IMAGETYPE_GIF:   $file !== null ? $image = imagecreatefromgif($file)  : $image = imagecreatefromstring($string);  break;
		  case IMAGETYPE_PNG:   $file !== null ? $image = imagecreatefrompng($file)  : $image = imagecreatefromstring($string);  break;
		  default: return false;
		}


		# This is the resizing/resampling/transparency-preserving magic
		$image_resized = imagecreatetruecolor( $final_width, $final_height );
		if ( ($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG) ) {
			$transparency = imagecolortransparent($image);
			$palletsize = imagecolorstotal($image);

			if ($transparency >= 0 && $transparency < $palletsize) {
				$transparent_color  = imagecolorsforindex($image, $transparency);
				$transparency       = imagecolorallocate($image_resized, $transparent_color['red'], $transparent_color['green'], $transparent_color['blue']);
				imagefill($image_resized, 0, 0, $transparency);
				imagecolortransparent($image_resized, $transparency);
			}
			elseif ($info[2] == IMAGETYPE_PNG) {
				imagealphablending($image_resized, false);
				$color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);
				imagefill($image_resized, 0, 0, $color);
				imagesavealpha($image_resized, true);
			}
		}
		imagecopyresampled($image_resized, $image, 0, 0, $cropWidth, $cropHeight, $final_width, $final_height, $width_old - 2 * $cropWidth, $height_old - 2 * $cropHeight);


		# Taking care of original, if needed
		if ( $delete_original ) {
			if ( $use_linux_commands ) exec('rm '.$file);
			else @unlink($file);
		}

		# Preparing a method of providing result
		switch ( strtolower($output) ) {
			case 'browser':
				$mime = image_type_to_mime_type($info[2]);
				header("Content-type: $mime");
				$output = NULL;
			break;
			case 'file':
				$output = $file;
			break;
			case 'return':
			return $image_resized;
			break;
			default:
			break;
		}

		# Writing image according to type to the output destination and image quality
		switch ( $info[2] ) {
			case IMAGETYPE_GIF:   imagegif($image_resized, $output);    break;
			case IMAGETYPE_JPEG:  imagejpeg($image_resized, $output, $quality);   break;
			case IMAGETYPE_PNG:
				$quality = 9 - (int)((0.9*$quality)/10.0);
				imagepng($image_resized, $output, $quality);
			break;
			default: return false;
		}

		return true;
	}
}