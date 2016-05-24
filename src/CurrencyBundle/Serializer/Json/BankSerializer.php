<?php

namespace CurrencyBundle\Serializer\Json;

use CurrencyBundle\Entity\Bank;

/**
 * Class BankSerializer
 *
 * @package CurrencyBundle\Serializer\Json
 */
class BankSerializer extends AbstractSerializer
{
    /**
     * @param Bank $bank
     * @return array
     */
    protected function getAttributes($bank)
    {
        return array(
            'id' => $bank->getBankId(),
            'title' => $bank->getTitle(),
            'logo' => $bank->getLogo(),
            'link' => $bank->getLink(),
        );
    }
}
