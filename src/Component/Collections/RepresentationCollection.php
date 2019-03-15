<?php
/**
 * Created by PhpStorm.
 * User: mquinn
 * Date: 3/8/19
 * Time: 12:56 PM
 */

namespace Mitquinn\Wadl\Component\Collections;

use Mitquinn\Wadl\Component\Representation;
use Tightenco\Collect\Support\Collection;

/**
 * Class RepresentationCollection
 * @package Mitquinn\Wadl\Component\Collections
 */
class RepresentationCollection
{
    /** @var Collection $representations */
    protected $representations = null;

    /**
     * @param Representation $representation
     * @return RepresentationCollection
     */
    public function addRepresentation(Representation $representation): RepresentationCollection
    {
        $this->getRepresentations()->add($representation);
        return $this;
    }

    /**
     * @return Collection
     */
    public function getRepresentations(): Collection
    {
        if(is_null($this->representations)) {
            $this->setRepresentations(new Collection());
        }
        return $this->representations;
    }

    /**
     * @param Collection $representations
     * @return RepresentationCollection
     */
    protected function setRepresentations(Collection $representations): RepresentationCollection
    {
        $this->representations = $representations;
        return $this;
    }

}