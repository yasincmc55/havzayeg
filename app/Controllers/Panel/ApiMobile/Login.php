<?php
 
namespace App\Controllers\Panel\ApiMobile;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Panel\ApiMobile\UserModel;
use Firebase\JWT\JWT;
 
class Login extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    use ResponseTrait;
    public function index()
    {
        helper(['form']);
        $rules = [
            'username' => 'required|valid_email',
            'password' => 'required|min_length[6]'
        ];
        if(!$this->validate($rules)) return $this->fail($this->validator->getErrors());
        $model = new UserModel();
        $user = $model->where("username", $this->request->getVar('username'))->first();
        if(!$user) return $this->failNotFound('username Not Found');
 
        $verify = password_verify($this->request->getVar('password'), $user['password']);
        if(!$verify) return $this->fail('Wrong Password');
 
        $key = getenv('TOKEN_SECRET');
        $payload = array(

            "user_id" => $user['user_id'],
            "username" => $user['username']
        );
 
        $token = JWT::encode($payload, $key, 'HS256');
 
        return $this->respond($token);
    }
}