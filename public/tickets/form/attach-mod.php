<? $root = $_SERVER['DOCUMENT_ROOT'];
$private = str_replace('public','private',$root);
include_once("$private/config.php");

$permissions = 4;


$attachDate = date('Y-m-d',strtotime($_POST['attachDate']));

// Verify login
include_once("$root/lc.php");

	if (isset($_FILES['files'])) {
		$errors = array();
		foreach ($_FILES['files']['tmp_name'] as $key => $tmp_name) {
			$file_name = $key . $_FILES['files']['name'][$key];
			$file_size = $_FILES['files']['size'][$key];
			$file_tmp = $_FILES['files']['tmp_name'][$key];
			$file_type = $_FILES['files']['type'][$key];
			if ($file_size > 2097152) {
				$errors[] = 'File size must be less than 2 MB';
			}

			$query = "INSERT INTO ticketAttachments (ticketID,attachFile,file_size,file_type,attachDate,attachmentType,attachmentTypeOveride) VALUES ('$ticketID','$file_name','$file_size','$file_type','$attachDate','$attachmentType','$attachmentTypeOveride')";
			//$result = mysql_query($query) or die(mysql_error());

			$desired_dir = $root."/_storage/attachments/";
			if (empty($errors) == true) {
				if (is_dir($desired_dir) == false) {
					mkdir("$desired_dir", 0700);        // Create directory if it does not exist
				}
				if (is_dir("$desired_dir/" . $file_name) == false) {
					move_uploaded_file($file_tmp, "$desired_dir/" . $file_name);
				} else {                                    // rename the file if another one exist
					$new_dir = "$desired_dir/" . $file_name . time();
					rename($file_tmp, $new_dir);
				}
				$result = mysql_query($query) or die(mysql_error());
			} else {
				print_r($errors);
			}
		}
		if (empty($error)) {
		header("Location: /tickets/ticket_view.php?ticketID=$ticketID&custID=$custID#attachments-div");
		}
	}



?>
