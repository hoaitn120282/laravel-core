<script>
    (function ($) {
        $('a#infiniteScroll').on('click', function (e) {
            var $this = $(this);
            $('.loading').css('display', 'block');
            e.preventDefault();
            var url = $(this).data('url');
            $.ajax({
                url: url,
                type: 'get',
                dataType: 'json'
            }).then(function (res) {
                applyData(res);
                $this.data('url', res.next_page_url);
                if (res.current_page >= res.last_page) {
                    $this.css('display', 'none');
                }
                $('.loading').css('display', 'none');
            }, function (error) {
                console.log(error);
                $('.loading').css('display', 'none');
            });

            return false;
        });

        // apply data with res
        function applyData(res) {
            var $container = $('#infinite');
            var data = res.data;
            $.each(data, function (key, val) {
                var html = "";
                html += '<div class="col-sm-12">';
                html += '<article class="new-detail">';
                if (val.featured_img !== '' && val.featured_img !== null) {
                    html += '<figure class="col-md-3 col-sm-5">';
                    html += '<a href="{{ Theme::route('post.show', ['slug' => $node->post_name]) }}">';
                    html += '<img src="' + val.featured_img + '" alt="' + val.post_title + '" title="' + val.post_title + '">';
                    html += '</a>';
                    html += '</figure>';
                }
                html += '<div class="new-content col-md-9 col-sm-7">';
                html += '<h3>' + val.post_title + '</h3>';
                html += '<i>{{ Trans::face('Posted_on') }}' + val.date.weekday + ', ' + val.date.day + ' {{ Trans::face('at') }} ' + val.date.part_of_day + '</i>';
                html += '<p>' + val.excerpt + '</p>';
                html += '</div>';
                html += '<a href="Theme::route(\'post.show\', [\'slug\' => $node->post_name])"';
                html += 'class="btn btn-readmore pull-right">{{ Trans::face('read_more') }}</a>';
                html += '<div class="new-date">';
                html += '<p class="month">' + val.date.day + '</p>';
                html += '<p class="date">' + val.date.month + '</p>';
                html += '</div>';
                html += '</article>';
                html += '</div>';
                $container.append(html);
            });
        }

    })(jQuery);
</script>