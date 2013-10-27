<?php phpinfo() ?>

<?php
$inipath = php_ini_loaded_file();
if ($inipath) {
    echo 'Loaded php.ini: ' . $inipath;
} else {
    echo 'A php.ini file is not loaded';
}
?>
<?php require_once('./header.php');?>
<?php require_once('./payment_form.php');?>
Hello
<?php
include './footer. php';
?>