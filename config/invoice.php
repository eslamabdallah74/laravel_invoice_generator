<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Invoice Template
    |--------------------------------------------------------------------------
    |
    | This option specifies the Blade template that will be used to render
    | the invoice. You can publish and customize this template.
    |
    */

    'template' => 'invoice::template',

    /*
    |--------------------------------------------------------------------------
    | Default Currency
    |--------------------------------------------------------------------------
    |
    | This option defines the default currency to be used for invoices.
    | You can override this on a per-invoice basis.
    |
    */

    'currency' => 'USD',

    /*
    |--------------------------------------------------------------------------
    | Default Tax Rate
    |--------------------------------------------------------------------------
    |
    | This option sets a default tax rate (as a percentage) for invoices.
    | This can be overridden for individual items or invoices.
    |
    */

    'tax_rate' => 0.0,

    /*
    |--------------------------------------------------------------------------
    | Company Branding
    |--------------------------------------------------------------------------
    |
    | Use these options to customize the branding on your invoices.
    | You can specify a logo path and company details.
    |
    */

    'company_logo' => null,
    'company_name' => 'Your Company Name',
    'company_address' => '123 Business Rd, Suite 456, City, State, Zip',
    'company_phone' => '+1 (123) 456-7890',
    'company_email' => 'info@yourcompany.com',
    'company_website' => 'https://www.yourcompany.com',

    /*
    |--------------------------------------------------------------------------
    | QR Code Settings
    |--------------------------------------------------------------------------
    |
    | Configure settings for the optional QR code on the invoice.
    | Set 'enabled' to true to include a QR code.
    |
    */

    'qr_code' => [
        'enabled' => false,
        'size' => 150,
        'color' => [0, 0, 0],
        'background' => [255, 255, 255],
    ],

    /*
    |--------------------------------------------------------------------------
    | PDF Generator
    |--------------------------------------------------------------------------
    |
    | Choose your preferred PDF generation library. Currently, only 'dompdf'
    | is supported out-of-the-box. Future versions may support 'snappy'.
    |
    */

    'pdf_generator' => 'dompdf',
];


