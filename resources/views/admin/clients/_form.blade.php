<div class="form-group">
    {!! Form::label('Name','Nome') !!}
    {!! Form::text('user[name]', null, ['placeholder'=>'Categoria','Class'=>'form-control','require']) !!}

</div>
<div class="form-group">
    {!! Form::label('Mail','Email') !!}
    {!! Form::text('user[email]', null, ['placeholder'=>'Email','Class'=>'form-control','require']) !!}
</div>
<div class="form-group">
    {!! Form::label('Phone','Fone') !!}
    {!! Form::text('phone', null, ['placeholder'=>'Fone','Class'=>'form-control','require']) !!}
</div>
<div class="form-group">
    {!! Form::label('Cnpj','CNPJ') !!}
    {!! Form::text('cnpj', null, ['placeholder'=>'CNPJ','Class'=>'form-control','require']) !!}
</div>
<div class="form-group">
    {!! Form::label('Cpf','CPF') !!}
    {!! Form::text('cpf', null, ['placeholder'=>'CPF','Class'=>'form-control','require']) !!}
</div>
<div class="form-group">
    {!! Form::label('CEP','Cep') !!}
    {!! Form::text('cep', null, ['placeholder'=>'Cep','Class'=>'form-control','require']) !!}
</div>
<div class="form-group">
    {!! Form::label('Uf','UF') !!}
    {!! Form::text('uf', null, ['placeholder'=>'UF','Class'=>'form-control','require']) !!}
</div>
<div class="form-group">
    {!! Form::label('City','Cidade') !!}
    {!! Form::text('cidade', null, ['placeholder'=>'Cidade','Class'=>'form-control','require']) !!}
</div>

<div class="form-group">
    {!! Form::label('Endereco','Endereço') !!}
    {!! Form::textarea('endereco', null, ['placeholder'=>'Endereço','Class'=>'form-control','require']) !!}
</div>

