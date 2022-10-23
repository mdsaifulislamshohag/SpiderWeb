
<div class="">
  <div class="row">

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

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0" >

      <div class="panel panel-info">

        <div class="panel-heading">
          <h3 class="panel-title">Mission</h3>
        </div>

        <div class="panel-body">
          <div class="row" style="padding: 10px;">


            {!! Form::model($mission, ['method' => 'PUT', 'action' => ['MissionController@update',$mission->id]]) !!}
            
                <div class="col-md-12"> 

                    <fieldset  class="form-group">
                      {!! Form::label('title', 'Add a Title: ') !!}
                      {{Form::text('title',null,['value'=>'$mission->title','class' => 'form-control'])}}
                    </fieldset>

                    <fieldset  class="form-group">
                      {!! Form::label('description', 'Add a Description: ') !!}
                      {{Form::textarea('description',null,['value'=>'$mission->description','class' => 'form-control', 'rows' => '10'])}}
                    </fieldset>

                    {{Form::submit('Update', ['class'=>'btn btn-info'])}}
                    
                  </div>    

              {!! Form::close() !!}



          </div>
        </div>
        
       

      </div>
    </div>
  </div>
</div>