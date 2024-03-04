<?php
namespace App\Filters;
use Illuminate\Http\Request;
use App\Filters\ApiFilter;
class InvoiceFilter extends ApiFilter{
/*
    * Filtros para customer
    *http://127.0.0.1:8000/api/v1/invoices?customerId[eq]=5
    *http://127.0.0.1:8000/api/v1/invoices?amount[gt]=15000
*/
    protected $safeParams =[
        'customerId'=>['eq'],
        'amount' =>['eq','gt','get','lt','lte'],
        'status'=>['eq','ne'],
        'billedDate'=>['eq','gt','gte','lt','lte'],
        'paidDate'=>['eq','gt','gte','lt','lte'],

    ];
    protected $columnMap =[
        'customerId'=>'customer_id',
        'billedDate'=>'billed_dated',
        'paidDate'=>'paid_dated',

    ];
    protected $operatorMap =[
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
        'ne' => '!=',
    ];
}
