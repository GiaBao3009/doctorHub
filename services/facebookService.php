class FacebookService {
public static function getUserInfo($access_token) {
$url = "https://graph.facebook.com/me?fields=id,name,email,picture&access_token=$access_token";
$data = json_decode(file_get_contents($url), true);

if (isset($data['email'])) {
return [
'email' => $data['email'],
'name' => $data['name'],
'avatar' => $data['picture']['data']['url'],
'provider_id' => $data['id'],
];
}

return false;
}
}