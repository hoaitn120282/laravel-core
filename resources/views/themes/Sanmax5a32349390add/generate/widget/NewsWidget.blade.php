namespace {!!"App\\Widgets\\{$theme}"!!};

use App\Widgets\BaseWidget;
use App\Modules\ContentManager\Models\Terms;
use App\Modules\ContentManager\Models\Articles;

class {!!"{$widget}"!!} extends BaseWidget
{
    public function __construct()
    {
        $this->name = "News Widget";
        $this->description = 'This widget for show news';
        $this->options = [
            'title' => '',
            'type' => 'featured-post',
            'term_id' => '',
            'show' => '3'
        ];
    }

    public function form()
    {
        $categories = Terms::where('taxonomy', 'category')->get();

        return \View::make('widgets.{!! $theme !!}.{!! $widget !!}.form', ['options' => $this->options, 'categories' => $categories])->render();
    }

    public function run()
    {
        $idCat = $this->options['type'];
        switch ($idCat) {
            case 'featured-post':
                $model = Articles::whereHas('meta', function ($q) {
                    $q->where("meta_key", "featured_post")->where("meta_value", "on");
                })->where('post_status', 'publish')
                    ->take($this->options['show'])
                    ->skip(0)
                    ->get();
                break;

            case 'recent-post':
                $model = Articles::where('post_type', 'post')
                    ->where('post_status', 'publish')
                    ->orderby('id', 'desc')
                    ->take($this->options['show'])
                    ->skip(0)
                    ->get();
                break;

            case 'category':
                $term = Terms::where("term_id", $this->options['term_id'])->where('taxonomy', 'category')->firstOrFail();
                $model = $term->posts()
                    ->where('post_status', 'publish')
                    ->orderby('id', 'desc')
                    ->get();
                break;

            default:
                $cat = Terms::find($idCat);
                if ($cat)
                    $model = $cat->posts->take($this->options['show'])->skip(0);
                $model = null;
                break;
        }

        return \View::make('widgets.{!! $theme !!}.{!! $widget !!}.run', ['model' => $model, 'options' => $this->options])->render();
    }
}