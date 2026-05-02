<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Models\Story;

class StoryController extends Controller
{
    public function index()
    {

        return view('stories.index');
    }

    public function create()
    {
        return view('stories.create');
    }

    public function store(Request $request)
    {
        $title = $request->get('title');
        $author = $request->get('author');
        $intro = $request->get('intro');
        $develop = $request->get('develop');
        $conversion = $request->get('conversion');
        $ending = $request->get('ending');

        $story = Story::create([
            'title' => $title,
            'author' => $author,
            'intro' => $intro,
            'develop' => $develop,
            'conversion' => $conversion,
            'ending' => $ending,
        ]);
        return redirect()->route('stories.show', ['id' => $story->id]);
    }
    public function show($id)
    {
    // DBからidが一致するデータを1件取得
       $story = Story::find($id);
    // ビューに$storyを渡して表示
       return view('stories.show', ['story' => $story]);
         //                           ↑キー名    ↑データ
    // Blade側では $story として使える
    }
}
