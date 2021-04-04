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
        '<strong><em>news 1</em></strong>',
        '<strong><em>news 2</em></strong>',
        '<strong><em>news 3</em></strong>',
        '<strong><em>news 4</em></strong>',
        '<strong><em>news 5</em></strong>',
        '<strong><em>news 6</em></strong>',
        '<strong><em>news 7</em></strong>',
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
