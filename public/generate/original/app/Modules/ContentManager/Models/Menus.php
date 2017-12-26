<?php

namespace App\Modules\ContentManager\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Trans;
use Dimsav\Translatable\Translatable;

class Menus extends Model
{
    use Translatable;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts';
    public $translatedAttributes = ['post_title', 'post_excerpt', 'post_content'];
    protected $translationForeignKey = 'post_id';

    public function user()
    {
        return $this->belongsTo('App\User', 'post_author');
    }

    public function children(){
        $child = Menus::join('post_meta', 'posts.id', '=', 'post_meta.post_id')
                ->select('posts.*', 'post_meta.meta_key', 'post_meta.meta_value')
                ->where('post_meta.meta_key','_nav_item_parent')
                ->where('post_meta.meta_value',$this->id)
                ->orderBy('posts.menu_order', 'asc')
                ->get();
        return $child;    
    }

    public function getMetaValue($key){
        $model = ArticleMeta::where('post_id', $this->id)->where('meta_key', $key)->first();
        if(count($model) > 0){
            return $model->meta_value;
        }

        return null;
    }

    public function getURL(){
        $type = $this->getMetaValue("_nav_item_type");
        $res = "#";
        $locale = Trans::locale();
        switch ($type) {
            case 'home':
                $res =  url("/{$locale}/");
                break;
            case 'category':
                $res = url("/{$locale}/category/{$this->post_name}");
                break;
            case 'custom':
                $res = $this->getMetaValue('_nav_item_url');
                break; 
            case 'page':
                $res = url("/{$locale}/{$this->post_name}.html");
                break;        
            
            default:
                $res = url("/{$locale}/{$this->post_name}");
                break;
        };
        return $res;
    }

}
