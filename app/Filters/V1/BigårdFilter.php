<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class BigårdFilter extends ApiFilter
{
    protected $allowedParms = [
        'id' => ['eq'],
        'navn' => ['eq'],
        'user_id' => ['eq'],
        'adress' => ['eq'],
    ];
    protected $columnMap = [
        'id' => 'id',
        'navn' => 'navn',
        'user_id' => 'user_id',
        'adress' => 'adress',
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
