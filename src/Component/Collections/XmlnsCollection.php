<?php
/**
 * Created by PhpStorm.
 * User: mquinn
 * Date: 3/7/19
 * Time: 5:23 PM
 */

namespace Mitquinn\Wadl\Component\Collections;

use Tightenco\Collect\Support\Collection;

/**
 * Class Xmlns
 * @package Mitquinn\Wadl\Component\Collections
 */
class XmlnsCollection
{
    /** @var Collection $xmlns */
    protected $xmlns = null;
    
    /**
     * @param \Mitquinn\Wadl\Component\Xmlns $xmlns
     * @return XmlnsCollection
     */
    public function addXmlns(\Mitquinn\Wadl\Component\Xmlns $xmlns): XmlnsCollection
    {
        $this->getXmlns()->add($xmlns);
        return $this;
    }

    /**
     * @return Collection
     */
    public function getXmlns(): Collection
    {
        if(is_null($this->xmlns)) {
            $this->setXmlns(new Collection());
        }
        return $this->xmlns;
    }

    /**
     * @param Collection $xmlns
     * @return XmlnsCollection
     */
    protected function setXmlns(Collection $xmlns): XmlnsCollection
    {
        $this->xmlns = $xmlns;
        return $this;
    }

}