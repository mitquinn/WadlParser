<?php
/**
 * Created by PhpStorm.
 * User: mquinn
 * Date: 3/4/19
 * Time: 1:25 AM
 */

namespace Mitquinn\Wadl\Component;

use SimpleXMLElement;

/**
 * Class Representation
 * @package Mitquinn\Wadl\Component
 */
class Representation
{

    /** @var string $mediaType */
    public $mediaType;

    /**
     * Representation constructor.
     * @param SimpleXMLElement $representation
     */
    public function __construct(SimpleXMLElement $representation)
    {
        if(isset($representation['mediaType'])) {
            $this->setMediaType($representation['mediaType']);
        }
    }

    /**
     * @return string
     */
    public function getMediaType(): string
    {
        return $this->mediaType;
    }

    /**
     * @param string $mediaType
     * @return Representation
     */
    public function setMediaType(string $mediaType): Representation
    {
        $this->mediaType = $mediaType;
        return $this;
    }

}