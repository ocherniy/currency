<?php

namespace CurrencyBundle\Usecase;

/**
 * Class AbstractUsecase
 *
 * @package CurrencyBundle\Usecase
 */
abstract class AbstractUsecase
{
    /**
     * @return string
     */
    abstract function execute();
}
