<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class HiveFilter extends ApiFilter
{
    protected $allowedParms = [
        'users_id' => ['eq'],
        'apiary_idApiary' => ['eq'],
        'antallSkattekasser' => ['eq', 'gt', 'ge', 'lt', 'le'],
        'identifikasjon' => ['eq', 'like'],
        'estimertStyrke' => ['eq', 'gt', 'ge', 'lt', 'le'],
    ];
    protected $columnMap = [
        'users_id' => 'users_id',
        'apiary_idApiary' => 'apiary_idApiary',
        'antallSkattekasser' => 'antallSkattekasser',
        'identifikasjon' => 'identifikasjon',
        'estimertStyrke' => 'estimertStyrke',
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