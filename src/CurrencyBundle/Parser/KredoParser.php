<?php

namespace CurrencyBundle\Parser;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Class KredoParser
 *
 * @package CurrencyBundle\Parser
 */
class KredoParser extends AbstractParser
{

  const SOURCE_URL = 'http://www.kredobank.com.ua/';

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

      $usd_label = $crawler->filter('#kurs tr td')->eq(0)->html();
      $usd_currency = $crawler->filter('#kurs tr td')->eq(1)->html();
      $eur_label = $crawler->filter('#kurs tr td')->eq(3)->html();
      $eur_currency = $crawler->filter('#kurs tr td')->eq(4)->html();

      if (!empty($usd_label) && $usd_label == self::CURRENCY_USD
        && !empty($eur_label) && $eur_label == self::CURRENCY_EUR) {

        $usd_currency = explode('/', $usd_currency);
        $eur_currency = explode('/', $eur_currency);

        if (!empty($usd_currency)) {
          $data[] = array(
            'currency' => $usd_label,
            'cost_buy' => preg_replace('/[^-0-9-.\.]/', '', $usd_currency[0]) / 100,
            'cost_sale' => preg_replace('/[^-0-9-.\.]/', '', $usd_currency[1]) / 100,
            'type' => self::CURRENCY_TYPE_CASH,
          );
        }

        if (!empty($eur_currency)) {
          $data[] = array(
            'currency' => $eur_label,
            'cost_buy' => preg_replace('/[^-0-9-.\.]/', '', $eur_currency[0]) / 100,
            'cost_sale' => preg_replace('/[^-0-9-.\.]/', '', $eur_currency[1]) / 100,
            'type' => self::CURRENCY_TYPE_CASH,
          );
        }
      }
    }

    return $data;
  }
}
