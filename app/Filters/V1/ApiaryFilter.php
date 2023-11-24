<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class ApiaryFilter extends ApiFilter
{
    protected $allowedParms = [
        'id' => ['eq'],
        'name' => ['eq'],
        'users_id' => ['eq'],
        'address' => ['eq'],
    ];
    protected $columnMap = [
        'id' => 'id',
        'name' => 'name',
        'users_id' => 'users_id',
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
