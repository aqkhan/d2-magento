<?php
namespace Modules\Module1\Block;

/**
 * block1 block
 */
class Block1
    extends \Magento\Framework\View\Element\Template
{
    protected $myModuleHelper;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Modules\Module1\Helper\Data $myModuleHelper,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_mymoduleHelper = $myModuleHelper;
    }
    public function getBlockEnable()
    {
        return $this->_mymoduleHelper->isEnabled();
    }
    public function getBlockLabel()
    {
        return $this->_mymoduleHelper->getLabel();
    }
}