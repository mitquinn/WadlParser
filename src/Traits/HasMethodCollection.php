<?php
/**
 * Created by PhpStorm.
 * User: mquinn
 * Date: 3/8/19
 * Time: 11:17 AM
 */

namespace Mitquinn\Wadl\Traits;

use Mitquinn\Wadl\Component\Collections\MethodCollection;

/**
 * Trait HasMethodCollection
 * @package Mitquinn\Wadl\Traits
 */
trait HasMethodCollection
{
    /** @var MethodCollection $methodCollection */
    protected $methodCollection = null;

    /**
     * @return MethodCollection
     */
    public function getMethodCollection(): MethodCollection
    {
        if(is_null($this->methodCollection)) {
            $this->setMethodCollection(new MethodCollection());
        }
        return $this->methodCollection;
    }

    /**
     * @param MethodCollection $methodCollection
     * @return self
     */
    public function setMethodCollection(MethodCollection $methodCollection): self
    {
        $this->methodCollection = $methodCollection;
        return $this;
    }

}