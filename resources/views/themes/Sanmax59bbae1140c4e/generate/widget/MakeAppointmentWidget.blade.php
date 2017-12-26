

namespace {!!"App\\Widgets\\{$theme}"!!};

use App\Widgets\BaseWidget;

class {!!"{$widget}"!!} extends BaseWidget
{
    public function __construct() {
        $this->name = "Make Appointment Widget";
        $this->description = 'This widget for make appointment';
        $this->options = [
            "avatar" => "",
            "name" => "",
            "description" => "",
            "make_appointment" => ""
            ];
    }

    public function form(){
        return \View::make('widgets.{!! $theme !!}.{!! $widget !!}.form',['options'=>$this->options, 'theme'=>"{!! $theme !!}", 'widget'=>"{!! $widget !!}"])->render();
    }

    public function run(){
        return \View::make('widgets.{!! $theme !!}.{!! $widget !!}.run',['options'=>$this->options])->render();
    }
}