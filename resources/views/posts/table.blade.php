<table class="table table-responsive" id="posts-table">
    <thead>
        
    <th colspan="3">Action</th>
    </thead>

    <tbody>
    @foreach($posts as $post)
     
      <tr>

            <td>
                {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                
                    <div class="card">
                    <h5><b>{{$post->title}}</b></h5> 
                    <p class="blog-post-meta">{{$post->created_at->toformattedDateString()}}</p> 

                   <div class="form-group col-sm-12">
                    {{$post->body}}
                    </div>
                    </div>
                 
                <div class='btn-group'>
                    <a href="{!! route('posts.show', [$post->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('posts.edit', [$post->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>


