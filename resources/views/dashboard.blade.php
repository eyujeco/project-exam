<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laravel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- <x-jet-welcome /> -->
            <div class="py-2 flex justify-between items-center"><div>
                <h1 class="text-4xl font-thin">LINE Message Templates ({{ $total }})</h1>
            </div>
            <div>
                <a href="/create-thread" class="bg-blue-500 border-2 border-transparent hover:bg-blue-700 text-white font-bold py-3 px-6 rounded">
                    Create template
                </a>
            </div>            
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <table class="border table-auto table-hover w-full text-gray-700 shadow mb-12">
                <thead>
                    <tr class="border-b text-left bg-gray-200">
                        <th class="py-4 px-8 font-semibold text-sm">THREAD</th>
                        <th class="py-4 px-4 font-semibold text-sm">TITLE</th>
                        <th class="py-4 px-4 font-semibold text-sm">EDIT</th>
                        <th class="py-4 px-4 font-semibold text-sm">DELETE</th>
                        <th class="py-4 px-4 font-semibold text-sm">LAST UPDATED</th>
                        <th class="py-4 px-4 font-semibold text-sm">CREATED</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($threads as $thread)
                    <tr class="border-b text-left bg-gray-200">
                        <td class="py-3 px-4 text-sm">{{ $thread->id }}</td>
                        <td class="py-3 px-4 text-sm"><a href="http://localhost:8000/thread/{{$thread->slug}}">{{ $thread->threadtitle }}</a></td>
                        <td class="py-3 px-4 text-sm">
                            <form method="GET" action="{{ route('get_edit_thread', $thread->id) }}">
                                @csrf
                                <input type="hidden" value="{{ $thread->id }}" name="thread_id">
                                <button type="submit" class="btn btn-outline-success">Update</button>
                            </form>
                        </td>
                        <td class="py-3 px-4 text-sm">
                            <form method="POST" action="{{ route('delete_thread') }}" id="delete-thread-form">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" value="{{ $thread->id}}" name="thread_id">
                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                            </form>
                        </td>
                        <td class="py-3 px-4 text-sm">
                            {{ $thread->updated_at->toDateString() }}<br>
                            by: {{ $thread->user->name }}
                        </td>
                        <td class="py-3 px-4 text-sm">{{ $thread->created_at->toDateString() }} <br>
                            by: {{ $thread->user->name }}
                        </td>
                    </tr>
                    @empty
                        <p>No posts found</p>
                    @endforelse


                </tbody>
            </table>
        </div>
    </div>

    <div class="px-20">
        <nav aria-label="Page navigation example">
            <ul class=pagination>
                {!! $threads->links() !!}
            </ul>
        </nav>
    </div>


</x-app-layout>