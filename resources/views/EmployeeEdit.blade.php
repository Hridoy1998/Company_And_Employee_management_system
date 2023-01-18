<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Company add') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('Employee.edit',['id'=> $employee->id]) }}" method="POST" >
                        {{ @csrf_field() }}

                            <div class="mt-4">
                                <x-input-label for="First_name" :value="__('Employee First Name')" />
                                <x-text-input id="First_name" class="block mt-1 w-full" type="text" name="First_name" placeholder="Enter Employee First Name" value="{{ $employee->First_name }}" />
                                <x-input-error :messages="$errors->get('First_name')" class="mt-2" />
                            </div>

                            <div class="mt-4">
                                <x-input-label for="Last_name" :value="__('Employee Last Name')" />
                                <x-text-input id="Last_name" class="block mt-1 w-full" type="text" name="Last_name" placeholder="Enter Employee Last Name" value="{{ $employee->Last_name }}" />
                                <x-input-error :messages="$errors->get('Last_name')" class="mt-2" />
                            </div>

                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-input-label for="email" :value="__('Employee Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" placeholder="Enter Employee Email" value="{{ $employee->email }}" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- website -->
                            <div class="mt-4">
                                <x-input-label for="name" :value="__('Company ID')" />
                                <select class="block mt-1 w-full" name="Company" id="Company">
                                    <option value="">Select Company</option>
                                    @foreach ($company as $company)
                                        <option value="{{ $company->id }}" @if("{{ $company->id }}"=="{{ $employee->Company }}") selected @endif> {{ $company->Name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('Company')" class="mt-2" />  
                            </div>
                            <div class="mt-4">
                                <x-input-label for="Phone_number" :value="__('Employee Phone Number')" />
                                <x-text-input id="Phone_number" class="block mt-1 w-full" type="text" name="Phone_number" placeholder="Enter Employee Phone Number" value="{{ $employee->Phone_number }}"/>
                                <x-input-error :messages="$errors->get('Phone_number')" class="mt-2" />  
                            </div>
                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button class="ml-4">
                                    {{ __('Edit') }}
                                </x-primary-button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
