<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class InvoicesFilter extends ApiFilter
{
    protected $safeParms = [
        'isActive' => ['eq', 'ne'],
        'isAdmin' => ['eq', 'ne'],
    ];

    protected $columnMap = [
        'isAdmin' => 'is_admin',
        'isActive' => 'is_active',
    ];

    protected $operatorMap = [
        'eq' => '=',
        'ne' => '!='
    ];
}
