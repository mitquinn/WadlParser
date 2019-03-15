<?php
/**
 * Created by PhpStorm.
 * User: mquinn
 * Date: 3/8/19
 * Time: 2:10 AM
 */

namespace Mitquinn\Wadl\Traits;

use Mitquinn\Wadl\Component\Collections\ResponseCollection;

/**
 * Trait HasResponseCollection
 * @package Mitquinn\Wadl\Traits
 */
trait HasResponseCollection
{
    /** @var ResponseCollection $responseCollection */
    protected $responseCollection = null;

    /**
     * @return ResponseCollection
     */
    protected function getResponseCollection(): ResponseCollection
    {
        if(is_null($this->responseCollection)) {
            $this->setResponseCollection(new ResponseCollection());
        }
        return $this->responseCollection;
    }

    /**
     * @param ResponseCollection $responseCollection
     * @return self
     */
    public function setResponseCollection(ResponseCollection $responseCollection): self
    {
        $this->responseCollection = $responseCollection;
        return $this;
    }

}