<?php
	 	

function upload($input, $dir, $file, $extns, $maxsize) {

	$msg = NULL;
	$rc = 0;
	if (isset($_FILES[$input]['tmp_name'])) {
		if (is_uploaded_file($_FILES[$input]['tmp_name'])) {
			$fn = $_FILES[$input]['name'];
			$ext = trim(strtolower(strrchr($fn, ".")));
			if (!in_array($ext, $extns))
				{$msg = "Invalid File Type"; $rc = 10;}
			if ($_FILES[$input]['size'] > $maxsize)
				{$msg = "Uploaded file size [" . $_FILES[$input]['size'] . "] exceeds limit [$maxsize]"; $rc = 11;}
			if (substr($dir,-1,1) != "/")
				$dir .= "/";
			$savefile = $dir . strtolower($file) . $ext;
			if ($rc == 0) {
				$result = move_uploaded_file($_FILES[$input]['tmp_name'], $savefile);
				if ($result > 1)
					{$msg = "Move Uploaded File Failed"; $rc = $result;}
				}
			}
		else {$msg = "No Uploaded File"; $rc = 12;}
		}
	else {$msg = "No Uploaded File"; $rc = 12;}
	if ($rc == 0)
		return(array($rc, $savefile));
	else return(array($rc, $msg));
	}
	

// image_resize.php - Resize an image smaller proportionally

// Inputs - 3 parameters
//	1) fully qualified image name (from the website root directory), ie. images/picture.jpg
//	2) The maximum width of the resized image
//	3) The maximum height of the resized image
	
// Outputs - array with three elements
//	1) TRUE 			or 		FALSE 			Resize Success or Failure
//	2) resized width	or 		ERROR MESSAGE
//	3) resized height	or		NULL 
	
function image_resize($pic, $width, $height) {
	$msg = NULL;	
	if (is_file($pic)) {
		if (!is_dir($pic)) {
			$size = getimagesize($pic);
			if ($size[0] == 0) 	$neww = $width; 	else $neww = $size[0];
			if ($size[1] == 0)	$newh = $height;	else $newh = $size[1];
			$ratio = $neww/$newh;
			if ($neww > $width) {
				$neww = $width; 
				$newh = round($neww / $ratio);
				}
			if ($newh > $height) {
				$newh = $height; 
				$neww = round($newh * $ratio);
				}
			}
		else $msg = "Image file is a directory";
		}
	else $msg = "Image file not found";
	if ($msg == NULL) 
		return(array(TRUE, $neww, $newh));
	else return(array(FALSE, $msg, NULL));
	}
?>
