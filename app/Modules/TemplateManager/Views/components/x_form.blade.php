<div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#general" aria-controls="general" role="tab" data-toggle="tab">General configurations</a>
            </li>
            <li role="presentation">
                <a href="#layouts" aria-controls="layouts" role="tab" data-toggle="tab">Layout settings</a>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="general">
                @include('TemplateManager::components.cfg_general')
            </div>
            <div role="tabpanel" class="tab-pane" id="layouts">
                @include('TemplateManager::components.cfg_layout')
            </div>
        </div>
</div>