<?php

namespace App\Http\Resources;

class NoticeResource extends Resource
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
            'title' => $this->title,
            $this->mergeWhen(!$this->is_collection, [
                'content' => $this->content
            ]),
            'type' => $this->type,
            'date' => $this->is_collection ? $this->created_at->toDateString() : $this->created_at->toDateTimeString(),
        ];
    }
}
