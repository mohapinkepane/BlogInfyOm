                   
          <hr>
           <div class="comments">
                <ul class ="list-group">
             @foreach($post->comments as $comment)
                  
                   {!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'delete']) !!}
                    {{csrf_field()}}

                    <li class="list-group-item">
                        <strong>
                             {{$comment->created_at->diffForHumans()}}: &nbsp;
                                </strong>
                              {{$comment->body}}
                        </li>
                   
                    <div class='btn-group'>
                    <a href="{!! route('comments.show', [$comment->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('comments.edit', [$comment->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                 </div>
                {!! Form::close() !!}
                    &nbsp;
                     
                     @endforeach
               </ul >
                                    
             </div> 
           <hr>       
                     
             <div class="card">
                 <div class="card-block">
                           
                  {!! Form::open(['route' => ['comments.store', $post->id], 'method' => 'post']) !!}
                                {{csrf_field()}}
                                <div class="form-group">
                                    <textarea name="body" placeholder="your comment here." class="form-control" required></textarea>
                                </div>
                                <div class="form-group">      
                                       <input type="hidden" name="post_id" value="{{$post->id}}">
                                </div>
                                <div class="form-group">
                                        <button type="submit" class="btn btn-primary"> Add Commment</button>
                                </div>
                          
                    {!! Form::close() !!}
                            </div>
                        </div>
                 {{--  {{end of add coment comment}}  --}}
                        </div>
     {{--  comments  --}}