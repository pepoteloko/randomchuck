<?php

namespace App\Http\Traits;

use App;
use App\Models\Chuck;
use DB;

/**
 * Trait CacheTrait
 */
trait RandomTrait
{
    /**
     * @return mixed|null
     */
    private function getMinValue()
    {
        return $this->getMinMaxValues('min');
    }

    /**
     * @return mixed|null
     */
    private function getMaxValue()
    {
        return $this->getMinMaxValues('max');
    }

    /**
     * @param $type
     *
     * @return mixed|null
     */
    private function getMinMaxValues($type)
    {
        $cacheName = $this->determineCacheName(func_get_args(), 'getMinMaxValues');
        $value = $this->getCacheContent($cacheName);
        if (!is_null($value)) {
            return $value;
        }

        $info = Chuck::select(DB::raw("min(id) AS minValue, max(id) AS topValue"))->first();

        if ($type == 'min') {
            $value = $info->minValue;
        } else {
            $value = $info->topValue;
        }

        $this->storeValueInCache('getMinMaxValue', $value);

        return $value;
    }
}