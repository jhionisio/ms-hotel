<?php

namespace App\Http\Controllers;

use App\Models\HOTELModel;
use Illuminate\Http\Request;
use App\Http\Requests\HOTELRequest;
use App\Api\ApiMessages;

class HOTELController extends Controller
{
    public function __construct(HOTELModel $hotelcrud){
        $this->hotelcrud = $hotelcrud;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotelcrud = $this->hotelcrud->paginate('10');

        return response()->json($hotelcrud, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HOTELRequest $request)
    {
        $data = $request->all();

        try{

            $hotelcrud = $this->hotelcrud->create($data);

            return response()->json([
                'data' => [
                    'msg' => 'Hotel cadastrado!'
                ]
            ], 200);
        }catch (Exception $e) {
            $message = new ApiMessages($e->getMessages());
            return response()->json($message->getMessage(), 401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {

            $hotelcrud = $this->hotelcrud->FindOrFail($id);

            return response()->json([
                'data' => $hotelcrud

            ], 200);
        } catch (Exception $e) {
            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HOTELRequest $request, $id)
    {
        $data = $request->all();

        try{

            $hotelcrud = $this->hotelcrud->findOrFail($id);
            $hotelcrud->update($data);

            return response()->json([
                'data' =>[
                    'msg' => 'Hotel atualizado'
                ]
                ], 200);

        } catch (Exception $e) {
            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $hotelcrud = $this->hotelcrud->FindOrFail($id);
            $hotelcrud->delete();

            return response()->json([
                'data' => [
                    'msg' => 'Hotel deletado'
                ]
            ], 200);
        } catch (Exception $e) {
            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }
}
