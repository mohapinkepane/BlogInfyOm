@extends('layouts.app')

@section('content')

{{--  <h2>File uploading</h2>

<form action="/savepictureurl " method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<p>

<input type="file" name="upload">

</p>

<input type="submit" value="upload file">

</form>  --}}

 <section class="content-header">
        <h1>
           Profile:{{(Auth::user()->name)}}
        </h1>
    </section>
  <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'profiles.savepicture','enctype'=>"multipart/form-data"]) !!}
                    <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                          <label for="avatar">Upload Avatar</label>
                          <input type="file" name="avatar" class="btn btn-primary"  accept="image/*">
                         </div>

                    <div class="form-group col-sm-12">
                        {!! Form::submit('Add Picture',['class' => 'btn btn-primary']) !!}
                        <a href="{!! route('posts.index') !!}" class="btn btn-default">Cancel</a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection

