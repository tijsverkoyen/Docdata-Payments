<?php
namespace TijsVerkoyen\DocDataPayments\Base;

/**
 * DocDataPayments Object class
 *
 * @author		Tijs Verkoyen <php-docdatapayments@verkoyen.eu>
 */
class Object
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
