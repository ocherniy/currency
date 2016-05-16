<?php

namespace CurrencyBundle;

use CurrencyBundle\DependencyInjection\CurrencyExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class CurrencyBundle
 * @package CurrencyBundle
 */
class CurrencyBundle extends Bundle
{
    /**
     * @return CurrencyExtension
     */
    public function getContainerExtension()
    {
        return new CurrencyExtension();
    }
}
