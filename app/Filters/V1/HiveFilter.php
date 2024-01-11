<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class HiveFilter extends ApiFilter
{
    protected $allowedParms = [
        'user_id' => ['eq'],
        'apiary_idApiary' => ['eq'],
        'super' => ['eq', 'gt', 'ge', 'lt', 'le'],
        'hiveDescription' => ['eq', 'like'],
        'hiveStrength' => ['eq', 'gt', 'ge', 'lt', 'le'],
    ];
    protected $columnMap = [
        'user_id' => 'user_id',
        'apiary_idApiary' => 'apiary_idApiary',
        'super' => 'super',
        'hiveDescription' => 'hiveDescription',
        'hiveStrength' => 'hiveStrength',
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
