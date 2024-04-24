<x-app-layout>
  <x-slot name="header">
      <div class="flex justify-between items-center">
          <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
              Edit Company
          </h2>
      </div>
  </x-slot>

  <div class="py-8">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-11/12 md:w-1/2 mx-auto p-4">

            @include('layouts.alerts')
            
              <form action="{{ route('company.update',['company' => $company->id]) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('put')
                  <div class="mb-4">
                      <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                      <input type="text" required value="{{ $company->name }}" id="name" minlength="3" name="name"
                          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                  </div>
                  <div class="mb-4">
                      <label for="website" class="block text-sm font-medium text-gray-700">Website</label>
                      <input type="url" required value="{{ $company->website }}" id="website" name="website"
                          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                  </div>
                  <div class="mb-4">
                      <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                      <input type="email" required value="{{ $company->email }}" id="email" name="email"
                          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                  </div>
                  <div class="mb-4">
                      <label for="logo" class="block text-sm font-medium text-gray-700">Logo (min 100x100
                          pixels)</label>
                      <input type="file" accept="image/*" id="logo" name="logo"
                          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                  </div>
                  <div class="mb-4">
                      <button type="submit" class="py-2 px-4 rounded-lg bg-blue-600 text-white w-full">Add</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
  
</x-app-layout>
