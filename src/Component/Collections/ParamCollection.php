<?php
/**
 * Created by PhpStorm.
 * User: mquinn
 * Date: 3/8/19
 * Time: 2:18 AM
 */

namespace Mitquinn\Wadl\Component\Collections;


use Mitquinn\Wadl\Component\Param;
use Tightenco\Collect\Support\Collection;

/**
 * Class ParamCollection
 * @package Mitquinn\Wadl\Component\Collections
 */
class ParamCollection
{
    /** @var Collection $params */
    protected $params = null;

    /**
     * @param Param $param
     * @return ParamCollection
     */
    public function addParam(Param $param): ParamCollection
    {
        $this->getParams()->add($param);
        return $this;
    }

    /**
     * @return Collection
     */
    public function getParams(): Collection
    {
        if(is_null($this->params)) {
            $this->setParams(new Collection());
        }
        return $this->params;
    }

    /**
     * @param Collection $params
     * @return ParamCollection
     */
    protected function setParams(Collection $params): ParamCollection
    {
        $this->params = $params;
        return $this;
    }

}