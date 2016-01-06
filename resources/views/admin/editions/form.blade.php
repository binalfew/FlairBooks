{{ csrf_field() }}

<div class="form-group">
    {!! Form::label("publisher", "Publisher:", ["class" => "col-lg-2 control-label"]) !!}
    <div class="col-lg-10">
        {!! Form::text("publisher", old("publisher"), ["class" => "form-control", "required"]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label("published_at", "Published On:", ["class" => "col-lg-2 control-label"]) !!}
    <div class="col-lg-10">
        {!! Form::date("published_at", null, ["class" => "form-control", "required"]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label("version", "Version:", ["class" => "col-lg-2 control-label"]) !!}
    <div class="col-lg-10">
        {!! Form::text("version", old("version"), ["class" => "form-control", "required"]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label("pages", "Pages:", ["class" => "col-lg-2 control-label"]) !!}
    <div class="col-lg-10">
        {!! Form::text("pages", old("pages"), ["class" => "form-control", "required"]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label("price", "Price:", ["class" => "col-lg-2 control-label"]) !!}
    <div class="col-lg-10">
        {!! Form::text("price", old("price"), ["class" => "form-control", "required"]) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
        {!! link_to(URL::to("/admin/books/$bookId/editions"), 'Cancel', ['class' => 'btn btn-danger']) !!}
    </div>
</div>