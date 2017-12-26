<?php

namespace App\Modules\ContentManager\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\ContentManager\Models\Options;
use App\Modules\ContentManager\Models\Articles;
use Admin;

class OptionsController extends Controller
{
    public function index()
    {
        $model = Options::all();
        $res = [];
        foreach ($model as $opt) {
            $res[$opt->name] = $opt->value;
        }
        $pages = Articles::where('post_type', 'page')->orderBy('id', 'desc')->get();

        return view("ContentManager::setting", ['model' => $res, 'pages' => $pages]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'opt.site_title' => 'required',
            'opt.email_administrator' => 'required',
        ]);

        foreach ($request->opt as $key => $value) {
            if (Options::where('name', $key)->count() > 0) {
                Options::where('name', $key)->update(['value' => $value]);
            } else {
                Options::create(['name' => $key, 'value' => $value]);
            }

        }

        return redirect(Admin::StrURL('contentManager/setting'))->with('status', 'Setting update success');

    }
}
