# AimaneCouissi_NegotiableQuoteOrderReference

[![Latest Stable Version](http://poser.pugx.org/aimanecouissi/module-negotiable-quote-order-reference/v)](https://packagist.org/packages/aimanecouissi/module-negotiable-quote-order-reference) [![Total Downloads](http://poser.pugx.org/aimanecouissi/module-negotiable-quote-order-reference/downloads)](https://packagist.org/packages/aimanecouissi/module-negotiable-quote-order-reference) [![Latest Unstable Version](http://poser.pugx.org/aimanecouissi/module-negotiable-quote-order-reference/v/unstable)](https://packagist.org/packages/aimanecouissi/module-negotiable-quote-order-reference) [![License](http://poser.pugx.org/aimanecouissi/module-negotiable-quote-order-reference/license)](https://packagist.org/packages/aimanecouissi/module-negotiable-quote-order-reference) [![PHP Version Require](http://poser.pugx.org/aimanecouissi/module-negotiable-quote-order-reference/require/php)](https://packagist.org/packages/aimanecouissi/module-negotiable-quote-order-reference)

Adds an **Order reference** link to the Negotiable Quote view page, allowing quick navigation to the order created from the quote.

## Installation
```bash
composer require aimanecouissi/module-negotiable-quote-order-reference
bin/magento module:enable AimaneCouissi_NegotiableQuoteOrderReference
bin/magento setup:upgrade
bin/magento cache:flush
```

## Usage
Open any Negotiable Quote’s view page. If the quote has been converted to an order, an Order reference appears on the Quote section and links directly to the order view; otherwise, the link is not shown.

## Uninstall
```bash
bin/magento module:disable AimaneCouissi_NegotiableQuoteOrderReference
composer remove aimanecouissi/module-negotiable-quote-order-reference
bin/magento setup:upgrade
bin/magento cache:flush
```

## License
[MIT](LICENSE)
