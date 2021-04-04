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
        'Путин поставил задачу по адаптации мигрантов',
        'Правительство меняет подход к выплате пособий',
        'Шоу года: парад мумий',
        'Тедеско сравнил Соболева с Левандовским',
        'ДТП с пранкером Билом',
        'В России выросли цены на ноутбуки',
        'В этом году обещается жаркое лето',
    ];

    /**
     * @var array|string[]
     */
    protected array $categoryList = [
        'Спортивные новости',
        'Новости о политике',
        'Что происходит в мире',
        'Что происходит в России',
    ];
}
