<li id="{{ "menuItem_{$node->id}" }}" class="{{ "menuItem_{$node->id}" }}">
    <div class="panel panel-primary"
         <?php
         $value = [];
         foreach ($languages as $lang) {
             $value[$lang->country->locale] = $node->getTranslation($lang->country->locale)->post_title;
         }
         ?>
         data-label="{{ json_encode($value) }}"
         data-url="{{ $node->getMetaValue('_nav_item_url') }}">
        <div class="panel-heading">
            {{ $node->getTranslation($language->country->locale)->post_title }}
            <a data-target="{{ "body-{$node->id}" }}"
               data-role='toggle-menu' href="#"><i class="fa fa-chevron-down"></i></a>
            <a class="deleteMenu" data-id="{{ $node->id }}" href="#"><i class="fa fa-times"></i></a>
        </div>
        <div id="{{ "body-{$language->country->locale}-{$node->id}" }}" class="panel-body {{ "body-{$node->id}" }}"
             style="display: none;">
            <div class="form-group">
                <label for="{{ "label-{$language->country->locale}-{$node->id}" }}">Label</label>
                <input data-uset='label'
                       data-locale="{{ $language->country->locale }}"
                       data-idpar="{{ "menuItem_$node->id" }}"
                       value="{{ $node->getTranslation($language->country->locale)->post_title }}"
                       class="form-control" id="{{ "label-{$language->country->locale}-{$node->id}" }}"
                       type="text" placeholder="Label">
            </div>
        </div>
    </div>
    @if(count($datas) > 0 )
        <ol>
            @foreach($datas as $node)
                @include('ContentManager::menu.partials.listmenu', ['datas' => $node->children()])
            @endforeach
        </ol>
    @endif
</li>