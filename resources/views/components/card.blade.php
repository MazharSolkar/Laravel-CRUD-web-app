@props(['task'])

<div class="alert alert-dark my-3 d-flex justify-content-between align-items-center" role="alert">
    <div>
        {{$task->title}}
    </div>
    <div class="d-flex gap-2">
        <form action="{{route('task.edit', $task->id)}}" method="GET">
            @csrf
            <button class="btn btn-primary">edit</button>
        </form>
        <form action="{{route('task.destroy', $task->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">delete</button>
        </form>
    </div>
</div>
