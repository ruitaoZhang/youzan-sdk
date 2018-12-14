<?php


namespace Hanson\Youzan;


use Hanson\Foundation\Foundation;

/**
 * Class Youzan
 * @package Hanson\Youzan
 *
 * @property \Hanson\Youzan\Api   $api
 * @property \Hanson\Youzan\AccessToken     $access_token
 * @property \Hanson\Youzan\Oauth\PreAuth   $pre_auth
 * @property \Hanson\Youzan\Oauth\Oauth     $oauth
 * @property \Hanson\Youzan\App\Sso         $sso
 * @property \Hanson\Youzan\Push            $push
 */
class Youzan extends Foundation
{
    protected $providers = [
        ServiceProvider::class,
        Oauth\ServiceProvider::class,
        App\ServiceProvider::class,
    ];

    /**
     * API请求
     *
     * @param $method
     * @param array $params
     * @param array $files
     * @return array
     * @throws YouzanException
     */
    public function request($method, $params = [], $files = [])
    {
        return $this->api->request($method, $params, $files);
    }

    public function setVersion(string $version = null)
    {
        $this['config']['version'] = $version;

        return $this;
    }

    /**
     * @return mixed
     * @throws YouzanException
     */
    public function getVersion()
    {
        if (!$this['config']['version'] ?? null) {
            throw new YouzanException('version cannot be null');
        }

        return $this['config']['version'];
    }

    public function getResponse()
    {
        return $this['config']['exception_as_array'] ?? true;
    }

    public function getRaw()
    {
        return $this['config']['raw_exception'] ?? false;
    }
}
