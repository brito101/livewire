<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <h1 class="text-4xl py-6 font-bold">Atualizar Foto do Perfil</h1>
    <form wire:submit.prevent="storagePhoto" class="bg-white shadow-md rounded p-6 sm:px-20">
        @if ($photo)
            <div class="mb-4">
                <img src="{{ $photo->temporaryUrl() }}" style="max-width: 200px;">
            </div>
        @endif
        <div class="mb-4">
            <input type="file" wire:model="photo">
        </div>

        @error('photo')
            <p><span class="text-red-500">{{ $message }}</span></p>
        @enderror

        <button type="submit" class="bg-indigo-500 text-white p-2 pl-6 pr-6 rounded">Upload Foto</button>
    </form>
</div>
