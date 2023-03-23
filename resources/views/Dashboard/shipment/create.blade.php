@extends('layouts.app')
@section('content')
    <div class="bg-white shadow rounded-sm my-2.5 overflow-x-auto">
        <!-- ====== Form Elements Section Start -->
        <section class="pt-20 pb-10 lg:pt-[120px] lg:pb-20">
            <form action="{{ route('deal.store') }}" method="POST" enctype="multipart/form-data">
                @csrf


                <div class="w-full px-4 lg:w-5/12">
                    <div class="mb-12">
                        <label for="customer_id" class="mb-3 block text-base font-medium text-black">
                            العميل
                        </label>
                        <div class="relative">
                            <select name="customer_id" id="customer_id"
                                class="w-full  appearance-none rounded-lg border-[1.5px] border-form-stroke py-3 px-5 font-medium text-body-color outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-[#F5F7FD]">

                                @foreach ($customers as $customer)
                                    <option class="px-24" value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach

                            </select>
                            <span
                                class="absolute left-4 top-1/2 mt-[-2px] h-[10px] w-[10px] -translate-y-1/2 rotate-45 border-r-2 border-b-2 border-body-color">
                            </span>
                        </div>
                    </div>
                </div>

                <div class="w-full px-4 lg:w-5/12">
                    <div class="mb-12">
                        <label for="type" class="mb-3 block text-base font-medium text-black">
                            نوع الشحنة
                        </label>
                        <div class="relative">
                            <select name="type" id="type"
                                class="w-full  appearance-none rounded-lg border-[1.5px] border-form-stroke py-3 px-5 font-medium text-body-color outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-[#F5F7FD]">

                                @foreach ($types as $type)
                                    <option class="px-24" value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach

                            </select>
                            <span
                                class="absolute left-4 top-1/2 mt-[-2px] h-[10px] w-[10px] -translate-y-1/2 rotate-45 border-r-2 border-b-2 border-body-color">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 lg:w-5/12">
                    <div class="mb-12">
                        <label for="status" class="mb-3 block text-base font-medium text-black">
                            حالة الشحنة
                        </label>
                        <div class="relative">
                            <select name="status" id="status"
                                class="w-full  appearance-none rounded-lg border-[1.5px] border-form-stroke py-3 px-5 font-medium text-body-color outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-[#F5F7FD]">

                                @foreach ($statuses as $status)
                                    <option class="px-24" value="{{ $status->id }}">{{ $status->name }}</option>
                                @endforeach

                            </select>
                            <span
                                class="absolute left-4 top-1/2 mt-[-2px] h-[10px] w-[10px] -translate-y-1/2 rotate-45 border-r-2 border-b-2 border-body-color">
                            </span>
                        </div>
                    </div>
                </div>


                {{-- تاريخ  --}}



                <div class="relative max-w-sm">
                    <label for="delivery_date" class="mb-3 block text-base font-medium text-black">
                        تاريخ التسليم
                    </label>
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">

                    </div>

                    <input name="delivery_date" type="date" id="delivery_date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @if ($errors->has('delivery_date'))
                        <p class="text-red-500 text-sm mt-2">{{ $errors->first('delivery_date') }}</p>
                    @endif
                </div>
                <div class="mb-12">
                    <label for="place_of_arrival" class="mb-3 block text-base font-medium text-black">
                        مكان القدوم :
                    </label>
                    <input name="place_of_arrival" id="place_of_arrival" type="text" placeholder="مكان التسليم"
                        class="w-full rounded-lg border-[1.5px] border-form-stroke py-3 px-5 font-medium text-body-color placeholder-body-color outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-[#F5F7FD]" />
                    @error('place_of_arrival')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-12">
                    <label for="place_of_delivery" class="mb-3 block text-base font-medium text-black">
                        مكان التسليم :
                    </label>
                    <input name="place_of_delivery" id="place_of_delivery" type="text" placeholder="مكان التسليم"
                        class="w-full rounded-lg border-[1.5px] border-form-stroke py-3 px-5 font-medium text-body-color placeholder-body-color outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-[#F5F7FD]" />
                    @error('place_of_delivery')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                @if ($errors->any())
                    <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                        role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <button type="submit"
                    class="inline-flex w-full items-center justify-center rounded bg-green-600 py-4 px-6 text-base font-medium text-white transition duration-300 ease-in-out hover:bg-dark">
                    {{ __('أضف الصفقة') }}
                </button>

    </div>
    </form>




    </section>
    <!-- ====== Form Elements Section End -->

    </div>




    <!-- END OF TABLE -->
@endsection
