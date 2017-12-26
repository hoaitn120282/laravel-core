<li id="term-{{ $node->term_id }}">
	<div class="checkbox">
		<label>
			<?php
			$value = [];
			foreach ($languages as $language) {
				$value[$language->country->locale] = $node->getTranslation($language->country->locale)->name;
			}
			?>
			<input class="catmenu" data-url="{{ $node->slug }}" value="{{ json_encode($value) }}" data-type="category" type="checkbox"> {{ $node->name }}
		</label>
	</div>
</li>
@if(count($datas->get()) > 0 )
	@foreach($datas->get() as $node)
	<li id="child-{{ $node->term_id }}" class="category-child-list">
	    <ul id="parent-{{ $node->parent  }}" class="list-unstyled">
			@include('ContentManager::menu.partials.categorymenu', ['datas' => $node->children(),'post'=>false])
	    </ul>
	</li>
	@endforeach
@endif
