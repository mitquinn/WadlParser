<?php
/**
 * Created by PhpStorm.
 * User: mquinn
 * Date: 3/8/19
 * Time: 11:56 AM
 */

namespace Mitquinn\Wadl\Traits;

use Mitquinn\Wadl\Component\Collections\ResourceCollection;

/**
 * Trait HasResourceCollection
 * @package Mitquinn\Wadl\Traits
 */
trait HasResourceCollection
{
    /** @var ResourceCollection $resourceCollection */
    protected $resourceCollection = null;

    /**
     * @return ResourceCollection
     */
    public function getResourceCollection(): ResourceCollection
    {
        if(is_null($this->resourceCollection)) {
            $this->setResourceCollection(new ResourceCollection());
        }
        return $this->resourceCollection;
    }

    /**
     * @param ResourceCollection $resourceCollection
     * @return self
     */
    public function setResourceCollection(ResourceCollection $resourceCollection): self
    {
        $this->resourceCollection = $resourceCollection;
        return $this;
    }


}