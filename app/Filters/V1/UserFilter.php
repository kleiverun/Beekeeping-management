<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class UserFilter extends ApiFilter
{
    protected $allowedParms = [
        'firstname' => ['eq'],
        'lastname' => ['eq'],
        'phonenumber' => ['eq'],
        'email' => ['eq'],
        'address' => ['eq'],
    ];
    protected $columnMap = [
        'firstname' => 'firstname',
        'lastname' => 'lastname',
        'phonenumber' => 'phonenumber',
        'email' => 'email',
        'address' => 'address',
    ];
    protected $operatorMap = [
        'eq' => '=',
        'ne' => '!=',
        'gt' => '>',
        'ge' => '>=',
        'lt' => '<',
        'le' => '<=',
        'like' => 'like',
    ];

    public function transform($request)
    {
        $queryItems = [];

        foreach ($this->allowedParms as $field => $operators) {
            $query = $request->query($field);

            if (!isset($query)) {
                continue;
            }
            $column = $this->columnMap[$field] ?? $field;

            foreach ($operators as $operator) {
                if (isset($query[$operator])) {
                    $queryItems[] = [$column, $this->operatorMap[$operator], $query[$operator]];
                }
            }
        }

        return $queryItems;
    }
}
