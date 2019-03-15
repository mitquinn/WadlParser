<?php
/**
 * Created by PhpStorm.
 * User: mquinn
 * Date: 3/7/19
 * Time: 6:32 PM
 */

namespace Mitquinn\Wadl\Traits;

use Mitquinn\Wadl\Component\Collections\DocCollection;

/**
 * Trait HasDocCollection
 * @package Mitquinn\Wadl\Traits
 */
trait HasDocCollection
{

    /** @var DocCollection $docCollection */
    protected $docCollection = null;

    /**
     * @return DocCollection
     */
    public function getDocCollection(): DocCollection
    {
        if(is_null($this->docCollection)) {
            $this->setDocCollection(new DocCollection());
        }
        return $this->docCollection;
    }

    /**
     * @param DocCollection $docCollection
     * @return self
     */
    public function setDocCollection(DocCollection $docCollection): self
    {
        $this->docCollection = $docCollection;
        return $this;
    }

}