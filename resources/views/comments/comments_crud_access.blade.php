                   
          <hr>
           <div class="comments">
                <ul class ="list-group">
             @foreach($post->comments as $comment)
                  
                   {!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'delete']) !!}
                    {{csrf_field()}}
                    <text> {{$comment->user_name}} commented:</text> 
                    <li class="list-group-item">
                        <strong>
                             {{$comment->created_at->diffForHumans()}}: &nbsp;
                                </strong>
                              {{$comment->body}}
                        </li>
                   
                    <div class='btn-group'>
                    <a href="{!! route('comments.show', [$comment->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                   
                    @if(( Auth::user()->id)==$comment->user_id)
                    <a href="{!! route('comments.edit', [$comment->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    @else
                     <a class='btn btn-default btn-xs' disabled ><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash" ></i>', ['type' => 'submit','class' => 'btn btn-danger btn-xs','disabled'=>'disabled','onclick' => "return confirm('Are you sure?')"]) !!}
                    @endif

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
                                       <input type="hidden" name="user_id" value={!! Auth::user()->id !!}>
                                </div>
                                 <div class="form-group col-sm-12">      
                                     <input type="hidden" name="user_name" value={!! Auth::user()->name !!}>
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