{{ csrf_field() }}

<div class="form-group">
    {!! Form::label("title", "Title:", ["class" => "col-lg-2 control-label"]) !!}
    <div class="col-lg-10">
        {!! Form::text("title", old("title"), ["class" => "form-control", "required"]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label("description", "Description:", ["class" => "col-lg-2 control-label"]) !!}
    <div class="col-lg-10">
        {!! Form::text("description", old("description"), ["class" => "form-control", "required"]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label("isbn", "Isbn:", ["class" => "col-lg-2 control-label"]) !!}
    <div class="col-lg-10">
        {!! Form::text("isbn", old("isbn"), ["class" => "form-control", "required"]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label("author_list", "Authors:", ["class" => "col-lg-2 control-label"]) !!}
    <div class="col-lg-10">
        {!! Form::select("author_list[]", $authorOptions, null, ["id" => "author_list", "class" => "form-control", "multiple"]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label("category_list", "Categories:", ["class" => "col-lg-2 control-label"]) !!}
    <div class="col-lg-10">
        {!! Form::select("category_list[]", $categoryOptions, null, ["id" => "category_list", "class" => "form-control", "multiple"]) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
        {!! link_to(URL::to("/admin/books"), 'Cancel', ['class' => 'btn btn-danger']) !!}
    </div>
</div>

@section('scripts.footer')
    <script>
        $('#category_list').select2({
            placeholder: 'Choose book categories'
        });

        $('#author_list').select2({
            placeholder: 'Choose book authors'
        });
    </script>
@stop