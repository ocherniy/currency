<?php

namespace CurrencyBundle\Parser\PrivatbankParser;

use CurrencyBundle\Entity\Course;

/**
 * Class PrivatbankParser.
 */
class PrivatbankParser {

  const PRIVATBANK_URL = 'https://privatbank.ua/';

  /**
   * PrivatbankParser constructor.
   */
  public function __construct() {
    $this->url = self::PRIVATBANK_URL;
  }

}
