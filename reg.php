<?
function isRecaptchaRight(){
	if (!$_POST['g-recaptcha-response'])
		return false;
		
	$url = 'https://www.google.com/recaptcha/api/siteverify';
	$key = '6Ld1D2UUAAAAAHe7TIk25TCJDtWNomqyecOWiKMy';
	$query = $url.'?secret='.$key.'&response='.$_POST['g-recaptcha-response'].'&remoteip='.$_SERVER['REMOTE_ADDR'];

	$data = json_decode(file_get_contents($query));

	if ($data->success == false)
		return false;

	return true;
}



?>