<?php

namespace App\Http\Controllers;

use App\Chuck;
use App\Http\Traits\CacheTrait;
use DB;
use Illuminate\Routing\Controller as BaseController;

class FrontController extends BaseController
{
    use CacheTrait;

    /**
     * @return string
     * @throws \Throwable
     */
    public function index()
    {
        $min = $this->getMinValue();
        $max = $this->getMaxValue();

        do {
            $randomId = random_int($min, $max);
            $phrase = Chuck::find($randomId);
        } while(!is_object($phrase));

        return view('phrase')->with(['phrase' => $phrase])->render();
    }

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
