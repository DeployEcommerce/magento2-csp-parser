<?php

namespace DeployEcommerce\Csp\Parser;

class Magento2CspParser {
    /**
     * @param string $xml
     * @return array
     */
    public function parse(string $xml): array
    {
        $policies = [];

        try {
            $xml = simplexml_load_string($xml);
            foreach ($xml->children()->xpath('policy') as $policy) {
                $directive = (string)$policy->attributes()->id;
                $values = $policy->children()->xpath('value');

                foreach ($values as $value) {
                    $name = (string)$value->attributes()->id;
                    $type = (string)$value->attributes()->type;
                    $value = (string)$value[0];

                    $policies[$directive][] = [
                        'type' => $type,
                        'name' => $name,
                        'value' => $value,
                        'directive' => $directive,
                    ];
                }
            }

            return $policies;
        } catch (\Exception $e) {
            return [];
        }
    }
}