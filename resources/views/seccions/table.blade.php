<table class="table table-responsive" id="seccions-table">
    <thead>
        <tr>
            <th>Id Story</th>
        <th>Name</th>
        <th>Description</th>
        <th>Url</th>
        <th>Audio Url</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($seccions as $seccion)
        <tr>
            <td>{!! $seccion->id_story !!}</td>
            <td>{!! $seccion->name !!}</td>
            <td>{!! $seccion->description !!}</td>
            <td>{!! $seccion->url !!}</td>
            <td>{!! $seccion->audio_url !!}</td>
            <td>
                {!! Form::open(['route' => ['seccions.destroy', $seccion->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('seccions.show', [$seccion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('seccions.edit', [$seccion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>