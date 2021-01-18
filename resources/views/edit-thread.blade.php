<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laravel') }}
        </h2>
    </x-slot>

    <div class="container w-50 px-5 py-10 mt-5">
        edit thread
    </div>

    <div class="container w-50 px-5 py-10 mt-5 border border-info rounded">
        <form action="{{ route('save_edit_thread', $thread->id) }}" method="POST" id="edit-thread-form">
            @csrf
            <input type="hidden" value="{{ $thread->id }}" name="thread_id">
            <div class="form-group">
                <label>Thread title</label>
                <input type="text" name="threadtitle" class="form-control" value="{{$thread->threadtitle}}" required>
            </div>
            <div class="form-group">
                <label>Description/ details</label>
                <textarea name="threaddetails" class="form-control" rows="3" required>{{ $thread->threaddetails }}</textarea>
            </div>
            <button type="submit" class="btn btn-lg btn-info">Edit thread</button>
        </form>
    </div>
    
</x-app-layout>