<?php

namespace App\Http\Controllers\Api;

use App\Chuck;
use App\Http\Controllers\Controller;
use App\Http\Traits\CacheTrait;
use App\Http\Traits\RandomTrait;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Validator;

class ChuckController extends Controller
{
    use CacheTrait, RandomTrait;

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$id) {
            throw new HttpException(400, "Invalid id");
        }

        $validator = Validator::make($request->all(), [
            'user'     => 'required|exists:users,email',
            'password' => 'required',
            'phrase'   => 'required|max:75',
            'title'    => 'required|max:255',
        ]);

        if ($validator->fails()) {
            throw new HttpException(400, "Invalid data");
        };

        \Auth::attempt($request->all());

        $chuck = Chuck::findOrFail($id);
        $chuck->update($request->all());

        // TODO: Mensaje para el usuario

        return redirect()->route('chuck.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function get()
    {
        $min = $this->getMinValue();
        $max = $this->getMaxValue();

        do {
            $randomId = random_int($min, $max);
            $phrase = Chuck::find($randomId);
        } while (!is_object($phrase));

        $phrase->shown += 1;
        $phrase->save();

        return $phrase->phrase;
    }
}
