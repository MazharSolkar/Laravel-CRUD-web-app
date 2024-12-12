<x-layout>

    <x-slot:title>Add Task</x-slot>

    <x-slot:main>
        <form action="{{ route('task.store') }}" method="POST">
            @csrf
            <div class="row">
                <x-form.input name="title" type="text" placeholder="dummy task." />
            </div>
            <x-form.button>Add Task</x-form.button>
        </form>
    </x-slot>

</x-layout>
