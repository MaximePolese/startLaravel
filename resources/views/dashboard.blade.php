<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('MeowsSSSSS !!!') }}
        </h2>
    </x-slot>

    <div class="pb-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(count($meows) > 0)
                @foreach ($meows as $meow)
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-xl m-3">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <h3>{{ $meow->user->name }}</h3>
                            <p>{{ $meow->content }}</p>
                            <p>mis à jour le {{ $meow->updated_at }}</p>
                            @foreach ($meow->comments as $comment)
                                <div class="comment">
                                    <p>{{ $comment->user->name }}
                                        : {{ $comment->content }}  {{ $comment->updated_at }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            @else
                <p>No meows to display</p>
            @endif
        </div>
    </div>
</x-app-layout>
