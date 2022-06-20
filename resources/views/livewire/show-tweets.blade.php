<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tweets
        </h2>
    </div>
</header>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <form method="post" wire:submit.prevent="create" class="bg-white shadow-md rounded p-6 sm:px-20">
            <label class="block text-gray-700 text-sm font-bold mb-4" for="username">
                Tweet
            </label>
            <textarea name="content" id="content" rows="5" placeholder="O que está pensando?" wire:model="content"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('content') border-red-500 @enderror"></textarea>
            @error('content')
                <p><span class="text-red-500">{{ $message }}</span></p>
            @enderror
            <button type="submit" class="bg-indigo-500 text-white p-2 pl-6 pr-6 rounded mt-4">Criar Tweet</button>
        </form>

        @foreach ($tweets as $tweet)
            <div class="flex mt-8 bg-white shadow-md rounded p-6 sm:px-20">
                <div class="w-1/8 pl-3 text-center">
                    @if ($tweet->user->profile_photo_path)
                        <img src="{{ Storage::url($tweet->user->profile_photo_path) }}"
                            alt="{{ $tweet->user->name }}" class="rounded-full h-8 w-8">
                    @else
                        <img src="{{ url('imgs/no-image.png') }}" alt="{{ $tweet->user->name }}"
                            class="rounded-full h-8 w-8">
                    @endif
                    {{-- $tweet->user->name --}}
                </div>
                <div class="w-7/8 pl-3 inline-block align-text-middle">
                    {{ $tweet->content }}
                    (@if ($tweet->likes->count())
                        <a href="#" wire:click.prevent="unlike({{ $tweet->id }})"
                            class="text-red-500">Descurtir</a>
                    @else
                        <a href="#" wire:click.prevent="like({{ $tweet->id }})"
                            class="text-teal-500">Curtir</a>
                    @endif)
                </div>
            </div>
        @endforeach

        <div class="py-12">
            {{ $tweets->links() }}
        </div>
    </div>
