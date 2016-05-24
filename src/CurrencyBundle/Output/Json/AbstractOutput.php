<?php

namespace CurrencyBundle\Output\Json;

use CurrencyBundle\Entity\AbstractEntity;
use CurrencyBundle\Serializer\Json\AbstractSerializer;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class AbstractJsonOutput
 *
 * @package CurrencyBundle\Output\Json
 */
abstract class AbstractOutput
{
    /**
     * @param array $data
     * @return JsonResponse
     */
    public function execute(array $data)
    {
        if (empty($data)) {
            return new JsonResponse(NULL, JsonResponse::HTTP_NO_CONTENT);
        }

        $responseData = array();
        /** @var AbstractEntity $entity */
        foreach ($data as $entity) {
            $responseData[] = $this->getSerializer()->serialize($entity);
        }

        return new JsonResponse($responseData);
    }

    /**
     * @return AbstractSerializer
     */
    abstract protected function getSerializer();
}
