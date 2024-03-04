<?php
namespace App\Filters;
use Illuminate\Http\Request;
use App\Filters\ApiFilter;
/*
    * Filtros para customer
    *http://127.0.0.1:8000/api/v1/customers?postalCode[gt]=1000
    *http://127.0.0.1:8000/api/v1/customers?type[eq]=i
    *http://127.0.0.1:8000/api/v1/customers?name[eq]=Christelle Fisher
    *http://127.0.0.1:8000/api/v1/customers?state[eq]=Nevada
    *http://127.0.0.1:8000/api/v1/customers/34
*/

class CustomerFilter extends ApiFilter{

    protected $safeParams =[
        'name'=>['eq'],
        'type'=>['eq'],
        'total'=>['eq'],
        'email'=>['eq'],
        'address'=>['eq'],
        'city'=>['eq'],
        'state'=>['eq'],
        'postalCode'=>['eq','gt','lt'],
    ];
    protected $columnMap =[
        'postalCode'=>'postal_code',
    ];
    protected $operatorMap =[
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
    ];
}
