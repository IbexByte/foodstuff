@extends('layouts.app')
@section('content')
  


    <div class="bg-white shadow rounded-sm my-2.5 overflow-x-auto">
        <!-- ====== Form Elements Section Start -->
        <section class="pt-20 pb-10 lg:pt-[120px] lg:pb-20">
            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf
                <div class="container mx-auto">
                    <div class="-mx-4 flex flex-wrap">
                        <div class=" w-full px-4 md:w-1/2 lg:w-1/3">
                            <div class="mb-12">
                                <label for="" class="mb-3 block text-base font-medium text-black">
                                    الهمة
                                </label>
                                <input type="text" name="name" placeholder="المهمة"
                                    class="w-full rounded-lg border-[1.5px] border-form-stroke py-3 px-5 font-medium text-body-color placeholder-body-color outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-[#F5F7FD]"
                                    value="{{ old('name') }}" />
                                @error('name')
                                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        {{-- دخال نصي --}}
                        <div class=" w-full px-4 md:w-1/2 lg:w-1/3">
                            <div class="mb-12">
                                <label for="" class="mb-3 block text-base font-medium text-black">
                                    وصف للمهمة 
                                </label>
                                <textarea name="description" rows="5" placeholder="وصف موجز لطبيعة المهمة"
                                    class="w-full rounded-lg border-[1.5px] border-primary py-3 px-5 font-medium text-body-color placeholder-body-color outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-[#F5F7FD]">{{ old('description') }}</textarea>
                                @error('description')
                                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
            
                        <div class=" w-full px-4 md:w-1/2 lg:w-1/3">
                            <button type="submit" class="inline-flex w-full items-center justify-center rounded bg-green-600 py-4 px-6 text-base font-medium text-white transition duration-300 ease-in-out hover:bg-dark">
                                {{ __('أضف المهمة') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            
            


        </section>
        <!-- ====== Form Elements Section End -->

    </div>




    <!-- END OF TABLE -->
@endsection



