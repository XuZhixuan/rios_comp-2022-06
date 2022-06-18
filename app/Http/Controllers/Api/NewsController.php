<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\NewsRequest;
use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request, News $news)
    {
        $collection = $news->query()->orderByDesc('id')->paginate($request->perPage ?? 15);

        return NewsResource::collection($collection);
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        return new NewsResource($news);
    }

    public function store(NewsRequest $request)
    {
        $news = News::create($request->all(['title', 'content', 'cover']));
        return response([
            'id' => $news->id
        ], 201);
    }

    public function update($id, NewsRequest $request)
    {
        $news = News::findOrFail($id);
        $news->update($request->all(['title', 'content', 'cover']));
    }

    public function delete($id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        return response(null, 204);
    }
}
