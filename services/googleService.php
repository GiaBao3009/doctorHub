class GoogleService {
public static function getUserInfo($token) {
// Simulate fetching user info from Google using the token
// Replace this with actual Google API integration
if ($token === 'valid_token') {
return [
'email' => 'user@example.com',
'name' => 'John Doe',
'avatar' => 'https://example.com/avatar.jpg',
'provider_id' => '123456789'
];
}
return null;
}
}