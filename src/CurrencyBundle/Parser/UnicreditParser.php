<?php

namespace CurrencyBundle\Parser;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Class UnicreditParser
 *
 * @package CurrencyBundle\Parser
 */
class UnicreditParser extends AbstractParser
{

  const SOURCE_URL = 'https://ru.unicredit.ua/';

  protected function parseSource()
  {
    $client = new Client();
    $response = $client->get(
      self::SOURCE_URL
    )->getBody();

    $data = array();
    if (!empty($response)) {
      $response = (string) $response;
      $crawler = new Crawler($response);

      $usd_buy = $crawler->filter('#currency .rate tr .no')->eq(0)->html();
      $usd_sale = $crawler->filter('#currency .rate tr .no')->eq(1)->html();
      $eur_buy = $crawler->filter('#currency .rate tr .no')->eq(2)->html();
      $eur_sale = $crawler->filter('#currency .rate tr .no')->eq(3)->html();

      if (!empty($usd_buy) && !empty($usd_sale)) {
        $data[] = array(
          'currency' => self::CURRENCY_USD,
          'cost_buy' => $usd_buy,
          'cost_sale' => $usd_sale,
          'type' => self::CURRENCY_TYPE_CASH,
        );
      }

      if (!empty($eur_buy) && !empty($eur_sale)) {
        $data[] = array(
          'currency' => self::CURRENCY_EUR,
          'cost_buy' => $eur_buy,
          'cost_sale' => $eur_sale,
          'type' => self::CURRENCY_TYPE_CASH,
        );
      }
    }

    return $data;
  }
}
