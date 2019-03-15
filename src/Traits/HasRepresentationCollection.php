<?php
/**
 * Created by PhpStorm.
 * User: mquinn
 * Date: 3/8/19
 * Time: 1:11 PM
 */

namespace Mitquinn\Wadl\Traits;

use Mitquinn\Wadl\Component\Collections\RepresentationCollection;

/**
 * Trait HasRepresentationCollection
 * @package Mitquinn\Wadl\Traits
 */
trait HasRepresentationCollection
{
    /** @var RepresentationCollection $representationCollection */
    protected $representationCollection = null;

    /**
     * @return RepresentationCollection
     */
    public function getRepresentationCollection(): RepresentationCollection
    {
        if(is_null($this->representationCollection)) {
            $this->setRepresentationCollection(new RepresentationCollection());
        }
        return $this->representationCollection;
    }

    /**
     * @param RepresentationCollection $representationCollection
     * @return HasRepresentationCollection
     */
    public function setRepresentationCollection(RepresentationCollection $representationCollection): self
    {
        $this->representationCollection = $representationCollection;
        return $this;
    }

}