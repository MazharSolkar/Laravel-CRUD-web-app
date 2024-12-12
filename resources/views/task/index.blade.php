<x-layout>

    <x-slot:title>Task List</x-slot>

    <x-slot:main>
        <a href="{{route('task.create')}}" style="text-decoration: none;">
            <x-form.button color="success">Add Task +</x-form.button>
        </a>
        @forelse ($tasks as $task)
            <x-card :task="$task" />
        @empty
            <p class="text-center fs-4 text-secondary">No Task added yet.</p>
        @endforelse
    </x-slot:main>

</x-layout>
