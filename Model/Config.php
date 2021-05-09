<?php declare(strict_types=1);

namespace Dani97\BlackfireGraphQl\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * Class Blackfire Client and Header configuration Provider
 */
class Config
{
    const HEADER_PATH = 'blackfire_config/client/header';

    const BLACKFIRE_CLIENT_ID_PATH = 'blackfire_config/client/client_id';

    const BLACKFIRE_CLIENT_TOKEN_PATH = 'blackfire_config/client/client_token';

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * Config constructor.
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(ScopeConfigInterface $scopeConfig) {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * Get Blackfire Header
     * @return string
     */
    public function getHeader(): string
    {
        return $this->scopeConfig->getValue(self::HEADER_PATH);
    }

    /**
     * Get Blackfire Client Id
     * @return string
     */
    public function getBlackfireClientId(): string
    {
        return $this->scopeConfig->getValue(self::BLACKFIRE_CLIENT_ID_PATH);
    }

    /**
     * Get Blackfire Client Token
     * @return string
     */
    public function getBlackfireClientToken(): string
    {
        return $this->scopeConfig->getValue(self::BLACKFIRE_CLIENT_TOKEN_PATH);
    }
}
