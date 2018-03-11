<?php

namespace App\Http\Controllers;

use App\Chuck;
use App\Http\Traits\CacheTrait;
use App\Http\Traits\RandomTrait;
use Illuminate\Routing\Controller as BaseController;

class FrontController extends BaseController
{
    use CacheTrait, RandomTrait;

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

        $phrase->shown += 1;
        $phrase->save();

        return view('phrase')->with(['phrase' => $phrase])->render();
    }
}
