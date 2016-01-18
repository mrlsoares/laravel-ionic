<div class="form-group">
    {!! Form::label('Status','Status') !!}
    {!! Form::select('status',$lists_status, null, ['Class'=>'form-control','require']) !!}

</div>

<div class="form-group">
    {!! Form::label('Entregador','Entregador') !!}
    {!! Form::select('user_deliveryman_id',$deliveryman, null, ['Class'=>'form-control','require']) !!}

</div>
