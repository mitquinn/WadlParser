<?php
/**
 * Created by PhpStorm.
 * User: mquinn
 * Date: 3/8/19
 * Time: 2:14 AM
 */

namespace Mitquinn\Wadl\Traits;

use Mitquinn\Wadl\Component\Collections\OptionCollection;

/**
 * Trait HasOptionCollection
 * @package Mitquinn\Wadl\Traits
 */
trait HasOptionCollection
{
    /** @var OptionCollection $optionCollection */
    protected $optionCollection;

    /**
     * @return OptionCollection
     */
    public function getOptionCollection(): OptionCollection
    {
        if(is_null($this->optionCollection)) {
            $this->setOptionCollection(new OptionCollection());
        }
        return $this->optionCollection;
    }

    /**
     * @param OptionCollection $optionCollection
     * @return self
     */
    public function setOptionCollection(OptionCollection $optionCollection): self
    {
        $this->optionCollection = $optionCollection;
        return $this;
    }

}