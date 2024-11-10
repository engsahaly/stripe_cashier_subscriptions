<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoicesController extends Controller
{
    public function index()
    {
        // $invoice = Auth::user()->createInvoice();
        // $invoices = Auth::user()->invoices(true);
        $invoices = Auth::user()->invoicesIncludingPending();
        return view("invoices", get_defined_vars());
    }

    public function download($invoiceId)
    {
        return Auth::user()->downloadInvoice($invoiceId);
    }
}
