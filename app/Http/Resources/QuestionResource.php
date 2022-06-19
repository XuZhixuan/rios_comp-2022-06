<?php

namespace App\Http\Resources;

use Illuminate\Support\Facades\Auth;

class QuestionResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'question' => $this->question,
            'answer' => $this->answer,
            $this->mergeWhen(!Auth::user(), [
                'weight' => $this->weight
            ]),
            'date' => $this->is_collection ? $this->created_at->toDateString() : $this->created_at->toDateTimeString(),
        ];
    }
}
