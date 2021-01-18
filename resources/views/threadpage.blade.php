<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Laravel') }}
        </h2>
    </x-slot>

    <!-- THE THREAD -->
    <div class="py-12">
        <div class="flex flex-col justify-center items-center pb-16">
            <div class="h-32 relative text-gray-600 border border-gray-400 bg-white rounded-lg shadow flex flex-col items-center justify-center cursor-pointer hover:border-blue-600 hover:shadow-lg transition-all duration-75 ease-in" style="width: 350px;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mb-4"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path> <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline> <line x1="12" y1="22.08" x2="12" y2="12"></line></svg> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute top-0 right-0 m-4 text-blue-600" style="display: none;"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path> <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg> <h3 class="text-lg font-medium mb-2 text-gray-700">
                {{ $thread->threadtitle }}
                </h3> <small class="text-gray-500">{{ $thread->threaddetails }}</small>
            </div>
            
            <!-- existing CONTENT LOOP/ -->
            @foreach ($thread->contents as $content)
            <span class="h-16 w-1 bg-gray-300 block mx-auto"></span>
            <div class="h-40 border border-gray-400 bg-white rounded-lg shadow flex flex-col items-center justify-center hover:border-blue-600 hover:shadow-lg cursor-pointer relative transition-all duration-75 ease-in" style="width: 350px;"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute top-0 right-0 text-blue-600 mr-4 mt-4" style="display: none;"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg> <div class="mb-2 text-gray-700"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg></div>
                <h3 class="text-gray-700 font-medium mb-2 w-64 py-1 truncate mx-auto text-center">
                    {{ $content->contentbody }}
                </h3>
                <form method="POST" action="{{ route('delete_content') }}" id="delete-conent-form">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" value="{{$content->id}}" name="content_id">
                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                </form>
            </div>
            @endforeach


            <!-- MAKE NEW CONTENT BUTTON -->
            <span class="h-16 w-1 bg-gray-300 block mx-auto"></span>
            <button type="button" data-toggle="modal" data-target="#addContentModal" class="p-2 rounded-full border border-gray-400 bg-gray-200 rounded-lg shadow flex flex-col items-center justify-center hover:bg-gray-100 transition-colors duration-75 focus:shadow-outline focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-600"><line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line></svg>
            </button> 

            <!-- MODAL FOR NEW CONTENT  -->
            <div class="modal fade" id="addContentModal" tabindex="-1" role="dialog" aria-labelledby="addContentModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="exampleModalLongTitle">Post Content</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('save_content') }}">
                        @csrf
                        <div class="form-group">
                            <label>Post new content</label>
                            <textarea name="contentbody" class="form-control" rows="2" required></textarea>
                            <input type="hidden" value="{{$thread->slug}}" name="slug">
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Post</button>
                    </form>
                </div>
                </div>
            </div>
            </div>
            










        </div>
    </div>





    
</x-app-layout>