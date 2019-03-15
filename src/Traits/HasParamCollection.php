<?php
/**
 * Created by PhpStorm.
 * User: mquinn
 * Date: 3/8/19
 * Time: 2:17 AM
 */

namespace Mitquinn\Wadl\Traits;

use Mitquinn\Wadl\Component\Collections\ParamCollection;

/**
 * Trait HasParamCollection
 * @package Mitquinn\Wadl\Traits
 */
trait HasParamCollection
{
    /** @var ParamCollection $paramCollection */
    protected $paramCollection = null;

    /**
     * @return ParamCollection
     */
    public function getParamCollection(): ParamCollection
    {
        if(is_null($this->paramCollection)) {
            $this->setParamCollection(new ParamCollection());
        }
        return $this->paramCollection;
    }

    /**
     * @param ParamCollection $paramCollection
     * @return self
     */
    public function setParamCollection(ParamCollection $paramCollection): self
    {
        $this->paramCollection = $paramCollection;
        return $this;
    }

}