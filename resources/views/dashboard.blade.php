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
                                        <p id="content-p-{{ $comment->id }}" class="text-sm pl-1">
                                            {{ $comment->content }}</p>
                                        <form id="edit-form-{{ $comment->id }}" method="POST"
                                              action="{{ route('comments.update', $comment->id) }}"
                                              class="hidden">
                                            @csrf
                                            @method('PUT')
                                            <input
                                                class="border-none outline-none h-5 text-sm pl-1 bg-white dark:bg-gray-800 dark:text-gray-100"
                                                type="text"
                                                name="newcontent" value="{{ $comment->content }}"
                                                required/>
                                            <button type="submit">✅</button>
                                        </form>
                                        <p id="updated-at-p-{{ $comment->id }}"
                                           class="text-xs text-gray-400 pl-1">{{ $comment->updated_at }}</p>
                                        @if (Auth::id() === $comment->user_id)
                                            <div class="flex ml-auto">
                                                <a class="mr-1" href="#"
                                                   data-target="edit-form-{{ $comment->id }}">✏️</a>

                                                <form method="POST"
                                                      action="{{ route('comments.destroy', $comment->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="text-xs" type="submit">❌</button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                                <form method="POST" action="{{ route('comments.store') }}" class="ml-auto mt-6">
                                    @csrf
                                    <label class="text-sm text-yellow-600">new comment
                                        <input class="text-black w-300 h-6 rounded-full" type="text" name="newcontent"
                                               required/>
                                        <input type="hidden" name="meow_id" value="{{ $meow->id }}"/>
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
    <script>
        document.querySelectorAll('[data-target]').forEach(function (link) {
            link.addEventListener('click', function (event) {
                event.preventDefault();
                var form = document.getElementById(this.dataset.target);
                var contentP = document.getElementById('content-p-' + this.dataset.target.split('-')[2]);
                var updatedAtP = document.getElementById('updated-at-p-' + this.dataset.target.split('-')[2]);
                if (form.classList.contains('hidden')) {
                    form.classList.remove('hidden');
                    contentP.classList.add('hidden');
                    updatedAtP.classList.add('hidden');
                } else {
                    form.classList.add('hidden');
                    contentP.classList.remove('hidden');
                    updatedAtP.classList.remove('hidden');
                }
            });
        });
    </script>
</x-app-layout>

