<?php

namespace JustBetter\ChangeBasesubtotal\Plugin\Model\Rule\Condition;

use Magento\SalesRule\Model\Rule\Condition\Address as Subject;

class Address
{
    /**
     * Add subtotal incl tax to rules.
     *
     * @param Subject $subject
     * @param Subject $result
     * @return Subject
     */
    public function afterLoadAttributeOptions(Subject $subject, Subject $result)
    {
        $attributes = $subject->getAttributeOption();
        $subject->setAttributeOption(array_merge($attributes, ['base_subtotal_total_incl_tax' => __('Subtotal (incl. tax)')]));

        return $result;
    }
}
