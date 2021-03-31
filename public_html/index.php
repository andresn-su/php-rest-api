<?php
header('Access-Control-Allow-Origin: *');
header("Acess-Control-Allow-Credencials: true");
header("Access-Control-Allow-Methods: GET, PUT, POST, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, X-Requested-With, enctype, Content-Description");
header("Content-Type: application/json; charset=utf-8");

error_reporting(0);
require_once '../vendor/autoload.php';

// api/users/1
$url;

if($_GET['url']){
    $url = explode('/', $_GET['url']);

    if($url[0] === 'api'){
        $service = 'App\Services\\'. ucfirst($url[1]).'Service';
        array_shift($url);

        $method = strtolower($_SERVER['REQUEST_METHOD']);

        try {
            $response = call_user_func_array(array(new $service, $method), [$url[1]]);
            echo json_encode(array('status' => 'success', 'data' => $response), JSON_UNESCAPED_UNICODE);
        } catch (\Throwable $th) {
            echo $th;
        }
    } else {
        return 0;
    }
} else {
    return 0;
}
