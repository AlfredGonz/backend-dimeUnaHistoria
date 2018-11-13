<table class="table table-responsive" id="historias-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>State</th>
        <th>Url</th>
        <th>Url Banner</th>
        <th>Id Category</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($historias as $historia)
        <tr>
            <td>{!! $historia->name !!}</td>
            <td>{!! $historia->state !!}</td>
            <td>{!! $historia->url !!}</td>
            <td>{!! $historia->url_banner !!}</td>
            <td>{!! $historia->id_category !!}</td>
            <td>
                {!! Form::open(['route' => ['historias.destroy', $historia->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('historias.show', [$historia->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('historias.edit', [$historia->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>