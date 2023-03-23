@extends('layouts.app')
@section('content')
    {{-- session message --}}
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif
    <!-- ADD jop_title BUTTON -->
    <div class="my-2.5">
        <a href="{{ route('types.create') }}">
            <button type="submit" wire:click="deleteUser" wire:loading.attr="disabled"
                class="inline-flex w-full items-center justify-center rounded bg-green-600 py-4 px-6 text-base font-medium text-white transition duration-300 ease-in-out hover:bg-dark">
                {{ __('إضافة نوع جديد') }}
            </button>
        </a>

    </div>
    <!-- TABLE -->
    <!-- TABLE -->
    <div class="bg-white shadow rounded-sm my-2.5 overflow-x-auto">

        <table id="job_titles" class="min-w-max w-full table-auto">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">الحالة</th>
                    <th class="py-3 px-6 text-left">معرف الحالة</th>
                    <th class="py-3 px-6 text-center">الشحنات </th>
                    <th class="py-3 px-6 text-center">إجراء</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm">

                @foreach ($types as $type)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <p>{{ $type->name }}</p>
                        </td>
                        <td class="py-3 px-6 text-left">
                            {{ $type->id }}
                        </td>

                        <td class="py-3 px-6 text-center">
                            @foreach ($type->shipments as $shipment)
                                <ol>
                                    <li>
                                        {{ $shipment->name }}
                                    </li>
                                </ol>
                            @endforeach
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex item-center justify-center">
                                <a href="">
                                    <div
                                        class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </div>
                                </a>
                                <div
                                    class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </div>



                                <form action="{{ route('types.destroy', $type->id) }}" method="POST">
                                    @csrf

                                    @method('DELETE')
                                    <button type="submit"
                                        class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>

                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>




    <script>
        // let table = new DataTable('#job_titles');
        var table = new DataTable('#job_titles', {
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/ar.json',
            },
        });
    </script>
    <!-- END OF TABLE -->
@endsection
