<?php

namespace CurrencyBundle\Output\Json;

use CurrencyBundle\Serializer\Json\BankSerializer;

/**
 * Class BankOutput
 *
 * @package CurrencyBundle\Output\Json
 */
class BankOutput extends AbstractOutput
{
    /**
     * @return BankSerializer
     */
    public function getSerializer()
    {
        return new BankSerializer();
    }
}
