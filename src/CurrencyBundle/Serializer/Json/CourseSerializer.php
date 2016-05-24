<?php

namespace CurrencyBundle\Serializer\Json;

use CurrencyBundle\Entity\Bank;
use CurrencyBundle\Entity\Course;

class CourseSerializer extends AbstractSerializer
{

    /**
     * @param Course $course
     * @return array
     */
    protected function getAttributes($course)
    {
        return array(
            'id' => $course->getCourseId(),
            'currency' => $course->getCurrency(),
            'cost' => $course->getCost(),
            'date' => $course->getDate()->getTimestamp(),
            'bank' => $this->getBank($course->getBank()),
        );
    }

    /**
     * @param Bank $bank
     * @return string
     */
    protected function getBank(Bank $bank)
    {
        $bankSerializer = new BankSerializer();

        return $bankSerializer->serialize($bank);
    }
}
