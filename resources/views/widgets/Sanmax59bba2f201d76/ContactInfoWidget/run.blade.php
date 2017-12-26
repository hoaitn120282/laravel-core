<?php $locale = Trans::locale() ?>
<div class="col-md-3 col-sm-6">
	<div class="detail text-center">
		<span><i class="{{ $options['icon_class'] }}"></i></span>
		<p class="type">{{ $options["title_{$locale}"] }}</p>
		<p class="type-dt mtop-5">{{ $options["description_{$locale}"] }}</p>
	</div>
</div>