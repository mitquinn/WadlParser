<?php
/**
 * Created by PhpStorm.
 * User: mquinn
 * Date: 3/8/19
 * Time: 1:54 AM
 */

namespace Mitquinn\Wadl\Traits;

use Mitquinn\Wadl\Component\Collections\IncludedCollection;

/**
 * Trait HasIncludedCollection
 * @package Mitquinn\Wadl\Traits
 */
trait HasIncludedCollection
{
    /** @var IncludedCollection $includedCollection */
    protected $includedCollection = null;

    /**
     * @return IncludedCollection
     */
    public function getIncludedCollection(): IncludedCollection
    {
        if(is_null($this->includedCollection)) {
            $this->setIncludedCollection(new IncludedCollection());
        }
        return $this->includedCollection;
    }

    /**
     * @param IncludedCollection $includedCollection
     * @return HasIncludedCollection
     */
    public function setIncludedCollection(IncludedCollection $includedCollection): self
    {
        $this->includedCollection = $includedCollection;
        return $this;
    }
}