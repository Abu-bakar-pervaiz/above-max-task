<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Add Employee
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-11/12 mx-auto p-4">

              @include('layouts.alerts')
              
                <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex gap-x-4 flex-wrap justify-between">
                        <div class="mb-4 w-full md:w-[47%]">
                            <label for="first-name" class="block text-sm font-medium text-gray-700">First Name</label>
                            <input type="text" required value="{{ old('first_name') }}" id="first-name" minlength="3" name="first_name"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div class="mb-4 w-full md:w-[47%]">
                            <label for="last-name" class="block text-sm font-medium text-gray-700">Last Name</label>
                            <input type="text" required value="{{ old('last_name') }}" id="last-name" minlength="3" name="last_name"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div class="mb-4 w-full md:w-[47%]">
                            <label for="company" class="block text-sm font-medium text-gray-700">Company</label>
                            <select name="company" id="company" class="block w-full p-2.5 text-base text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                                <option value="" disabled selected>Select Company</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4 w-full md:w-[47%]">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" value="{{ old('email') }}" id="email" name="email"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div class="mb-4 w-full">
                            <label for="phone" class="block text-sm font-medium text-gray-700">Phone (e.g. +92xxxxxxxxxx)</label>
                            <input type="text" value="{{ old('phone') }}" pattern="^\+92\d{10}$" title="Phone number must be start with +92 followed by the 10 digits of your phone number" id="phone" name="phone"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="py-2 px-4 rounded-lg bg-blue-600 text-white w-full">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</x-app-layout>
