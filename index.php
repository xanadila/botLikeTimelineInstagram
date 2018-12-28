<html>
<head>
<title>Bot Like Home Instagram</title>
<style type="text/css">
.form-style-6{
    font: 95% Arial, Helvetica, sans-serif;
    max-width: 400px;
    margin: 10px auto;
    padding: 16px;
    background: #F7F7F7;
}
.form-style-6 h1{
    background: #43D1AF;
    padding: 10px 0;
    font-size: 140%;
    font-weight: 300;
    text-align: center;
    color: #fff;
    margin: -16px -16px 16px -16px;
}
.form-style-6 h6{
    background: #43D1AF;
    padding: 5px 0;
    font-size: 70%;
    font-weight: 300;
    text-align: center;
    color: #fff;
    margin: -16px -16px 16px -16px;
}
.form-style-6 input[type="text"],
.form-style-6 input[type="password"],
.form-style-6 textarea,
.form-style-6 select 
{
    -webkit-transition: all 0.30s ease-in-out;
    -moz-transition: all 0.30s ease-in-out;
    -ms-transition: all 0.30s ease-in-out;
    -o-transition: all 0.30s ease-in-out;
    outline: none;
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 100%;
    background: #fff;
    margin-bottom: 4%;
    border: 1px solid #ccc;
    padding: 3%;
    color: #555;
    font: 95% Arial, Helvetica, sans-serif;
}
.form-style-6 input[type="text"]:focus,
.form-style-6 input[type="password"]:focus,
.form-style-6 textarea:focus,
.form-style-6 select:focus
{
    box-shadow: 0 0 5px #43D1AF;
    padding: 3%;
    border: 1px solid #43D1AF;
}

.form-style-6 input[type="submit"],
.form-style-6 input[type="button"]{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 100%;
    padding: 3%;
    background: #43D1AF;
    border-bottom: 2px solid #30C29E;
    border-top-style: none;
    border-right-style: none;
    border-left-style: none;    
    color: #fff;
}
.form-style-6 input[type="submit"]:hover,
.form-style-6 input[type="button"]:hover{
    background: #2EBC99;
}
</style>
</head>
<body>
<div class="form-style-6">
<h1>Bot Like Home Instagram</h1>
<h6>Made with &hearts; by XANADILA</h6>
<form method="post">
<label>Username</label>
<input type="text" placeholder="xanadila" name="username" id="username" required/>
<label>Password</label>
<input type="password" placeholder="********" name="password" id="password" required/>
<input type="submit" name="submit" id="submit" value="Get Cookie" />
</form>
<?php
require 'mainconfig.php';
date_default_timezone_set("Asia/Jakarta");
@ini_set("output_buffering", "Off");
@ini_set('max_execution_time', 360000);
function add($username, $password){
   $postq = json_encode([
		'phone_id' => generateUUID(true),
		'_csrftoken' => get_csrftoken(),
		'username' => $username,
		'guid' => generateUUID(true),
		'device_id' => generateUUID(true),
		'password' => $password,
		'login_attempt_count' => 0
	]);
	$a = request(1, generate_useragent(), 'accounts/login/', 0, hook($postq));
	$header = $a[0];
	$a = json_decode($a[1]);
	if($a->status<>'ok'){
    	$msg = $a->message;
		$array = json_encode(['result' => false, 'msg' => $msg]);
		}else{
		preg_match_all('%Set-Cookie: (.*?);%',$header,$d);$cookies = '';
		for($o=0;$o<count($d[0]);$o++)$cookies.=$d[1][$o].";";
	    $ua = generate_useragent();
		$array = json_encode(['result' => true, 'cookie' => $cookies, 'ua' => generate_useragent()]);
    }
		return $array;
}

function SendRequest($url, $post, $post_data, $user_agent, $cookies) {
    $ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://instagram.com/api/v1/'.$url);
	curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept-Language: id'));
	
	if($post) {
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
	}
		
	$response = curl_exec($ch);
	$http = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);
		
	return array($http, $response);
}

if(isset($_POST['submit'])) {
	$u = $_POST['username'];
	$p = $_POST['password'];
	echo "\n";
	$aib = add($u, $p);
	$go = json_decode($aib);
	if($go->result<>true){
		echo $go->msg. "\n";
		exit();
	} else {
		$kukie = $go->cookie;
		$link = "http://xanadila.org/bot-like-tl/run.php?kukie=" . $kukie;
		echo "<p align='center'><a href='".$link."'>Click Here</a></p>";	
	}
}
?>
</div>
</body>
</html>

<!--    
                                        $$$$$$\              $$$$$$\                                  $$\   $$\     
                                        \_$$  _|            $$  __$$\                                 $$ |  $$ |    
                                          $$ |              $$ /  \__| $$$$$$\   $$$$$$\              $$ |  $$ |    
                                          $$ |              \$$$$$$\  $$  __$$\ $$  __$$\             $$ |  $$ |    
                                          $$ |               \____$$\ $$$$$$$$ |$$$$$$$$ |            $$ |  $$ |    
                                          $$ |              $$\   $$ |$$   ____|$$   ____|            $$ |  $$ |    
                                        $$$$$$\             \$$$$$$  |\$$$$$$$\ \$$$$$$$\             \$$$$$$  |    
                                        \______|             \______/  \_______| \_______|             \______/
-->
