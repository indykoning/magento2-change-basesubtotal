<?php

namespace JustBetter\ChangeBasesubtotal\Plugin\Address\Quote\Model\Quote;

use JustBetter\ChangeBasesubtotal\Helper\Data;
use Magento\Quote\Model\Quote\Address as Subject;
use Magento\Quote\Model\Quote\Item\AbstractItem;

class Address
{
    public Data $helper;
    
    /**
     * Construct.
     *
     * @param Data $helper
     */
    public function __construct(Data $helper)
    {
        $this->helper = $helper;
    }

    /**
     * Set base subtotal to subtotal incl tax if option is enabled.
     *
     * @param  Subject  $subject
     * @param  callable $proceed
     * @param  mixed    $args
     */
    public function aroundRequestShippingRates(Subject $subject, callable $proceed, ...$args)
    {
        if (!$this->helper->shouldIncludeTax()) {
            return $proceed(...$args);
        }

        $originalBaseSubtotal = $subject->getBaseSubtotal();
        $subject->setBaseSubtotal($subject->getBaseSubtotalTotalInclTax());
        $result = $proceed(...$args);
        $subject->setBaseSubtotal($originalBaseSubtotal);

        return $result;
    }
}
