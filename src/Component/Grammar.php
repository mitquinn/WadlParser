<?php
/**
 * Created by PhpStorm.
 * User: mquinn
 * Date: 3/4/19
 * Time: 1:37 AM
 */

namespace Mitquinn\Wadl\Component;

use SimpleXMLElement;
use Mitquinn\Wadl\Traits\HasIncludedCollection;

/**
 * Class Grammar
 * @package Mitquinn\Wadl\Component
 */
class Grammar
{
    use HasIncludedCollection;

    /**
     * Grammar constructor.
     * @param SimpleXMLElement $grammar
     */
    public function __construct(SimpleXMLElement $grammar)
    {
        //Handle the includes.
        if(isset($grammar->include)) {
            $includes = $grammar->include;
            /** @var SimpleXMLElement $included */
            foreach ($includes as $included) {
                $this->getIncludedCollection()->addInclude(new Included($included));
            }
        }
    }
}