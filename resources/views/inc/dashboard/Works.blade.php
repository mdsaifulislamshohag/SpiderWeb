


<div class="">
      <div class="row">

        <div class="container-fluid" >
            @if(session('success'))
                <div class="alert alert-success alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Success!</strong> {{session('success')}}
                </div>
            @endif

            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Error ! </strong>{{ $error }}
                </div>
            @endforeach
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title pull-left" style="padding: 5px;">Portfolios</h3>
              <div class="pull-right">
                <span><a data-toggle="modal" data-target="#Add_Portfolio" title="Edit Profile" class="btn btn-sm btn-warning pull-right">Add New</a></span>
              </div>
              
              <div class="clearfix"></div>
            </div>
            <div class="panel-body">
            
              @foreach($Portfolios as $Portfolio)
                <div  class="col-md-3 col-sm-6 col-xs-12">
                  <div class="portfolio">
                      <div class="box21">
                          <img src="/storage/images/portfolio/cover/{{$Portfolio->cover}}" alt="">
                          <div class="box-content">
                              <h4 class="title">{{$Portfolio->title}}</h4>
                              <p class="text-center">({{$Portfolio->catagory->name}})</p>
                              <p class="description text-center">{{$Portfolio->description}}</p>
                              
                              @if($Portfolio->link)
                                <a class="read-more" href="{{$Portfolio->link}}" target="_blank">Live Preview</a>
                              @else
                                {{link_to_route('Portfolio.show',"Screenshoots",[$Portfolio->id],['class'=>'read-more'])}}
                              @endif
                          </div>
                      </div>
                  </div>
                  <div class="col-md-12" style="padding: 8px;">
                    {!!Form::open(['route' => ['Portfolio.destroy', $Portfolio->id], 'method' => 'DELETE'])!!}
                        {{link_to_route('Portfolio.edit',"Edit",[$Portfolio->id],['class'=>'btn btn-success'])}}
                      
                        {{Form::submit("Delete", ['class' => 'btn btn-danger','onclick'=>'return deleletconfig()'])}}
                  {!!Form::close()!!}
                  </div>
                </div>
                
              @endforeach

            </div>
            
          </div>
        </div>
      </div>
    </div>


<div id="Add_Portfolio" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Profile</h4>
      </div>
      <div class="modal-body">

          {!!Form::open(['action' => 'PortfolioController@store','method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
        
            <div class="col-md-4">
                <img id="output" class="img-responsive" src="/images/header.jpg" style="width:100%;max-height: 300px;" >
                <div class="photo_post">
                  {{Form::file('image', ['class'=>'file', 'id'=>'f02','placeholder'=>'Insert Image', 'onchange'=>'loadFile(event)'])}}
                  {!! Form::label('f02', 'Select Cover') !!}
                </div>
            </div>

            <div class="col-md-8"> 


                <div class="clearfix"></div>

                <fieldset  class="form-group">
                  {!! Form::label('title', 'Title: ') !!}
                  {{Form::text('title',null,['value'=>'','placeholder' => 'Portfolio Title', 'class' => 'form-control'])}}
                </fieldset>

                <fieldset  class="form-group">
                  {{ Form::label('catagory_id') }}
                    {{ Form::select('catagory_id', $CatagoryList, null, array('class'=>'form-control', 'placeholder'=>'Please select ...')) }}
                </fieldset>

                <fieldset  class="form-group">
                  {!! Form::label('link', 'Link (if exist): ') !!}
                  {{Form::text('link',null,['value'=>'','placeholder' => 'Portfolio link', 'class' => 'form-control'])}}
                </fieldset>

                <fieldset  class="form-group">
                  {!! Form::label('description', 'Short Description: ') !!}
                  {{Form::textarea('description',null,['value'=>'','placeholder' => '', 'class' => 'form-control'])}}
                </fieldset>

                <fieldset class="form-group">
                      {{Form::submit('Add', ['class'=>'btn btn-info'])}}
                </fieldset>

                
              </div>    

          {!! Form::close() !!}

      </div>
      <div class="clearfix"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>