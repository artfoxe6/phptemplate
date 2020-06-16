<?php

namespace App\Auth;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Auth\GuardHelpers;

/**
 * 实现 Guard 接口
 *
 * Class customizeGuard
 * @package App\Auth
 */
class CustomizeGuard implements Guard
{
    use GuardHelpers;

    /**
     * @var Request request
     */
    public $request;

    /**
     * customizeGuard constructor.
     * @param $provider
     * @param Request $request
     */
    public function __construct($provider,Request $request)
    {
        $this->setProvider($provider);
        $this->request = $request;
    }


    /**
     * Get the currently authenticated user.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function user()
    {
        return $this->user ?? $this->getUserInfo();
    }

    /**
     * get userinfo by provider
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function getUserInfo()
    {
        $user = null;

        $token = $this->request->get('_token') ?? $this->request->header('Authorization');
        if (!empty($token)) {
            $user = $this->provider->retrieveByCredentials(
                ['token' => $token]
            );
            if (!$user) $user = null;
        }
        return $this->user = $user;
    }

    /**
     * Rules a user's credentials.
     *
     * @param array $credentials
     * @return bool
     */
    public function validate(array $credentials = [])
    {
        return true;
    }

    /**
     * attempt login
     *
     * @param array $credentials
     * @throws \Exception
     */
    public function attempt(array $credentials = []) {
        throw new \Exception('不允许直接登陆');
    }

}
