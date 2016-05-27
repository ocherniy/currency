<?php

namespace CurrencyBundle\Entity;

/**
 * Bank
 */
class Bank extends AbstractEntity
{
    /**
     * @var integer
     */
    private $bank_id;

    /**
     * @var string
     */
    private $unique_id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $logo;

    /**
     * @var string
     */
    private $link;


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
     * Set uniqueId
     *
     * @param string $uniqueId
     *
     * @return Bank
     */
    public function setUniqueId($uniqueId)
    {
        $this->unique_id = $uniqueId;

        return $this;
    }

    /**
     * Get uniqueId
     *
     * @return string
     */
    public function getUniqueId()
    {
        return $this->unique_id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Bank
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set logo
     *
     * @param string $logo
     *
     * @return Bank
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set link
     *
     * @param string $link
     *
     * @return Bank
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }
}
