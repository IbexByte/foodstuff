<x-action-section>
    <x-slot name="title">
        {{ __('حذف الحساب') }}
    </x-slot>

    <x-slot name="description">
        {{ __('حذف حساب المستخدم.') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            {{ __('عندما يتم حذف حسابك جميع البيانات المرتبطة به يتم حذفها بدون القدرة على اعادتها مرة أخرى.') }}
        </div>

        <div class="mt-5">
     
            <button type="submit"   wire:click="confirmUserDeletion" wire:loading.attr="disabled"
            class="inline-flex w-full items-center justify-center rounded bg-[rgb(220_38_38_/_1)] py-4 px-6 text-base font-medium text-white transition duration-300 ease-in-out hover:bg-[rgb(168,43,43)]">
            {{ __('حذف الحساب') }}
        </button>
        </div>

        <!-- Delete User Confirmation Modal -->
        <x-dialog-modal wire:model="confirmingUserDeletion">
            <x-slot name="title">
                {{ __('حذف الحساب') }}
            </x-slot>

            <x-slot name="content">
                {{ __('هل أنت متأكد من رغبتك في حذف الحساب ؟ للتأكيد أدخل كلمة السر الخاصة بك') }}

                <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-input type="password" class="mt-1 block w-3/4"
                                autocomplete="current-password"
                                placeholder="{{ __('كلمة السر') }}"
                                x-ref="password"
                                wire:model.defer="password"
                                wire:keydown.enter="deleteUser" />

                    <x-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                    {{ __('إلغاء') }}
                </x-secondary-button>

                <button type="submit"  wire:click="deleteUser" wire:loading.attr="disabled"
                class="inline-flex w-full items-center justify-center rounded bg-red-600 py-4 px-6 text-base font-medium text-white transition duration-300 ease-in-out hover:bg-dark">
                {{ __('حذف الحساب') }}
            </button>

            
            </x-slot>
        </x-dialog-modal>
    </x-slot>
</x-action-section>
