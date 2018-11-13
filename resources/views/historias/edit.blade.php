@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Historia
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($historia, ['route' => ['historias.update', $historia->id], 'method' => 'patch']) !!}

                        @include('historias.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection