<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionResource;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function index(Request $request, Question $question)
    {
        $questions = $question
            ->newQuery()
            ->where('show', $request->answered ?? true)
            ->orderByDesc('weight')
            ->paginate($request->perPage ?? 15);
        return QuestionResource::collection($questions);
    }

    public function show($id)
    {
        $question = Question::findOrFail($id);
        return new QuestionResource($question);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'question' => 'required'
        ]);

        $question = Question::create(array_merge($request->all(), ['show' => $request->has('answer')]));

        return response(['id' => $question->id], 201);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'question' => 'required',
            'answer' => 'required',
            'weight' => 'required|integer|min:0|max:99'
        ]);
        $question = Question::findOrFail($id);
        $question->update([
            'question' => $request->question,
            'answer' => $request->answer,
            'weight' => $request->weight,
            'show' => true
        ]);

        return response(null, 204);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function delete($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return response(null, 204);
    }
}
