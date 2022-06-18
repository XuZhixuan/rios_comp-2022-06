<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\NoticeRequest;
use App\Http\Resources\NoticeResource;
use App\Models\Notice;
use Illuminate\Http\Request;

class NoticesController extends Controller
{
    public function index(Request $request, Notice $notice)
    {
        $notices = $notice
            ->newQuery()
            ->orderByDesc('id')
            ->paginate($request->perPage ?? 15);
        return NoticeResource::collection($notices);
    }

    public function show($id)
    {
        $notice = Notice::findOrFail($id);
        return new NoticeResource($notice);
    }

    public function store(NoticeRequest $request)
    {
        $notice = Notice::create($request->all(['title', 'content', 'type']));

        return response(['id' => $notice->id], 201);
    }

    public function update($id, NoticeRequest $request)
    {
        $notice = Notice::findOrFail($id);
        $notice->update($request->all());

        return response(null, 204);
    }

    public function delete($id)
    {
        $notice = Notice::findOrFail($id);
        $notice->delete();

        return response(null, 204);
    }
}
