<?php

namespace CurrencyBundle\Output\Json;

use CurrencyBundle\Serializer\Json\CourseSerializer;

/**
 * Class CourseOutput
 *
 * @package CurrencyBundle\Output\Json
 */
class CourseOutput extends AbstractOutput
{
    /**
     * @return CourseSerializer
     */
    public function getSerializer()
    {
        return new CourseSerializer();
    }
}
