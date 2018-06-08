<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\CacheTrait;
use App\Http\Traits\RandomTrait;
use App\Models\Chuck;
use Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Validator;

class ChuckController extends Controller
{
    use CacheTrait, RandomTrait;

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|exists:users',
            'password' => 'required',
            'phrase'   => 'required|max:75',
            'title'    => 'required|max:255',
        ]);

        if ($validator->fails()) {
            throw new HttpException(400, "Invalid data");
        };

        $user['email'] = $request->get('email');
        $user['password'] = $request->get('password');
        $logeado = Auth::attempt($user);

        if ($logeado) {
            $chuck = new Chuck();
            $chuck->phrase = $request->get('phrase');
            $chuck->title = $request->get('title');
            $chuck->save();

            return json_encode(['result' => 'success', 'message' => 'Frase creada']);
        } else {
            return json_encode(['result' => 'false', 'message' => 'No tienes el permiso de Chuck']);
        }

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

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        return Chuck::all();
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function show($id)
    {
        return Chuck::findOrFail($id);
    }

    /**
     * @param Request $request
     * @param $id
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function update(Request $request, $id)
    {
        $chuck = Chuck::findOrFail($id);
        $chuck->update($request->all());

        return $chuck;
    }

    /**
     * @param $id
     *
     * @return string
     * @throws \Exception
     */
    public function destroy($id)
    {
        $chuck = Chuck::findOrFail($id);
        $chuck->delete();

        return '';
    }
}
