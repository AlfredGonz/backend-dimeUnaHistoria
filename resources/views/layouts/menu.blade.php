<li class="{{ Request::is('categorias*') ? 'active' : '' }}">
    <a href="{!! route('categorias.index') !!}"><i class="fa fa-edit"></i><span>Categorias</span></a>
</li>

<li class="{{ Request::is('seccions*') ? 'active' : '' }}">
    <a href="{!! route('seccions.index') !!}"><i class="fa fa-edit"></i><span>Seccions</span></a>
</li>

<li class="{{ Request::is('historias*') ? 'active' : '' }}">
    <a href="{!! route('historias.index') !!}"><i class="fa fa-edit"></i><span>Historias</span></a>
</li>

<li class="{{ Request::is('usuarios*') ? 'active' : '' }}">
    <a href="{!! route('usuarios.index') !!}"><i class="fa fa-edit"></i><span>Usuarios</span></a>
</li>

