<x-app-layout>
  <x-slot name="header">
      <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            All Companies
        </h2>
        <a href="{{ route('company.create') }}" class="py-2 px-4 text-sm rounded-lg bg-blue-600 text-white">Add New</a>
      </div>
  </x-slot>

  <div class="py-8">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          @include('layouts.alerts')
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">            
            <table class="table-auto w-full text-sm border border-gray-300">
              <thead>
                <tr>
                  <th class="border px-2 py-1">Sr no.</th>
                  <th class="border px-2 py-1">Name</th>
                  <th class="border px-2 py-1">Website</th>
                  <th class="border px-2 py-1">Logo</th>
                  <th class="border px-2 py-1">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($companies as $company)
                    <tr class="text-center {{ $loop->index % 2 === 0 ? 'bg-gray-100' :'bg-white' }}">
                      <td class="border px-2 py-1">{{ $loop->iteration }}</td>
                      <td class="border px-2 py-1">{{ $company->name }}</td>
                      <td class="border px-2 py-1">{{ $company->website }}</td>
                      <td class="border px-2 py-3 w-32 text-center">
                        <img src="{{ asset('storage/company/'.$company->logo) }}" alt="{{ $company->name }} logo" class="w-[100px] h-[100px] block mx-auto">
                      </td>
                      <td class="border px-2 py-1">
                        <div class="flex justify-center gap-2">
                          <a href="{{ route('company.edit', $company->id) }}" class="py-2 px-4 text-sm rounded-lg bg-yellow-400 text-white">Edit</a>
                          <form action="{{ route('company.destroy', ['company' => $company->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this company this will also delete all of it\'s employees and it will be undone?')">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="py-2 px-4 text-sm rounded-lg bg-red-600 text-white">Delete</button>
                          </form>
                        </div>
                      </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
            @if ($companies->hasPages())
              <div class="p-2">
                {{ $companies->links() }}
              </div>
            @endif
          </div>
      </div>
  </div>
</x-app-layout>
