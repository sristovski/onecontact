<?php
namespace App\Traits;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
trait ApiResponse {

    private function successResponse ($data, $code){
        return response()->json($data, $code);
    }
    protected function errorResponse ($message, $code){
        return response()->json(['error'=> $message, 'code'=> $code]);
    }
    protected function collectionResponse (Collection $collection, $code=200){
        return  $this->successResponse(['data' => $collection], $code);
    }

    protected function itemResponse (Model $model, $code=200){
        return  $this->successResponse(['data' => $model], $code);
    }

    protected function showMessage ($message, $code=200){
        return  $this->successResponse(['data' => $message], $code);
    }
}