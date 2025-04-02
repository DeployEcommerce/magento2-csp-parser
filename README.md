# Magento 2 CSP Parser

This library is a simple CSP parser for Magento 2. 

It can be used to parse an existing `csp_whitelist.xml` file and return you a 
structured array.

Create a parser instance and call the `parse` method with the contents of your file:

```php
$xml = file_get_contents('csp_whitelist.xml');

$parser = new \DeployEcommerce\Csp\Parser\Magento2CspParser();
$policies = $parser->parse($xml);
```
An array will be returned containing the parsed elements:

```array:8 [▼
  "style-src" => array:6 [▼
    0 => array:4 [▼
      "type" => "host"
      "name" => "hotjar"
      "value" => "*.hotjar.com"
      "directive" => "style-src"
    ]
    1 => array:4 [▼
      "type" => "host"
      "name" => "gmaps"
      "value" => "maps.googleapis.com"
      "directive" => "style-src"
    ]
    2 => array:4 [▼
      "type" => "host"
      "name" => "cookiebot"
      "value" => "*.cookiebot.com"
      "directive" => "style-src"
    ]
  ]
  "font-src" => array:5 [▶]
  "img-src" => array:15 [▶]
  "frame-src" => array:7 [▶]
  "media-src" => array:7 [▶]
  "connect-src" => array:17 [▶]
  "form-action" => array:2 [▶]
]
```

This can be used in conjunction with the [DeployEcommerce/magento2-csp-writer](https://github.com/DeployEcommerce/magento2-csp-writer) package to generate a CSP file as well.