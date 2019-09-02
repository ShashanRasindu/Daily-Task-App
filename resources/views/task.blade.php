<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>shashan tack</title>
</head>
<body>
<div class="container">
    <div class="text-center">
       <h1>  shashan daily task  </h1>
        <br><br>

        <div class="row">
            <div class="col-md-12">

                @foreach($errors->all() as $error)

                <div class="alert alert-danger" role="alert">
                    {{$error}}
                </div>

                @endforeach

                <form action="/saveTask" method="post">
                    {{csrf_field()}}
                    <input type="text" class="form-control" name="task" placeholder="Enter Your Tasks">
                    <br>
                    <input type="submit" class="btn btn-primary" value="Save">
                    <input type="button" class="btn btn-warning" value="Clear" >
                </form>
                <br>
                <br>
                <table class="table table-dark">
                    <th>ID</th>
                    <th>Task</th>
                    <th>Completed</th>
                    <th>Action</th>
                    <th>Delete</th>
                    <th>Update</th>
                    <?php
                    $mytime = Carbon\Carbon::now();
                    echo $mytime->toDateString();
                    ?>
                    @foreach($tasks as $task)
                    @if($task->created_at->toDateString()==$mytime->toDateString())
                    <tr>
                        <td>{{$task->id}}</td>
                        <td>{{$task->task}}</td>
                        <td>
                            @if($task->iscompleted)
                            <button class="btn btn-success"> Completed</button>
                            @else
                            <button class="btn btn-warning"> Not Completed</button>
                            @endif
                        </td>
                        <td>
                            @if($task->iscompleted)
                            <a href="/notascomleted/{{$task->id}}" class="btn btn-danger">Mark As Not Completed</a>

                            @else
                            <a href="/ascomleted/{{$task->id}}" class="btn btn-primary">Mark As Completed</a>
                            @endif
                        </td>
                        <td><a href="/detetetask/{{$task->id}}" class="btn btn-warning">Dlete Task</a></td>
                        <td><a href="/updatetask/{{$task->id}}" class="btn btn-success">Update Task</a></td>
                    </tr>
                    @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>
