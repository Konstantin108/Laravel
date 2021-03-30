<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var array|string[]
     */
    protected array $newsList = [
        'news 1',
        'news 2',
        'news 3',
        'news 4',
        'news 5',
        'news 6',
        'news 7',
    ];

    /**
     * @var array|string[]
     */
    protected array $categoryList = [
        'спортивные новости',
        'новости о политике',
        'что происходит в мире',
        'что происходит в России',
    ];
}
