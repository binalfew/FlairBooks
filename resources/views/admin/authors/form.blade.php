{{ csrf_field() }}

<div class="form-group">
    {!! Form::label("first_name", "First Name:", ["class" => "col-lg-2 control-label"]) !!}
    <div class="col-lg-10">
        {!! Form::text("first_name", old("first_name"), ["class" => "form-control", "required"]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label("last_name", "Last Name:", ["class" => "col-lg-2 control-label"]) !!}
    <div class="col-lg-10">
        {!! Form::text("last_name", old("last_name"), ["class" => "form-control", "required"]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label("telephone", "Telephone:", ["class" => "col-lg-2 control-label"]) !!}
    <div class="col-lg-10">
        {!! Form::text("telephone", old("telephone"), ["class" => "form-control"]) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
        {!! link_to(URL::to("/admin/authors"), 'Cancel', ['class' => 'btn btn-danger']) !!}
    </div>
</div>