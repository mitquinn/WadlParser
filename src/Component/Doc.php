<?php
/**
 * Created by PhpStorm.
 * User: mquinn
 * Date: 3/4/19
 * Time: 1:39 AM
 */

namespace Mitquinn\Wadl\Component;

use SimpleXMLElement;
use Mitquinn\Wadl\Traits\HasXmlnsCollection;

/**
 * Class Doc
 * @package Mitquinn\Wadl\Component
 */
class Doc
{
    use HasXmlnsCollection;

    /**
     * Doc constructor.
     * @param SimpleXMLElement $doc
     */
    public function __construct(SimpleXMLElement $doc)
    {
        //Handle the namespace.
        $namespaces = $doc->getNamespaces();
        foreach ($namespaces as $prefix => $uri) {
            $this->getXmlnsCollection()->addXmlns(new Xmlns($prefix, $uri));
        }
    }

}