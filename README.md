# Laravel Invoice Generator

A modern, clean Composer package for Laravel that generates customizable PDF invoices.

## Features

- Blade-based invoice templates (publishable and editable)
- Dynamic invoice data (customer info, products/services, taxes, discounts, subtotal, total)
- Optional QR code with a link (e.g., to view the invoice online)
- Multi-language and currency formatting support
- Config file for customizing default settings (currency, tax rules, branding, etc.)
- Laravel-ready: registers via service provider, supports `php artisan vendor:publish`, and offers a facade or helper function like `Invoice::make()->toPdf()`
- Good DX: clear docs, well-named classes, optional view preview before generating PDF

## Installation

You1. Require the package with Composer:

    ```bash
    composer require your-vendor/laravel-invoice-generator
    ```

2. (Optional) Publish the configuration file and views:

    ```bash
    php artisan vendor:publish --provider="YourVendor\\LaravelInvoiceGenerator\\InvoiceServiceProvider"
    ```

    This will publish `config/invoice.php` and `resources/views/vendor/invoice/template.blade.php`.

## Usage

### Generating a PDF Invoice

```php
use YourVendor\LaravelInvoiceGenerator\Facades\Invoice;

$data = [
    'customer' => [
        'name' => 'John Doe',
        'address' => '123 Main St, Anytown, USA',
        'email' => 'john.doe@example.com',
    ],
    'items' => [
        [
            'description' => 'Product A',
            'quantity' => 2,
            'unit_price' => 10.00,
            'total' => 20.00,
        ],
        [
            'description' => 'Service B',
            'quantity' => 1,
            'unit_price' => 50.00,
            'total' => 50.00,
        ],
    ],
    'subtotal' => 70.00,
    'tax' => 7.00, // Assuming 10% tax
    'discount' => 5.00,
    'total' => 72.00,
    'qr_code_link' => 'https://example.com/invoice/123',
];

return Invoice::make($data)->toPdf();
```

### Previewing the Invoice

```php
use YourVendor\LaravelInvoiceGenerator\Facades\Invoice;

$data = [
    // ... same data as above
];

return Invoice::make($data)->preview();
```

### Configuration

The `config/invoice.php` file allows you to customize various settings:

- `template`: The Blade template used for rendering the invoice.
- `currency`: Default currency for invoices.
- `tax_rate`: Default tax rate.
- `company_logo`, `company_name`, `company_address`, `company_phone`, `company_email`, `company_website`: Company branding details.
- `qr_code`: Settings for the optional QR code (enabled, size, color, background).
- `pdf_generator`: Currently only `dompdf` is supported.

## Customizing Templates

After publishing the views, you can edit `resources/views/vendor/invoice/template.blade.php` to fully customize the invoice's appearance.

## Multi-language Support

The package leverages Laravel's localization features. Ensure your application's locale is set correctly, and the `NumberFormatter` in the `Invoice` class will handle currency formatting based on the current locale.

## Contributing

Feel free to contribute to this project by submitting issues or pull requests.

## License

The Laravel Invoice Generator is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

