<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use App\Models\Story;
use App\Models\Genre;
use App\Models\Template;

class StoryController extends Controller
{
    // ジャンル一覧を取得してフォームに渡す
    public function create()
    {
        $genres = Genre::all();
        return view('stories.create', ['genres' => $genres]);
    }

    // ユーザーの入力を保存してテンプレートに当てはめる
    public function store(Request $request)
    {
        // ① ユーザーの入力を保存
        $story = Story::create([
            'hero'     => $request->get('hero'),
            'friend'  => $request->get('friend'),
            'enemy'    => $request->get('enemy'),
            'key_item' => $request->get('key_item'),
            'genre_id' => $request->get('genre_id'),
        ]);

        // ② 選択されたジャンルのテンプレートをランダム取得
        $template = Template::where('genre_id', $request->get('genre_id'))
                            ->inRandomOrder()
                            ->first();

        // ③ テンプレートに入力値を当てはめる
        $result = [
            'intro'      => str_replace(
                ['{主人公}', '{なかま}', '{てき}', '{きーあいてむ}'],
                [$story->hero, $story->friend, $story->enemy, $story->key_item],
                $template->intro_template
            ),
            'develop'    => str_replace(
                ['{主人公}', '{なかま}', '{てき}', '{きーあいてむ}'],
                [$story->hero, $story->friend, $story->enemy, $story->key_item],
                $template->develop_template
            ),
            'conversion' => str_replace(
                ['{主人公}', '{なかま}', '{てき}', '{きーあいてむ}'],
                [$story->hero, $story->friend, $story->enemy, $story->key_item],
                $template->conversion_template
            ),
            'ending'     => str_replace(
                ['{主人公}', '{なかま}', '{てき}', '{きーあいてむ}'],
                [$story->hero, $story->friend, $story->enemy, $story->key_item],
                $template->ending_template
            ),
        ];

        // ④ 結果をビューに渡す
        return view('stories.show', [
            'story'  => $story,
            'result' => $result,
        ]);
    }

    // みんなの物語一覧
    public function index()
    {
        $page = max(1, (int) request()->query('page', 1));
        $cachedStories = Cache::remember("stories.index.page.{$page}", now()->addSeconds(30), function () use ($page) {
            return Story::query()
                ->select(['id', 'hero', 'friend', 'enemy', 'genre_id', 'likes', 'created_at'])
                ->with(['genre:id,name,name_ja'])
                ->latest()
                ->forPage($page, 13)
                ->get()
                ->map(fn (Story $story) => $story->toArray())
                ->all();
        });

        $stories = collect($cachedStories)->map(function (array $story) {
            $storyObject = (object) $story;
            $storyObject->genre = (object) $story['genre'];

            return $storyObject;
        });
        $hasMorePages = $stories->count() > 12;
        $paginatorItems = $stories->take(12);
        $stories = new Paginator($paginatorItems, 12, $page, [
            'path' => request()->url(),
            'pageName' => 'page',
        ]);
        $stories->hasMorePagesWhen($hasMorePages);

        return view('stories.index', ['stories' => $stories]);
    }

    // 1件表示
    public function show($id)
    {
        $story    = Story::find($id);
        $template = Template::where('genre_id', $story->genre_id)
                            ->inRandomOrder()
                            ->first();

        $replaceFrom = ['{主人公}', '{なかま}', '{てき}', '{きーあいてむ}'];
        $replaceTo   = [$story->hero, $story->friend, $story->enemy, $story->key_item];

        $result = [
            'intro'      => str_replace($replaceFrom, $replaceTo, $template->intro_template),
            'develop'    => str_replace($replaceFrom, $replaceTo, $template->develop_template),
            'conversion' => str_replace($replaceFrom, $replaceTo, $template->conversion_template),
            'ending'     => str_replace($replaceFrom, $replaceTo, $template->ending_template),
        ];

        return view('stories.show', [
            'story'  => $story,
            'result' => $result,
        ]);
    }
    public function like($id)
    {
        $story = Story::find($id);
        if ($story) {
        $story->increment('likes');
        }
        return redirect()->route('stories.index');
    }
}