<?php

namespace App\Services;

use App\Models\Row;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Redis;

class ExelFileManager
{
    protected array $exelCollection;
    public function __construct(Collection $collection)
    {
        $this->exelCollection = $collection->toArray();
    }

    public function saveCollection()
    {
        $chunks = array_chunk($this->exelCollection, 1000);

        foreach ($chunks as $key => $chunk) {
            Row::query()
                ->insertOrIgnore($chunk);

            Redis::set($key, count($chunk));
        }
    }
}
