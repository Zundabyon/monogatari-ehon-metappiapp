<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Models\Story;

class StoryController extends Controller
{
    public function index()
    {
    // viewのstories.index.blade.php を表示
        return view('stories.index');
    }

    public function create()
    {
    // viewのstories.create.blade.php を表示
        return view('stories.create');
    }

    public function store(Request $request)
    {
    // フォームから送信されたデータを取得
        $title = $request->get('title');
        $author = $request->get('author');
        $intro = $request->get('intro');
        $develop = $request->get('develop');
        $conversion = $request->get('conversion');
        $ending = $request->get('ending');

    // storiesテーブルに取得したデータを保存
        $story = Story::create([
            'title' => $title,
            'author' => $author,
            'intro' => $intro,
            'develop' => $develop,
            'conversion' => $conversion,
            'ending' => $ending,
        ]);
        // 保存したデータのidを取得して、showアクション(views/stories/show/{id})にリダイレクト
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
