{{ csrf_field() }}
<div class="form-group">
    {!! Form::label("code", "Code:", ["class" => "col-lg-2 control-label"]) !!}
    <div class="col-lg-10">
        {!! Form::text("code", old("code"), ["class" => "form-control", "required"]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label("name", "Name:", ["class" => "col-lg-2 control-label"]) !!}
    <div class="col-lg-10">
        {!! Form::text("name", old("name"), ["class" => "form-control", "required"]) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
        {!! link_to(URL::to("/admin/categories/{$parent}"), 'Cancel', ['class' => 'btn btn-danger']) !!}
    </div>
</div>