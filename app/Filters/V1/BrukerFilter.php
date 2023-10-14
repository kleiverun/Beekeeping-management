<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class BrukerFilter extends ApiFilter
{
    protected $allowedParms = [
        'fornavn' => ['eq'],
        'etternavn' => ['eq'],
        'telefonNr' => ['eq'],
        'epost' => ['eq'],
        'adresse' => ['eq'],
        'passord' => ['eq'],
    ];
    protected $columnMap = [
        'fornavn' => 'fornavn',
        'etternavn' => 'etternavn',
        'telefonNr' => 'telefonnr',
        'epost' => 'epost',
        'adresse' => 'adresse',
        'passord' => 'passord',
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
