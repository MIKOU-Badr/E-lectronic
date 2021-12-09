<x-jet-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Mettre à jour le mot de passe') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Assurez-vous que votre compte utilise un long mot de passe aléatoire pour rester sécurisé.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="current_password" value="{{ __('Mot de passe actuel') }}" />
            <x-jet-input id="current_password" type="password" style="margin-left: 50px; outline: none; height: 40px; width: 55%; border-radius: 25px; padding-left: 2em; color:#0e8ce4;"  class="mt-1 block w-full" wire:model.defer="state.current_password" autocomplete="current-password" />
            <x-jet-input-error for="current_password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="password" value="{{ __('Nouveau mot de passe') }}" />
            <x-jet-input id="password" type="password" style="margin-left: 30px; outline: none; height: 40px; width: 55%; border-radius: 25px; padding-left: 2em; color:#0e8ce4;" class="mt-1 block w-full" wire:model.defer="state.password" autocomplete="new-password" />
            <x-jet-input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="password_confirmation" value="{{ __('Confirmez le mot de passe') }}" />
            <x-jet-input id="password_confirmation" type="password" style=" margin-left: 10px; outline: none; height: 40px; width: 55%; border-radius: 25px; padding-left: 2em; color:#0e8ce4;"  class="mt-1 block w-full" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
            <x-jet-input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Enregistré.') }}
        </x-jet-action-message>

        <x-jet-button style="background-color:  #0e8ce4">
            {{ __('enregistrer') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
