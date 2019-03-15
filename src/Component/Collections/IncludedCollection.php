<?php
/**
 * Created by PhpStorm.
 * User: mquinn
 * Date: 3/7/19
 * Time: 5:56 PM
 */

namespace Mitquinn\Wadl\Component\Collections;

use Mitquinn\Wadl\Component\Included;
use Tightenco\Collect\Support\Collection;

/**
 * Class IncludeCollection
 * @package Mitquinn\Wadl\Component\Collections
 */
class IncludedCollection
{
    /** @var Collection $includes */
    protected $includes = null;

    /**
     * @param Included $included
     * @return IncludedCollection
     */
    public function addInclude(Included $included): IncludedCollection
    {
        $this->getIncludes()->add($included);
        return $this;
    }

    /**
     * @return Collection
     */
    public function getIncludes(): Collection
    {
        if(is_null($this->includes)) {
            $this->setIncludes(new Collection());
        }
        return $this->includes;
    }

    /**
     * @param Collection $includes
     * @return IncludedCollection
     */
    protected function setIncludes(Collection $includes): IncludedCollection
    {
        $this->includes = $includes;
        return $this;
    }


}