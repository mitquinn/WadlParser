<?php
/**
 * Created by PhpStorm.
 * User: mquinn
 * Date: 3/8/19
 * Time: 1:59 AM
 */

namespace Mitquinn\Wadl\Traits;

use Mitquinn\Wadl\Component\Collections\XmlnsCollection;

/**
 * Trait HasXmlnsCollection
 * @package Mitquinn\Wadl\Traits
 */
trait HasXmlnsCollection
{
    /** @var XmlnsCollection $xmlnsCollection */
    protected $xmlnsCollection = null;

    /**
     * @return XmlnsCollection
     */
    protected function getXmlnsCollection(): XmlnsCollection
    {
        if(is_null($this->xmlnsCollection)) {
            $this->setXmlnsCollection(new XmlnsCollection());
        }
        return $this->xmlnsCollection;
    }

    /**
     * @param XmlnsCollection $xmlnsCollection
     * @return self
     */
    public function setXmlnsCollection(XmlnsCollection $xmlnsCollection): self
    {
        $this->xmlnsCollection = $xmlnsCollection;
        return $this;
    }


}