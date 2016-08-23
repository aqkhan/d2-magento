<?php
/**
 * Copyright © 2015 AionNext Ltd. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Modules\Module1\Helper;

/**
 * Aion Test helper
 */
class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * Path to store config if extension is enabled
     *
     * @var string
     */
    const XML_PATH_ENABLED = 'module1_settings/general/module1_enabled';
    const CUSTOM_HEADING = 'module1_settings/general/module1_text';

    /**
     * Check if extension enabled
     *
     * @return string|null
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context
    ) {
        parent::__construct($context);
    }
    public function isEnabled()
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_ENABLED,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    public function getLabel()
    {
        return $this->scopeConfig->getValue(
            self::CUSTOM_HEADING,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

}