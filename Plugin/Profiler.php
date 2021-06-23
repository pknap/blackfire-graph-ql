<?php declare(strict_types=1);

namespace Dani97\BlackfireGraphQl\Plugin;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\GraphQl\Controller\GraphQl;
use Dani97\BlackfireGraphQl\Model\Config;

class Profiler
{
    /**
     * @var Config
     */
    private $config;

    public function __construct(Config $config) {
        $this->config = $config;
    }
    /**
     * @param GraphQl $subject
     * @param RequestInterface $request
     * @return array
     * @SuppressWarnings(PHPMD.UnusedFormalParameters)
     */
    public function beforeDispatch(GraphQl $subject, RequestInterface $request): array
    {
        $headerName = $this->config->getHeader();
        if (!empty($headerName) && !empty($request->getHeader($headerName))){
            $clientId = $this->config->getBlackfireClientId();
            $clientToken = $this->config->getBlackfireClientToken();
            $config = new \Blackfire\ClientConfiguration();
            $config->setClientId($clientId);
            $config->setClientToken($clientToken);

            // let's create a client
            $blackfire = new \Blackfire\Client($config);
            // then start the probe
            $probe = $blackfire->createProbe();

            // When runtime shuts down, let's finish the profiling session
            register_shutdown_function(function () use ($blackfire, $probe) {
                // See the PHP SDK documentation for using the $profile object
                $blackfire->endProbe($probe);
            });
        }
        return [$request];
    }
}
