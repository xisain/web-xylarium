<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class speciesRes extends JsonResource
{

    public $status;
    public $jumlahData;
    public $message;
    public $resource;
    public $queryDate;

    /**
    *  @param mixed $status 
    *  @param mixed $jumlahData 
    *  @param mixed $message
    *  @param mixed $resource 
    *  @param mixed $queryDate
    *  @return void 
    * 
    */
    public function __construct($status,$jumlahData ,$message, $resource, $queryDate)
    {
        parent::__construct($resource);
        
        $this->status  = $status;
        $this->jumlahData  = $jumlahData;
        $this->message = $message;
        $this->queryDate = $queryDate;
    }

    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'success' => $this->status,
            'Jumlah data' => $this->jumlahData,
            'message' =>  $this->message,
            'data'    => $this->resource,
            'queryDate' => $this->queryDate
        ];
    }
}
