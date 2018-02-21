
<ul class="sidebar-menu" data-widget="tree">
    <li class="header">@lang('admin.layout.header')</li>
    <!-- Optionally, you can add icons to the links -->
    <li {{ Request()->is('admin')? 'class=active':'' }}>
        <a href="{{ Route('dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>Inicio</span>
        </a>
    </li>
    <li class="treeview {{ Request()->is('admin/posts*')? 'active':'' }}">
        <a href="#"><i class="fa fa-link"></i> <span>Blog</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
        </a>
        <ul class="treeview-menu">
            <li {{ Request()->is('admin/posts')? 'class=active':'' }}>
                <a href="{{ Route('admin.posts.index') }}">
                    <i class="fa fa-eye"></i>
                    Ver todos los posts
                </a>
            </li>
            <li>
                @if(request()->is('admin/posts/*'))
                    <a href="{{ route('admin.posts.index', '#create') }}" >
                        <i class="fa fa-pencil"></i>
                        Crear Posts
                    </a>
                @else
                    <a href="#" data-toggle="modal" data-target="#myModal">
                        <i class="fa fa-pencil"></i>
                        Crear Posts
                    </a>
                @endif
            </li>
        </ul>
    </li>
</ul>
