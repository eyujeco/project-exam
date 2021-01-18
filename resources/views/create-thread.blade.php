<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laravel') }}
        </h2>
    </x-slot>

    <div class="container w-50 px-5 py-10 mt-5 border border-info rounded">
        <form method="POST" action="create-thread">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Thread title</label>
                <input type="text" name="threadtitle" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Description/ details</label>
                <textarea name="threaddetails" class="form-control" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-lg btn-info">Create thread</button>
        </form>
    </div>
    
</x-app-layout>