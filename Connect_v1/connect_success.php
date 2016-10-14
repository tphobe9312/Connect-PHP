<?php
session_start();
include("includes/connect_config.php");

	function callback()
	{
		$code  = $_GET['code'];
		$state = $_GET['state'];
		
		if(!$state || $state != $_SESSION['connect_state'] ){
			exit('STATE mismatch');
		}
		unset($_SESSION['connect_state']);

		if(!$code)
			exit('No code!!');
		//fetch token
		$post_data = array(
			'code' => $code,
			'redirect_uri' => REDIRECT_URI,
			'grant_type' => 'authorization_code',
			'client_id' => CLIENT_ID,
			'client_secret' => encrypt(CLIENT_SECRET)
		);
		
		$token_resp = fetch_data(TOKEN_ENDPOINT, $post_data, false);
		$token_resp_data = (array)json_decode($token_resp);
		
		$access_token = $token_resp_data && isset($token_resp_data['access_token']) ? $token_resp_data['access_token']:false;
		
		if(!$access_token)
			exit('No token');
		$header_data = array(
			'Authorization' => 'Bearer ' . $access_token
		);

		$response = fetch_data(RESOURCE_URL . '?access_token=' .  $access_token, false, $header_data);

		$resp_json = (array)json_decode($response);

		$_SESSION['User'] = ($resp_json && isset($resp_json['User']) )?$resp_json['User']:false;
		header("Location:login.php");

	}

	function fetch_data($url, $post, $heads){

		$curl = curl_init();

		$curl_opts = array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => $url,
			CURLOPT_HEADER => false,
			CURLINFO_HEADER_OUT => false,
			CURLOPT_USERAGENT => 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)',
			CURLOPT_POST => 1,
//			CURLOPT_POSTFIELDS => $post
		);

		if($post && is_array($post) && count($post) > 0 )
			$curl_opts[CURLOPT_POSTFIELDS] = $post;

		if($heads && is_array($heads) && count($heads) > 0 )
			$curl_opts[CURLOPT_HTTPHEADER] = $heads;

		curl_setopt_array($curl, $curl_opts);

		$result = curl_exec($curl);
		if(!$result){
			$httpcode = curl_getinfo($curl);
			print_r(array('Error code' => $httpcode, 'URL' => $url, 'post' => $post, 'LOG' => ""));
			exit("Error: 378972");
		}
		curl_close($curl);

		echo $result . "\n\n";
		return $result;
		//echo $result . "\n\n";
	}
	
	function encrypt($in_t){
		$key = CLIENT_TOKEN;
		$pre = ":";
		$post = "@";
		$plaintext = rand(10, 99) . $pre . $in_t . $post . rand(10,99);
		$iv = "0000000000000000";
		$pval = 16 - (strlen($plaintext) % 16);
		$ptext = $plaintext . str_repeat(chr($pval), $pval);

		$dec = @mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $ptext, MCRYPT_MODE_CBC, $iv );

		return bin2hex($dec);
	}
	echo "Hello before call ..";
	callback();
	
