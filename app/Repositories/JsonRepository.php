<?php

namespace App\Repositories;

use App\Models\Json;
use SurazDott\Repositories\BaseRepository;

class JsonRepository extends BaseRepository
{
    /**
     * Create new repository instance.
     */
    public function __construct(
        protected Json $model
    ) {
    }
}
