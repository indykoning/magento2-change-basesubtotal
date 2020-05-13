## Magento 2 Change basesubtotal
After the new Magento 2.3.5-p1 update the getbasesubtotal function has changed from including tax to excluding the tax, see: https://github.com/magento/magento2/issues/28076
This seems to be the new intended way of it to work, however shops that are already configured and updated will behave unexpectedly with free shipping since shipping cost is now calculated on your subtotal without tax whereas before it was with tax.

This module aims to return the former behavior while making it configurable to enable and disable the old and new functionality.

You can enable and disable this functionality under `Sales > Tax > Calculation Settings > Shipping Base Subtotal`
Setting this to `Including Tax` enables this module to use behavior prior to 2.3.5-p1
Setting this to `Excluding Tax` disables this modules functoinality
