<?php
/**
 * Created by PhpStorm.
 * User: mquinn
 * Date: 3/7/19
 * Time: 6:14 PM
 */

namespace Mitquinn\Wadl\Component\Collections;

use Mitquinn\Wadl\Component\Option;
use Tightenco\Collect\Support\Collection;

/**
 * Class OptionCollection
 * @package Mitquinn\Wadl\Component\Collections
 */
class OptionCollection
{

    /** @var Collection $options */
    protected $options = null;

    /**
     * @param Option $option
     * @return OptionCollection
     */
    public function addOption(Option $option): OptionCollection
    {
        $this->getOptions()->add($option);
        return $this;
    }

    /**
     * @return Collection
     */
    public function getOptions(): Collection
    {
        if(is_null($this->options)) {
            $this->setOptions(new Collection());
        }
        return $this->options;
    }

    /**
     * @param Collection $options
     * @return OptionCollection
     */
    protected function setOptions(Collection $options): OptionCollection
    {
        $this->options = $options;
        return $this;
    }

}