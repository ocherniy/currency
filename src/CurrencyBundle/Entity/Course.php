<?php

namespace CurrencyBundle\Entity;

/**
 * Course
 */
class Course
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $bank;

    /**
     * @var string
     */
    private $currency;

    /**
     * @var string
     */
    private $cost;

    /**
     * @var string
     */
    private $date;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set bank
     *
     * @param integer $bank
     *
     * @return Course
     */
    public function setBank($bank)
    {
        $this->bank = $bank;

        return $this;
    }

    /**
     * Get bank
     *
     * @return int
     */
    public function getBank()
    {
        return $this->bank;
    }

    /**
     * Set currency
     *
     * @param string $currency
     *
     * @return Course
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set cost
     *
     * @param string $cost
     *
     * @return Course
     */
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Get cost
     *
     * @return string
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Set date
     *
     * @param string $date
     *
     * @return Course
     */
    public function setDate($date = NULL)
    {
        if (empty($date)) {
            $date = time();
        }
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }
}

