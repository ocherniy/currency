<?php

namespace CurrencyBundle\Parser;

/**
 * Class PrivatbankParser
 *
 * @package CurrencyBundle\Parser
 */
class PrivatbankParser extends AbstractParser
{

  const SOURCE_URL = 'https://privatbank.ua/';

  protected function parseSource()
  {
    return array(
        array('currency' => 'USD', 'cost' => 8.2),
    );
  }
}
