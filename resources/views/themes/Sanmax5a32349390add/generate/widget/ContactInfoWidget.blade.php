namespace {!!"App\\Widgets\\{$theme}"!!};

use App\Widgets\BaseWidget;
use Trans;

class {!!"{$widget}"!!} extends BaseWidget
{
	public function __construct() {
    	$locale = Trans::locale();
        $this->name = "Contact Information Widget";
        $this->description = 'This widget for show contact information';
        $this->options = ['icon_class' => 'fa'];
        foreach (Trans::languages() as $language) {
            $this->options["title_{$language->country->locale}"] = "";
            $this->options["description_{$language->country->locale}"] = "";
        }
        $this->options = array_merge(["title_{$locale}" => '', "description_{$locale}" => ''], $this->options);
    }

    public function form(){
        return \View::make('widgets.{!! $theme !!}.{!! $widget !!}.form',['options'=>$this->options])->render();
    }

    public function run(){
        return \View::make('widgets.{!! $theme !!}.{!! $widget !!}.run',['options'=>$this->options])->render();
    }

}