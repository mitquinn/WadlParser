<?php
/**
 * Created by PhpStorm.
 * User: mquinn
 * Date: 3/8/19
 * Time: 11:13 AM
 */

namespace Mitquinn\Wadl\Component\Collections;

use Mitquinn\Wadl\Component\Method;
use Tightenco\Collect\Support\Collection;

/**
 * Class MethodCollection
 * @package Mitquinn\Wadl\Component\Collections
 */
class MethodCollection
{
    /** @var Collection $methods */
    protected $methods = null;


    /**
     * @param Method $method
     * @return MethodCollection
     */
    public function addMethod(Method $method): MethodCollection
    {
        $this->getMethods()->add($method);
        return $this;
    }

    /**
     * @param $methodString
     * @return MethodCollection
     */
    public function filterByMethodType($methodString): MethodCollection
    {
        $methods = $this->getMethods()->filter(function($method) use ($methodString) {
            /** @var Method $method */
            if(ucwords($method->getId()) != $methodString and ucwords($method->getName()) != $methodString) {
                return false;
            }
            return true;
        });
        $this->setMethods($methods);
        return $this;
    }



    /**
     * @return Collection
     */
    public function getMethods(): Collection
    {
        if(is_null($this->methods)) {
            $this->setMethods(new Collection());
        }
        return $this->methods;
    }

    /**
     * @param Collection $methods
     * @return MethodCollection
     */
    public function setMethods(Collection $methods): MethodCollection
    {
        $this->methods = $methods;
        return $this;
    }

}