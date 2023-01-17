<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees List') }}
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
                                Company
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                               Phone Number
                            </th>
                            <th>

                            </th>
                            <th>
                                Action
                            </th>
                        </thead>
                        <tbody>
                            @foreach ( $employees as $company )
                            <tr>
                                <td class="font-medium text-gray-900">
                                    {{ $company->First_name." ".$company->Last_name }}
                                </td>
                                <td class="font-medium text-gray-900">
                                    {{ $company->Company }}
                                </td>
                                <td class="font-medium text-gray-900">
                                    {{ $company->email }}
                                </td>
                                <td class="font-medium text-gray-900">
                                    {{ $company->Phone_number }}
                                </td>
                                <td class="font-medium text-gray-900">
                                    <a href="#"class="btn btn-primary">VIEW</a>
                                </td>
                                <td class="font-medium text-gray-900">
                                    <a href="#"class="btn btn-primary">EDIT</a>
                                </td>
                                <td class="font-medium text-gray-900">
                                    <a href="#"class="btn btn-danger">DELETE</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $employees->onEachSide(1)->Links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
