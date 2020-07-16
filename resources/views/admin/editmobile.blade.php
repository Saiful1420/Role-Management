<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/roboto.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/material-fullpalette.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/ripples.min.css">

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/js/material.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/js/ripples.min.js"></script>


    <title>Mobile Management</title>
    </head>
<body>

    <div class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

          </div>
          <div class="navbar-collapse collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav">
            <li class=""><a href="{{('home')}}">Home</a></li>
            <li class=""><a href="{{ route('create')}}">Add New</a></li>
            </ul>
          </div>

        </div>
      </div>

{{-- display success message --}}
@if (Session::has('success'))
<div class="alart alart-successs">
    <strong>Success:</strong> {{ Session::get('success') }}
</div>
@endif
      <div class="container">
          <div class="panel panel-default">
              <div class="panel-heading">
                  <h3 class="panel-title">Add Items</h3>
              </div>
              <div class="panel-body">
              <form class="form-horizontal" action="{{ route('update',$mobile->id) }}" method="POST">
                {{  csrf_field() }}
                    <fieldset>

                      <div class="form-group">
                        <label for="mobilename" class="col-md-2 control-label">Mobile Name</label>
                        <div class="col-md-10">
                        <input type="text" class="form-control" value="{{ $mobile->mobile_name}}" name="mobilename"  placeholder="Mobile Name">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="memory" class="col-md-2 control-label">Memory</label>
                        <div class="col-md-10">
                          <input type="text" class="form-control" value="{{ $mobile->memory}}" name="memory"  placeholder="Mobile Memory">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="battery" class="col-md-2 control-label">Battery</label>
                        <div class="col-md-10">
                          <input type="text" class="form-control" value="{{ $mobile->battery}}" name="battery" placeholder="Mobile Battery">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="price" class="col-md-2 control-label">Price</label>
                        <div class="col-md-10">
                          <input type="text" class="form-control" value="{{ $mobile->price}}" name="price" placeholder="Mobile price">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-10 col-md-offset-2">

                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </div>
                    </fieldset>
                  </form>
              </div>
          </div>
      </div>
<script
  src="http://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
  <script>
      $.material.init()
  </script>
</body>
</html>
