<?php

namespace JustBetter\ChangeBasesubtotal\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    /**
     * Get a config value from the database.
     *
     * @param string $field
     * @param int|null $storeId
     * @return mixed
     */
    public function getConfigValue($field, $storeId = null)
    {
        return $this->scopeConfig->getValue(
            $field,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    /**
     * Check if base subtotal should include tax.
     *
     * @return boolean
     */
    public function shouldIncludeTax()
    {
        return $this->getConfigValue('tax/calculation/base_subtotal_should_include_tax');
    }
}
