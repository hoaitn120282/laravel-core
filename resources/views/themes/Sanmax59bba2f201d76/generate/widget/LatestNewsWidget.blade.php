namespace {!!"App\\Widgets\\{$theme}"!!};

use App\Widgets\BaseWidget;
use App\Modules\ContentManager\Models\Articles;

class {!!"{$widget}"!!} extends BaseWidget
{
    public function __construct() {
        $this->name = "Latest News Widget";
        $this->description = 'This widget for show latest news';
        $this->options = [
            'title'=>'',
            'show'=>'6',
            'description'=>'',
        ];
    }

    public function form(){
        return \View::make('widgets.{!! $theme !!}.{!! $widget !!}.form',['options'=>$this->options])->render();
    }

    public function run(){
        $model = Articles::where("post_type","post")->take($this->options['show'])->skip(0)->get();
        return \View::make('widgets.{!! $theme !!}.{!! $widget !!}.run',['options'=>$this->options,'model'=>$model])->render();
    }
}