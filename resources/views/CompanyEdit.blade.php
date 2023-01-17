<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Company edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('company.edit',['id'=> $company->id]) }}" method="POST" enctype="multipart/form-data">
                        {{ @csrf_field() }}

                            <div>
                                <x-input-label for="name" :value="__('Company Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="Name" placeholder="Enter the company name" value="{{ $company->Name }}" />
                                <x-input-error :messages="$errors->get('Name')" class="mt-2" />
                            </div>

                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-input-label for="email" :value="__('Company Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" placeholder="Enter the company email" value="{{ $company->email }}" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- website -->
                            <div class="mt-4">
                                <x-input-label for="name" :value="__('Company Website')" />
                                <x-text-input id="website" class="block mt-1 w-full" type="text" name="website" placeholder="Enter the company website" value="{{ $company->website }}"/>
                                <x-input-error :messages="$errors->get('website')" class="mt-2" />  
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-input-label for="name" :value="__('Company logo')" />
                                <x-text-input id="logo" class="block mt-1 w-full" type="file" name="logo" accept="image/*" value="{{ $company->logo }}" />
                                <x-input-error :messages="$errors->get('logo')" class="mt-2" />  
                            </div>
                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button class="ml-4">
                                    {{ __('Update') }}
                                </x-primary-button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
