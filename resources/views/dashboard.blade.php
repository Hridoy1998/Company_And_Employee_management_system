<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table">
                        <thead>
                            <th>
                                Name
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                               Website
                            </th>
                            <th>
                                Logo
                            </th>
                            <th>
                                Action
                            </th>
                        </thead>
                        <tbody>
                            @foreach ( $companies as $company )
                            <tr>
                                <td class="font-medium text-gray-900">
                                    {{ $company->Name }}
                                </td>
                                <td class="font-medium text-gray-900">
                                    {{ $company->email }}
                                </td>
                                <td class="font-medium text-gray-900">
                                    <a href="{{ $company->website }}">{{ $company->website }}</a>
                                </td>
                                <td class="font-medium text-gray-900">
                                    <img src="{{asset('logo/'.$company->logo)}}" alt="Admin" height="100" width="100">
                                </td>
                                <td class="font-medium text-gray-900">
                                    <a href="{{ route('company.edit.go',['id'=>$company->id]) }}" class="btn btn-primary">EDIT</a>
                                </td>
                                <td class="font-medium text-gray-900">
                                    <a href="{{ route('company.delete',['id'=>$company->id]) }}"class="btn btn-danger">DELETE</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $companies->onEachSide(1)->Links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
