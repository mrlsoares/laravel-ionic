<div class="form-group">
    {!! Form::label('Category','Categoria') !!}
    {!! Form::select('category_id',$categories, null, ['Class'=>'form-control','require']) !!}
    {!! Form::label('Name','Nome') !!}
    {!! Form::text('name', null, ['placeholder'=>'Produto','Class'=>'form-control','require']) !!}
    {!! Form::label('Description','Descrição') !!}
    {!! Form::textarea('description', null, ['placeholder'=>'Descrição','Class'=>'form-control','require']) !!}
    {!! Form::label('Price','Preço') !!}
    {!! Form::text('price', null, ['placeholder'=>'Preço','Class'=>'form-control','require']) !!}
</div>
