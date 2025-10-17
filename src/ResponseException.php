<?php
declare(strict_types=1);

namespace Zeus\Exception;

use RuntimeException;
use Hypervel\Http\Request;
use Hypervel\Http\Response;
use Psr\Http\Message\ResponseInterface;

use function json_encode;

/**
 * 响应异常 用于输出数据
 *
 * @author imxieke <oss@live.hk>
 * @copyright (c) 2025 CloudFlying
 * @date 2025/07/22 14:32:45
 */
class ResponseException extends RuntimeException
{
    /**
     * @var array
     */
    protected $data = [];

    /**
     * Http Status Code
     *
     * @var int
     * @author CloudFlying
     * @date 2025/10/15 20:48:24
     */
    protected int $httpCode = 200;

    /**
     * @var bool
     */
    protected bool $debug = false;

    protected array $options = [];

    /**
     * 异常相应头信息
     *
     * @var array
     * @author CloudFlying
     * @date 2025/07/25 15:11:14
     */
    protected array $headers = [
        'Content-Type' => 'application/json'
    ];

    /**
     * ResponseException
     *
     * @param string $message 异常消息
     * @param int $code 业务代码
     * @param int $httpCode Http 状态码
     * @param array $data 异常数据
     * @param array $options
     * @author imxieke <oss@live.hk>
     * @date 2025/07/25 15:13:38
     */
    public function __construct(string $message, int $code = 200, array $data = [], int $httpCode = 200, array $options = [])
    {
        parent::__construct($message, $code);
        $this->httpCode = $httpCode;
        $this->data = $data;
        $this->headers = $options['headers'] ?? $this->headers;
    }

    /**
     * 获取异常数据
     *
     * @return array
     * @author imxieke <oss@live.hk>
     * @date 2025/09/29 18:11:47
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * 设定异常数据
     *
     * @param array $data
     * @return array
     * @author imxieke <oss@live.hk>
     * @date 2025/09/29 18:11:39
     */
    public function setData(array $data)
    {
        return $this->data = $data;
    }

    /**
     * 获取异常头信息
     *
     * @return array
     * @author imxieke <oss@live.hk>
     * @date 2025/09/29 18:16:17
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * get Http Status Code
     *
     * @return int
     * @author imxieke <oss@live.hk>
     * @date 2025/10/15 20:49:39
     */
    public function getHttpCode()
    {
        return $this->httpCode;
    }

    /**
     * 设定响应异常头信息
     *
     * @param array $headers
     * @return array
     * @author imxieke <oss@live.hk>
     * @date 2025/09/29 18:15:59
     */
    public function setHeaders(array $headers)
    {
        return $this->headers = $headers;
    }

    /**
     * 异常数据渲染
     *
     * @return ResponseInterface
     * @author imxieke <oss@live.hk>
     * @date 2025/09/29 18:16:47
     */
    public function render()
    {
        $data = [
            'msg' => $this->getMessage(),
            'code' => $this->getCode(),
            'time' => time(),
            'data' => $this->getData()
        ];

        return response()->json($data, $this->getCode(), $this->getHeaders());
    }

}
