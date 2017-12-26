<div class="form-group">
    <label for="title" class="control-label">Title</label>
    <input id="title" value="{{ $options['title'] }}" class="form-control" type="text" name="title">
</div>
<div class="form-group">
    <label for="type" class="control-label">Type</label>
    <select id="type" name="type" class="form-control">
        <option {{ $options['type'] == 'featured-post' ? 'selected' : '' }} value="featured-post">Featured Post</option>
        <option {{ $options['type'] == 'recent-post' ? 'selected' : '' }} value="recent-post">Recent Post</option>
        <option {{ $options['type'] == 'category' ? 'selected' : '' }} value="category">Category</option>
    </select>
    <div id="categories" class="categories" style="{{ $options['type'] == 'category' ? 'display:block;' : 'display:none;' }}">
        <label for="category" class="control-label">Select Category</label>
        <select name="term_id" class="form-control">
            @foreach ($categories as $value)
                <option {{ $options['type'] == $value->term_id ? 'selected' : '' }} value="{{ $value->term_id }}">{{ $value->name }}</option>
            @endforeach
        </select>
    </div>
</div>
@push('scripts')
<script>
    $(document).ready(function () {
        $('select[name="type"]').on('change',function () {
            var $this = $(this);
            var $parent = $this.closest('.form-group');

            if ($this.val() == 'category') {
                $('.categories', $parent).css('display', 'block');
            } else {
                $('.categories', $parent).css('display', 'none');
            }
        });
    });
</script>
@endpush
