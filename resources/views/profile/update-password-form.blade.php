<x-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('تحديث كلمة السر') }}
    </x-slot>

    <x-slot name="description">
        {{ __('تأكد من أن حسابك يستخدم كلمة مرور طويلة وعشوائية للبقاء آمنًا.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="current_password" value="{{ __('كلمة السر الحالية') }}" />
            <x-input id="current_password" type="password" class="mt-1 block w-full" wire:model.defer="state.current_password" autocomplete="current-password" />
            <x-input-error for="current_password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="password" value="{{ __('كلمة السر الجديدة') }}" />
            <x-input id="password" type="password" class="mt-1 block w-full" wire:model.defer="state.password" autocomplete="new-password" />
            <x-input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="password_confirmation" value="{{ __('تأكيد كلمة السر') }}" />
            <x-input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
            <x-input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('حفظ.') }}
        </x-action-message>

        <x-button>
            {{ __('حفظ') }}
        </x-button>
    </x-slot>
</x-form-section>