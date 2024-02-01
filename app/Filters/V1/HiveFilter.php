<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class HiveFilter extends ApiFilter
{
    protected $allowedParms = [
        'user_id' => ['eq'],
        'apiary_id' => ['eq'],
        'queen_id' => ['eq'],
        'super' => ['eq', 'gt', 'ge', 'lt', 'le'],
        'hiveDescription' => ['like'],
        'hiveStrength' => ['eq', 'gt', 'ge', 'lt', 'le'],
    ];
    protected $columnMap = [
        'user_id' => 'user_id',
        'apiary_id' => 'apiary_id',
        'queen_id' => 'queen_id',
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
