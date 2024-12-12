<x-layout>

    <x-slot:title>Update Task</x-slot>

    <x-slot:main>
        <form action="{{ route('task.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <x-form.input name="title" type="text" value="{{$task->title}}" />
            </div>
            <x-form.button>Update Task</x-form.button>
        </form>
    </x-slot>

</x-layout>
