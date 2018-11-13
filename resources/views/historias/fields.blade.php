<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- State Field -->
<div class="form-group col-sm-6">
    {!! Form::label('state', 'State:') !!}
    {!! Form::number('state', null, ['class' => 'form-control']) !!}
</div>

<!-- Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('url', 'Url:') !!}
    {!! Form::text('url', null, ['class' => 'form-control']) !!}
</div>

<!-- Url Banner Field -->
<div class="form-group col-sm-6">
    {!! Form::label('url_banner', 'Url Banner:') !!}
    {!! Form::text('url_banner', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_category', 'Id Category:') !!}
    {!! Form::number('id_category', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('historias.index') !!}" class="btn btn-default">Cancel</a>
</div>
