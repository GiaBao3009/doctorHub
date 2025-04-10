<?php
session_start();
require_once "./models/User.php";
require_once __DIR__ . "/../../services/googleService.php";
require_once "../../services/facebookService.php";

class AuthController {

    // public function loginWithGoogle() {
    //     $token = json_decode(file_get_contents("php://input"))->token;
    //     $userData = GoogleService::getUserInfo($token);

    //     if (!$userData) {
    //         echo json_encode(['success' => false]);
    //         exit;
    //     }

    //     $userModel = new User();
    //     $user = $userModel->findByProviderId($userData['provider_id']);

    //     if (!$user) {
    //         $userModel->create([
    //             'email' => $userData['email'],
    //             'name' => $userData['name'],
    //             'avatar' => $userData['avatar'],
    //             'provider' => 'google',
    //             'provider_id' => $userData['provider_id']
    //         ]);
    //     }

    //     $_SESSION['user'] = $userData;
    //     echo json_encode(['success' => true]);
    // }

    public function loginWithFacebook() {
        // Chuyển hướng đến Facebook để login
        require_once './vendor/autoload.php';

        $fb = new \Facebook\Facebook([
            'app_id' => '1728886988022684',
            'app_secret' => 'YOUR_APP_SECRET',
            'default_graph_version' => 'v19.0',
        ]);

        $helper = $fb->getRedirectLoginHelper();
        $permissions = ['email'];
        $callbackUrl = 'http://localhost:8088/doctorHub/app/controllers/AuthController.php?action=facebookCallback';
        $loginUrl = $helper->getLoginUrl($callbackUrl, $permissions);

        header("Location: " . $loginUrl);
        exit;
    }

    public function facebookCallback() {
        require_once './vendor/autoload.php';

        $fb = new \Facebook\Facebook([
            'app_id' => '1728886988022684',
            'app_secret' => 'YOUR_APP_SECRET',
            'default_graph_version' => 'v19.0',
        ]);

        $helper = $fb->getRedirectLoginHelper();

        try {
            $accessToken = $helper->getAccessToken();

            if (!isset($accessToken)) {
                echo "Lỗi khi lấy access token từ Facebook.";
                exit;
            }

            $response = $fb->get('/me?fields=id,name,email,picture', $accessToken);
            $fbUser = $response->getGraphUser();

            $userData = [
                'email' => $fbUser['email'],
                'name' => $fbUser['name'],
                'avatar' => $fbUser['picture']['url'],
                'provider_id' => $fbUser['id'],
                'provider' => 'facebook'
            ];

            $userModel = new User();
            $user = $userModel->findByProviderId($userData['provider_id']);

            if (!$user) {
                $userModel->create($userData);
            }

            $_SESSION['user'] = $userData;
            header("Location: /doctorHub/home"); // chuyển về trang chính
            exit;

        } catch (Exception $e) {
            echo 'Facebook callback error: ' . $e->getMessage();
            exit;
        }
    }
    public function logout() {
        session_destroy();
        header("Location: /index.php"); // Hoặc trang chủ
        exit;
    }
}