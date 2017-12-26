<?php

namespace App\Http\Controllers;

use App\Facades\Helper;
use Illuminate\Database\Eloquent\Collection;
use Theme;
use App\Modules\ContentManager\Models\Articles;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $layout = Theme::layout();
        $showOnFront = Helper::option('show_on_front');
        $pageOnFront = Helper::option('page_on_front');
        if (!empty($showOnFront) && ('page' == $showOnFront) && !empty($pageOnFront)) {
            $blog = Articles::where('post_type', 'page')
                ->where('post_name', $pageOnFront)
                ->first();

            $blogs = $blog ? new Collection([$blog]) : null;
        } else {
            $blogs = Articles::where('post_type', 'post')
                ->where('post_status', 'publish')
                ->orderBy('id', 'desc')
                ->paginate(10);
        }

        if (view()->exists(Theme::frontpage())) {
            return view(Theme::frontpage(), compact('blogs', 'layout'));
        }

        return abort(404);
    }
}
