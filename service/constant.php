<?php
//////////////////////////////////////////////////////////////////////////////////////////
// File Name        : constants.php														//
// Craeted By       : Vishwajeet Mahadik												//
// Created Date     : 19-04-2022													    //
// File Modified By : Vishwajeet Mahadik												//
// Created Date     : 19-04-2022													 	//
// Description      : Website Global constants variables initialize						//
//////////////////////////////////////////////////////////////////////////////////////////
##############################################
# GENERAL SETTINGS
##############################################
error_reporting(E_ALL ^ E_NOTICE); 	// display all errors except notices
@ini_set('display_errors', '0'); // display all errors
@ini_set('safe_mode', 'off'); // display all errors
date_default_timezone_set("Asia/Kolkata"); 
@ini_set("max_execution_time",0); //this sets it unlimited 
ini_set('session.gc_maxlifetime', 1);
// Turn off all error reporting
error_reporting(0);
$isLive = true;
$protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === 0 ? 'https://' : 'http://';
$Directory_Name = "";


function site_protocol() {
	if(isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&  $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')  return $protocol = 'https://'; else return $protocol = 'http://';
}

//for the site host name
$Root=dirname(__DIR__);
$Document_Root = ($_SERVER['DOCUMENT_ROOT']);
//$Directory_Name = substr($Root, strlen($Document_Root), (strlen($Root)-strlen($Document_Root)));
$host= isset($_SERVER['HTTP_HOST'])?$_SERVER['HTTP_HOST']:'';
$port= isset($_SERVER['HTTP_PORT'])?$_SERVER['HTTP_PORT']:'';
//if(!$isLive){$site_url.="/";}


$siteUrl = site_protocol()."".$host."".$Directory_Name."/";
// define constance variables

define("SITE_TITLE", "Pandhare Tech Pro Solutions");

define("OWNERNAME", "Tushar Pandhare");
define("OWNERCONTACTNUMBER", "9890201014");
define("OWNERWHATSAPPNUMBER", "8530307007");
define("OWNEREMAIL", "info@ptspro.in");


define("SITE_URL", $siteUrl);
define("CMS_URL", $siteUrl."cms/");
define("API_URL", $siteUrl."service/api.php");
define("CMS_NAVIGATION_PROCESS_URL", $siteUrl);
define("DROPTECH_MEDIA_PATH", $siteUrl."cms/media/");
define("DROPTECH_PLUGIN_PATH", $siteUrl."cms/plugins/");
define("CMS_THEME", $siteUrl."cms/theme/");
define("DROPTECH_WATTERMARK", '<a class="droptechWatterMark" target="_blank" href="http://www.droptech.in">&nbsp;</a>');
define("CMS_THEME_PATH", $siteUrl."app/b2b/theme/");
define("CMS_MEDIA_PATH", $siteUrl."app/b2b/media/");
define("WEB_ASSETS_PATH", $siteUrl."app/b2c/assets/");
define("CMS_ASSETS_PATH", $siteUrl."app/b2b/assets/");
define("WEB_THEME_PATH", $siteUrl."theme/");
define("WEB_COMP_PATH", $siteUrl."app/b2c/view/components/");
function isUserLogin(){

	if($_SESSION['userInfo']['username']=='')
		return false;
	else
		return true;
}
function isB2CUserLogin(){
	$sId = isset($_SESSION['customer']->id)?$_SESSION['customer']->id:'';
	if($sId == "")
		return false;
	else
		return true;
}
function isLoggedIn(){
	$sId = isset($_SESSION['customer']->id)?$_SESSION['customer']->id:'';
	if($sId == ""){
		return false;
	}else{
		return true;
	}
		
}
function imagePath($imageName,$return=false){
	$pageFlag 	= isset($_REQUEST['profileId'])?$_REQUEST['profileId']:"";
	
	$imageFullName="";
	if($imageName=="" || $imageName == null){
		$imageFullName = CMS_MEDIA_PATH."default.png";
	}else{
		$imageFullName = CMS_MEDIA_PATH."".$imageName;
		if($pageFlag!="")
			$photo = "../../../app/b2b/media/".$imageName;
		else
			$photo = "app/b2b/media/".$imageName;
		if (!file_exists($photo)) {
			$imageFullName = CMS_MEDIA_PATH."default.png";
		}
	}
	if($return==true){
		return $imageFullName; 
	}else{
	echo $imageFullName;
	}
}
function alertBloxB2c(){?>



<div class="alertBlock col-md-12"><br><br>
<div class="alert alert-danger" role="alert">
<span class='msg'>XXX</span>
</div>

<div class="alert alert-success" role="alert">
<span class='msg'>XXX</span>
</div>

<div class="frame-wrap alert alert-process">
<div class="border p-3">
<div class="d-flex justify-content-center">
<div class="spinner-grow" role="status">
<span class="sr-only">Loading...</span>
</div>
</div>
</div>
</div>
</div>
<?php }
function formStart($action,$ajax){?>
<form id="<?php echo $action;?>Form" role="form" data-bv-message="This value is not valid" class="form-horizontal droptech-bootstrap-validator-form" ajax="<?php echo $ajax;?>" data-bv-feedbackicons-valid="glyphicon" data-bv-feedbackicons-invalid="glyphicon" data-bv-feedbackicons-validating="glyphicon" action="<?php echo $action;?>" method="post"><div class="row"><div class="col-md-12">
<?php alertBloxB2c(); }
function formEnd(){?></div></div></form><?php }

function getProperPageName($page){
	$page = ucfirst($page);
	$page = str_replace("_", " ", $page);
	$page = str_replace("_", " ", $page);
	$page = str_replace("_", " ", $page);
	$page = str_replace("_", " ", $page);
	$page = str_replace("_", " ", $page);
	
	$page = str_replace('OKBURL', '(', $page);
	$page = str_replace('CKBURL', ')', $page);
	$page = str_replace('DQURL', '"', $page);
	$page = str_replace('DQURL', '"', $page);
	$page = str_replace('DQURL', '"', $page);
	$page = str_replace('DQURL', '"', $page);
	return $page;
}
function getProperPageNameURL($page){
	$page = str_replace(" ", "_", $page);
	$page = str_replace(" ", "_", $page);
	$page = str_replace(" ", "_", $page);
	$page = str_replace(" ", "_", $page);
	$page = str_replace(" ", "_", $page);
	$page = str_replace(" ", "_", $page);
	
	$page = str_replace('(', "OKBURL", $page);
	$page = str_replace(')', "CKBURL", $page);
	$page = str_replace('"', "DQURL", $page);
	$page = str_replace('"', "DQURL", $page);
	$page = str_replace('"', "DQURL", $page);
	$page = str_replace('"', "DQURL", $page);
	return $page;
}
function errorCardDsplay($errorMessage){?>
<div class="card">
		<div class="card-header"><h5>Alerts</h5></div>
		<div class="card-divider"></div>
		<div class="card-body">
			<div class="row">
				<div class="col-12">
					<div class="alert alert-primary alert-lg mb-3 alert-dismissible fade show"><?php echo $errorMessage;?><button type="button" class="close" data-dismiss="alert" aria-label="Close"></div>
				</div>
			</div>
		</div>
	</div>
<?php }


function Send_SMS($number,$msg,$responce=""){

	$number = str_replace('+91',"",$number);
	$number = str_replace('+',"",$number);
	error_reporting (E_ALL ^ E_NOTICE);
	if($msg!="" && $number!=""){
		//$msg = "Dear Customer ".$msg;
		$msg = 'Dear Guest, '.$msg.' SCS';
		$url = "http://173.45.76.227/send.aspx?username=droptc&pass=Vishu9201&route=trans1&senderid=INFOSS&ispreapproved=1&numbers=".urlencode($number)."&message=".urlencode($msg);
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$curl_scraped_page = curl_exec($ch);
		curl_close($ch);
		//var_dump($curl_scraped_page);
		return true;
	}
}

$action = isset($_REQUEST['action'])?$_REQUEST['action']:'';
if($action!="" && $action == 'contactus'){
	$name = isset($_REQUEST['name'])?$_REQUEST['name']:'';
	$mobile = isset($_REQUEST['mobile'])?$_REQUEST['mobile']:'';
	$message = isset($_REQUEST['message'])?$_REQUEST['message']:'';
	$responseArray = array(); 
	if($name!="" && $mobile!="" && $message!=""){
		$msg = "Thank you for contacting us. We will contact you on given mobile number";
		Send_SMS($mobile,$msg);
		
		$msg1 = "Contact Us request received from ".$name." - ".$mobile." for ".$message;
		$mobileOwner = OWNERCONTACTNUMBER;
		Send_SMS($mobileOwner,$msg1);
		
		$responseArray = array("status"=>true,"value"=>$msg);
	}else{
		$responseArray = array("status"=>false,"value"=>"Please fill all date to send contact us request");
	}
	echo json_encode($responseArray);
}
?>

