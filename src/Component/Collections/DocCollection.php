<?php
/**
 * Created by PhpStorm.
 * User: mquinn
 * Date: 3/7/19
 * Time: 3:39 PM
 */

namespace Mitquinn\Wadl\Component\Collections;

use Mitquinn\Wadl\Component\Doc;
use Tightenco\Collect\Support\Collection;

/**
 * Class Docs
 * @package Mitquinn\Wadl\Component\Collections
 */
class DocCollection
{
    /** @var Collection $docs */
    protected $docs = null;

    /**
     * @param Doc $doc
     * @return DocCollection
     */
    public function addDoc(Doc $doc): DocCollection
    {
        $this->getDocs()->add($doc);
        return $this;
    }

    /*** Getters and Setters ***/

    /**
     * @return Collection
     */
    public function getDocs(): Collection
    {
        if(is_null($this->docs)) {
            $this->setDocs(new Collection());
        }
        return $this->docs;
    }

    /**
     * @param Collection $docs
     * @return DocCollection
     */
    protected function setDocs(Collection $docs): DocCollection
    {
        $this->docs = $docs;
        return $this;
    }

}