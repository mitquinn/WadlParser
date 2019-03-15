<?php
/**
 * Created by PhpStorm.
 * User: mquinn
 * Date: 3/7/19
 * Time: 6:04 PM
 */

namespace Mitquinn\Wadl\Component\Collections;

use Mitquinn\Wadl\Component\Response;
use Tightenco\Collect\Support\Collection;

/**
 * Class ResponseCollection
 * @package Mitquinn\Wadl\Component\Collections
 */
class ResponseCollection
{
    /** @var Collection $responses */
    protected $responses = null;

    /**
     * @param Response $response
     * @return ResponseCollection
     */
    public function addResponse(Response $response): ResponseCollection
    {
        $this->getResponses()->add($response);
        return $this;
    }

    /**
     * @return Collection
     */
    public function getResponses(): Collection
    {
        if(is_null($this->responses)) {
            $this->setResponses(new Collection());
        }
        return $this->responses;
    }

    /**
     * @param Collection $responses
     * @return ResponseCollection
     */
    protected function setResponses(Collection $responses): ResponseCollection
    {
        $this->responses = $responses;
        return $this;
    }

}