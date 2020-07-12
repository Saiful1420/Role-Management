<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


    <title>Todo List App</title>
    </head>
<body>
<div class="container">
    <div class="col-md-offset-2 col-md-8">
         <div class="row">
             <h1>Todo List</h1>
         </div>
{{-- display success message --}}
@if (Session::has('success'))
<div class="alart alart-successs">
    <strong>Success:</strong> {{ Session::get('success') }}
</div>
@endif

{{-- didplay error message --}}

  @if (count($errors) > 0)
    <div class="alart alart-danger">
        <strong>Error:</strong>
        <ul>
            @foreach ($errors->all() as $error )
                 <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif

  <div class="row">
  <form action="{{ route('task.update', [$taskUnderEdit->id]) }}" method="POST">
    {{ csrf_field() }}

    <input type="hidden" name='_method' value='PUT'>

             <div class="form-group">
             <input type="text" name='TaskName' class='form-control input-lg' value="{{ $taskUnderEdit->name }}" >
             </div>

             <div class="form-group">
                <input type="submit" value='Save Changes' class='btn btn-success btn-lg'>
             <a href="{{ route('task.index')}}" class="btn btn-success btn-lg pull-right">Go Back</a>
             </div>
        </form>

  </div>



    </div>
</div>
</body>
</html>
