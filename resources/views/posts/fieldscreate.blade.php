
  
<!-- Submit Field -->
    <div class="form-group col-sm-12">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title"  name="title" required>
                  </div>

    <div class="form-group col-sm-12">
               <label for="body">Body</label>
               <input type="text" class="form-control" id="body" name="body"  required>       
    </div>
    <div class="form-group col-sm-12">      
        <input type="hidden" name="user_id" value={!! Auth::user()->id !!}>
    </div>

<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('posts.index') !!}" class="btn btn-default">Cancel</a>
</div>


