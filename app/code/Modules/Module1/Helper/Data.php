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
     * Helper Function
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context
    ) {
        parent::__construct($context);
    }
    /**
     * Database link Function
     */
    public function DatabaseLink()
    {
        $link = mysqli_connect("localhost","root","","magento_builder") or die("Db Connecting Error" . mysqli_error($link));
        return $link;
    }

}