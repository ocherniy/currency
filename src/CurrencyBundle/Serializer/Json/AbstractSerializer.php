<?php

namespace CurrencyBundle\Serializer\Json;

use CurrencyBundle\Entity\AbstractEntity;

/**
 * Class AbstractSerializer
 *
 * @package CurrencyBundle\Serializer
 */
abstract class AbstractSerializer
{
    /**
     * @param AbstractEntity $entity
     * @return string
     */
    public function serialize($entity)
    {
        return $this->toArray($entity);
    }

    /**
     * @param AbstractEntity $entity
     * @return array
     */
    protected function toArray($entity)
    {
        $data = $this->getAttributes($entity);

        return $data;
    }

    /**
     * @param AbstractEntity $entity
     * @return array
     */
    abstract protected function getAttributes($entity);
}
