<?php

namespace App\Modules\ContentManager\Models;

use Carbon\Carbon;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use Translatable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts';
    protected $fillable = ['post_hit'];
    public $translatedAttributes = ['post_title', 'post_excerpt', 'post_content'];
    protected $translationForeignKey = 'post_id';
    protected $appends = ['featured_img', 'excerpt', 'date'];


    public function user()
    {
        return $this->belongsTo('App\User', 'post_author');
    }

    public function comments()
    {
        return $this->hasMany('App\Modules\ContentManager\Models\Comments', 'post_id')->where("approved", 1);
    }

    public function meta()
    {
        return $this->hasMany('App\Modules\ContentManager\Models\ArticleMeta', 'post_id');
    }

    private function termRelationships()
    {
        return $this->belongsToMany('App\Modules\ContentManager\Models\Terms', 'term_relationships', 'object_id', 'term_taxonomy_id');
    }

    public function categories()
    {
        return $this->termRelationships()->where("taxonomy", "category");
    }

    public function tags()
    {
        return $this->termRelationships()->where("taxonomy", "tag");
    }

    public function getMetaValue($key)
    {
        $model = $this->meta()->where('meta_key', $key)->first();
        if (count($model) > 0) {
            return $model->meta_value;
        }
        return null;
    }

    /**
     * Get the featured img for the post.
     *
     * @return string
     */
    public function getFeaturedImgAttribute()
    {
        $featured_img = null;
        $model = $this->meta()->where('meta_key', 'featured_img')->first();
        if (count($model) > 0) {
            $featured_img = $model->meta_value;
        }

        return $this->attributes['featured_img'] = $featured_img;
    }

    /**
     * Get the excerpt for the post.
     *
     * @return string
     */
    public function getExcerptAttribute()
    {
        $excerpt = '';
        if (!empty($value)) {
            $excerpt = strip_tags($value);
        }

        $content = strip_tags($this->post_content);
        $excerpt = explode(' ', $content, 40);
        if (count($excerpt) >= 40) {
            array_pop($excerpt);
            $excerpt = implode(" ", $excerpt) . '...';
        } else {
            $excerpt = implode(" ", $excerpt);
        }
        $excerpt = preg_replace('`[[^]]*]`', '', $excerpt);

        return $this->attributes['exverpt'] = $excerpt;
    }

    /**
     * Get the created date
     */
    public function getDateAttribute()
    {
        $date = [
            'weekday' => $this->created_at->format('l'),
            'date' => $this->created_at->format('M d Y'),
            'day' => $this->created_at->format('d'),
            'month' => $this->created_at->format('M'),
            'part_of_day' => $this->created_at->format('h:i A'),
        ];
        return $this->attributes['date'] = $date;
    }

    public function getExcerpt($limit = 40)
    {
        if (!empty($this->post_excerpt)) {
            return strip_tags($this->post_excerpt);
        }

        $content = strip_tags($this->post_content);

        $excerpt = explode(' ', $content, $limit);
        if (count($excerpt) >= $limit) {
            array_pop($excerpt);
            $excerpt = implode(" ", $excerpt) . '...';
        } else {
            $excerpt = implode(" ", $excerpt);
        }
        $excerpt = preg_replace('`[[^]]*]`', '', $excerpt);
        return $excerpt;
    }

    public function getContent()
    {
        return $this->post_content;
    }

    public function getUrl($post = "post")
    {
        if ($post == "post") {
            return url('/') . "/" . $this->post_name;
        } else {
            return url('/') . "/" . $post . "/" . $this->post_name;
        }
    }

    public function cleanContent($content)
    {
        $style = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $content);
        $face = preg_replace('/(<[^>]+) face=".*?"/i', '$1', $style);
        $color = preg_replace('/(<[^>]+) color=".*?"/i', '$1', $face);
        return $color;
    }

}
