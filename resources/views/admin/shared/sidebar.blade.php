<div class="sidebar sidebar-dark bg-dark">
    <ul class="list-unstyled">
        <li class="{{ Request::is('admin') ? 'active' : '' }}"><a href="/admin"><i class="fa fa-fw fa-tachometer-alt"></i> Escritorio</a></li>
        <li class="{{ Request::is('admin/clients*') ? 'active' : '' }}"><a href="{{route('clients.index')}}"><i class="fa fa-fw fa-address-book"></i> Clientes</a></li>
        <li class="{{ Request::is('admin/invoices*') ? 'active' : '' }}"><a href="{{route('invoices.index')}}"><i class="fa fa-fw fa-file"></i> Facturas</a></li>
        <li class="{{ Request::is('admin/vehicles*', 'admin/models*', 'admin/brands*') ? 'active' : '' }}">
            <a href="#sm_vehicle" data-toggle="collapse">
                <i class="fa fa-fw fa-car"></i> Vehículos
            </a>
            <ul id="sm_vehicle" class="list-unstyled collapse {{Request::is('admin/vehicles*', 'admin/models*', 'admin/brands*') ? 'show' : '' }}">
                <li><a href="{{route('vehicles.index')}}">Todos los vehículos</a></li>
                <li><a href="{{route('brands.index')}}">Marcas</a></li>
                <li><a href="{{route('models.index')}}">Modelos</a></li>
            </ul>
        </li>
        <li class="{{ Request::is('admin/items*') ? 'active' : '' }}"><a href="{{route('items.index')}}"><i class="fa fa-fw fa-shopping-cart"></i> Artículos</a></li>
        @can('access.users')
            <li class="{{ Request::is('admin/users*', 'admin/roles*', 'admin/permissions*') ? 'active' : '' }}">
                <a href="#sm_user" data-toggle="collapse">
                    <i class="fa fa-fw fa-user"></i> Usuarios
                </a>
                <ul id="sm_user" class="list-unstyled collapse {{Request::is('admin/users*', 'admin/roles*', 'admin/permissions*') ? 'show' : '' }}">
                    <li><a href="{{route('users.index')}}">Todos los usuarios</a></li>
                    <li><a href="{{route('roles.index')}}">Roles</a></li>
                    <li><a href="{{route('permissions.index')}}">Permisos</a></li>
                </ul>
            </li>
        @endcan
        @can('access.settings')
            <li class="{{ Request::is('admin/settings*') ? 'active' : '' }}"><a href="{{route('settings.index')}}"><i class="fa fa-fw fa-cog"></i> Ajustes</a></li>
        @endcan
    </ul>
</div>