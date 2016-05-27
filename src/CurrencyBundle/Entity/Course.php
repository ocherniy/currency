<?php

namespace CurrencyBundle\Entity;

/**
 * Course
 */
class Course extends AbstractEntity
{
    /**
     * @var integer
     */
    private $course_id;

    /**
     * @var integer
     */
    private $bank_id;

    /**
     * @var string
     */
    private $currency;

    /**
     * @var float
     */
    private $cost;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var Bank
     */
    private $bank;

    /**
     * @var int
     */
    private $type;


    /**
     * Get courseId
     *
     * @return integer
     */
    public function getCourseId()
    {
        return $this->course_id;
    }

    /**
     * Set bankId
     *
     * @param integer $bankId
     *
     * @return Course
     */
    public function setBankId($bankId)
    {
        $this->bank_id = $bankId;

        return $this;
    }

    /**
     * Get bankId
     *
     * @return integer
     */
    public function getBankId()
    {
        return $this->bank_id;
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
     * @param float $cost
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
     * @return float
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Course
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set bank
     *
     * @param Bank $bank
     *
     * @return Course
     */
    public function setBank(Bank $bank = null)
    {
        $this->bank = $bank;

        return $this;
    }

    /**
     * Get bank
     *
     * @return Bank
     */
    public function getBank()
    {
        return $this->bank;
    }

    /**
     * Set type
     *
     * @param integer $type
     *
     * @return Course
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer
     */
    public function getType()
    {
        return $this->type;
    }
    /**
     * @var float
     */
    private $cost_buy;

    /**
     * @var float
     */
    private $cost_sale;


    /**
     * Set costBuy
     *
     * @param float $costBuy
     *
     * @return Course
     */
    public function setCostBuy($costBuy)
    {
        $this->cost_buy = $costBuy;

        return $this;
    }

    /**
     * Get costBuy
     *
     * @return float
     */
    public function getCostBuy()
    {
        return $this->cost_buy;
    }

    /**
     * Set costSale
     *
     * @param float $costSale
     *
     * @return Course
     */
    public function setCostSale($costSale)
    {
        $this->cost_sale = $costSale;

        return $this;
    }

    /**
     * Get costSale
     *
     * @return float
     */
    public function getCostSale()
    {
        return $this->cost_sale;
    }
}
