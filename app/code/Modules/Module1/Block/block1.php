<?php
namespace Modules\Module1\Block;

/**
 * block1 block
 */
class Block1
    extends \Magento\Framework\View\Element\Template
{
    protected $myModuleHelper;
    protected $_productRepository;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Modules\Module1\Helper\Data $myModuleHelper,
        \Magento\Catalog\Model\ProductRepository $productRepository,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_mymoduleHelper = $myModuleHelper;
        $this->_productRepository = $productRepository;
    }
    public function getModuleData()
    {
        $link =  $this->_mymoduleHelper->DatabaseLink();
        $query = "SELECT * FROM builder_data WHERE module = 'Vendor_Module1'";
        $module_data = mysqli_query($link, $query) or die("Data not Found" .mysqli_error($module_data));
        $module_data = mysqli_fetch_array($module_data, MYSQLI_ASSOC);
        return $module_data;
    }
    public function getBestDeals()
    {
        $link =  $this->_mymoduleHelper->DatabaseLink();
        $query = "SELECT sku FROM offers WHERE type = 'best_deal'";
        $best_deal_sku = mysqli_query($link, $query) or die("Data not Found" .mysqli_error($best_deal_sku));
        $best_deal_sku = mysqli_fetch_array($best_deal_sku, MYSQLI_ASSOC);
        return $best_deal_sku;
    }

    public function getProductBySku($sku)
    {
        return $this->_productRepository->get($sku);
    }
}