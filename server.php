<?php
$data = $_POST['obj'] ? $_POST['obj'] : '';
$raw = $_POST['raw'] ? $_POST['raw'] : '';
$filename = $_POST['filename'] ? $_POST['filename'] : '';

if($data == '') {
  echo 'Unabled to read the incoming data';
  exit();
}

if($filename == ''){
  echo 'Filename must not be empty!';
  exit();
}

//$result = file_put_contents('data_'.$filanem,$data,FILE_APPEND);
$result = file_put_contents('data_'.$filename,$data);
$rawresult = file_put_contents('text_'.$filename,$raw);
// save for backup
if (!file_exists('backups/')) {
    mkdir('backups', 0777, true);
}

$backup = file_put_contents('backups/data_'.$filename.'_'.time(),$data);
$rawBackup = file_put_contents('backups/text_'.$filename.'_'.time(),$raw);
if(!$result){
  echo 'Failed to save data!';
  exit();
} else {
  echo 'Success!';
}
?>