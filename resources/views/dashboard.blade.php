<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Welcome {{ Auth::user()->name }} ! MeowsSSS !!!
        </h2>
    </x-slot>
    <div class="pb-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(count($meows) > 0)
                @foreach ($meows as $meow)
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-xl m-3">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="flex justify-between items-center">
                                <h3 class="text-2xl text-yellow-600">{{ $meow->user->name }}</h3>
                                <p class="text-xs text-gray-400">update at {{ $meow->updated_at }}</p>
                            </div>
                            <p>"{{ $meow->content }}"</p>
                            <div class="flex flex-col mt-2">
                                <h4>comments</h4>
                                @foreach ($meow->comments as $comment)
                                    <div class="flex items-center">
                                        <p class="text-sm text-yellow-600">{{ $comment->user->name }}: </p>
                                        <p class="text-sm pl-1">"{{ $comment->content }}"</p>
                                        <p class="text-xs text-gray-400 pl-1">{{ $comment->updated_at }}</p>
                                        <form method="POST" action="{{ route('comments.destroy', $comment) }}"
                                              class="ml-auto">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-xs" type="submit">❌</button>
                                        </form>
                                    </div>
                                @endforeach
                                <form method="POST" action="{{ route('comments.store') }}" class="ml-auto mt-6">
                                    @csrf
                                    <label class="text-sm text-yellow-600">new comment
                                        <input class="text-black w-300 h-6 rounded-full" type="text" name="newcontent"
                                               required/>
                                    </label>
                                    <button type="submit">✅</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No meows to display</p>
            @endif
        </div>
    </div>
</x-app-layout>
