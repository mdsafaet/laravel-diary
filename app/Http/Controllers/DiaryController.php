<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiaryUpdateRequest;
use App\Models\Diary;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Requests\DiaryRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class DiaryController extends Controller
{

   use  AuthorizesRequests ;
    public function index()
    {

         $diaries = Diary::with(['category', 'tag'])->latest();


         if (Auth::user()->role !== 'admin') {
             $diaries->where('user_id', Auth::id());
         }
         $diaries = $diaries->get();
     
      
      
        return view('diarys.index', compact('diaries'));
    }

    public function create()
    {
        $this->authorize('create', Diary::class);

        $categories = Category::all();
        $tags = Tag::all();

        return view('diarys.create', compact('categories', 'tags'));
    }

    public function store(DiaryRequest $request)
    {
        $this->authorize('create', Diary::class);

        $data = $request->validated();

         $data['user_id'] = Auth::id();
     
        Diary::create($data);

        return redirect()->route('diarys.index')
            ->with('success', 'Diary created successfully.');
    }

    public function show(Diary $diary)
    {
        $this->authorize('view', $diary);

        $diary->load(['category', 'tag']);
        return view('diarys.show', compact('diary'));
    }

    public function edit(Diary $diary)
    {
        $this->authorize('update', $diary);

        $categories = Category::all();
        $tags = Tag::all();

        return view('diarys.edit', compact('diary', 'categories', 'tags'));
    }

    public function update(DiaryUpdateRequest $request, Diary $diary)
    {
        $this->authorize('update', $diary);

        $diary->update($request->validated());

        return redirect()->route('diarys.index', $diary->id)
            ->with('success', 'Diary updated successfully.');
    }

    public function destroy(Diary $diary)
    {
        $this->authorize('delete', $diary);

        $diary->delete();

        return redirect()->route('diarys.index')
            ->with('success', 'Diary deleted successfully.');
    }
}
