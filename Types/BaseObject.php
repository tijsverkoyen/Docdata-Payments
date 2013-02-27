<?php
namespace TijsVerkoyen\DocDataPayments\Types;

use TijsVerkoyen\DocDataPayments\DocDataPayments;

/**
 * DocDataPayments BaseObject class
 *
 * @author		Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class BaseObject
{
    /**
     * @return array
     */
    public function toArray()
    {
        $return = array();

        foreach ($this as $name => $value) {
            // skip empty elements
            if (is_null($value)) {
                continue;
            }

            if (is_object($value)) {
                $data = $value->toArray();
            } else {
                $data = $value;
            }

            $return[$name] = $data;
        }

        return $return;
    }
}
