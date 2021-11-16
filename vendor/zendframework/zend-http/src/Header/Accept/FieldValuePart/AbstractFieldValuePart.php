<?php
/**
 */

namespace Zend\Http\Header\Accept\FieldValuePart;

/**
 * Field Value Part
 *
 */
abstract class AbstractFieldValuePart
{
    /**
     * Internal object used for value retrieval
     * @var object
     */
    private $internalValues;

    /**
     * A Field Value Part this Field Value Part matched against.
     * @var AbstractFieldValuePart
     */
    protected $matchedAgainst;

    /**
     * @param object $internalValues
     */
    public function __construct($internalValues)
    {
        $this->internalValues = $internalValues;
    }

    /**
     * Set a Field Value Part this Field Value Part matched against.
     *
     * @param AbstractFieldValuePart $matchedAgainst
     * @return $this
     */
    public function setMatchedAgainst(AbstractFieldValuePart $matchedAgainst)
    {
        $this->matchedAgainst = $matchedAgainst;
        return $this;
    }

    /**
     * Get a Field Value Part this Field Value Part matched against.
     *
     * @return AbstractFieldValuePart|null
     */
    public function getMatchedAgainst()
    {
        return $this->matchedAgainst;
    }

    /**
     * @return object
     */
    protected function getInternalValues()
    {
        return $this->internalValues;
    }

    /**
     * @return string $typeString
     */
    public function getTypeString()
    {
        return $this->getInternalValues()->typeString;
    }

    /**
     * @return float $priority
     */
    public function getPriority()
    {
        return (float) $this->getInternalValues()->priority;
    }

    /**
     * @return \stdClass $params
     */
    public function getParams()
    {
        return (object) $this->getInternalValues()->params;
    }

    /**
     * @return string $raw
     */
    public function getRaw()
    {
        return $this->getInternalValues()->raw;
    }

    /**
     * @param mixed $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->getInternalValues()->$key;
    }
}
