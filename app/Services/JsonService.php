<?php

namespace App\Services;

use App\Repositories\JsonRepository;
use SurazDott\Services\BaseService;

class JsonService extends BaseService
{
    /**
     * Create new service instance.
     */
    public function __construct(
        protected JsonRepository $repository
    ) {
    }
}
