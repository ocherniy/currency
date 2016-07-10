<?php

namespace CurrencyBundle\Parser;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Class UkrsibParser
 *
 * @package CurrencyBundle\Parser
 */
class UkrsibParser extends AbstractParser
{

  const SOURCE_URL = 'https://my.ukrsibbank.com/ru/personal/operations/currency_exchange/';

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

      $usd_label = $crawler->filter('.stripeMe tr td')->eq(0)->html();
      $eur_label = $crawler->filter('.stripeMe tr td')->eq(5)->html();
      $eur_buy = $crawler->filter('.stripeMe tr td')->eq(7)->html();
      $eur_sale = $crawler->filter('.stripeMe tr td')->eq(8)->html();
      $usd_buy = $crawler->filter('.stripeMe tr td')->eq(2)->html();
      $usd_sale = $crawler->filter('.stripeMe tr td')->eq(3)->html();

      if (!empty($usd_label) && $usd_label == self::CURRENCY_USD
        && !empty($eur_label) && $eur_label == self::CURRENCY_EUR) {

        if (!empty($usd_buy) && !empty($usd_sale)) {
          $data[] = array(
            'currency' => $usd_label,
            'cost_buy' => str_replace(',', '.', $usd_buy),
            'cost_sale' => str_replace(',', '.', $usd_sale),
            'type' => self::CURRENCY_TYPE_CASH,
          );
        }

        if (!empty($eur_buy) && !empty($eur_sale)) {
          $data[] = array(
            'currency' => $eur_label,
            'cost_buy' => str_replace(',', '.', $eur_buy),
            'cost_sale' => str_replace(',', '.', $eur_sale),
            'type' => self::CURRENCY_TYPE_CASH,
          );
        }
      }
    }

    return $data;
  }
}
