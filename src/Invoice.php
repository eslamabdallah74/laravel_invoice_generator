
<?php

namespace YourVendor\LaravelInvoiceGenerator;

use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;
use NumberFormatter;

class Invoice
{
    protected $data = [];

    public function make(array $data)
    {
        $this->data = $data;
        return $this;
    }

    protected function formatCurrency($amount, $currency = null)
    {
        $currency = $currency ?? config("invoice.currency", "USD");
        $formatter = new NumberFormatter(app()->getLocale(), NumberFormatter::CURRENCY);
        return $formatter->formatCurrency($amount, $currency);
    }

    public function toPdf()
    {
        $this->data["formatCurrency"] = [$this, "formatCurrency"];
        $html = View::make(
            config("invoice.template", "invoice::template"),
            $this->data
        )->render();

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper("A4", "portrait");
        $dompdf->render();

        return $dompdf->stream("invoice.pdf", ["Attachment" => false]);
    }

    public function preview()
    {
        $this->data["formatCurrency"] = [$this, "formatCurrency"];
        return View::make(
            config("invoice.template", "invoice::template"),
            $this->data
        );
    }
}

