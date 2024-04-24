<x-app-layout>
  <x-slot name="header">
      <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            All Employees
        </h2>
        <a href="{{ route('employee.create') }}" class="py-2 px-4 text-sm rounded-lg bg-blue-600 text-white">Add New</a>
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
                  <th class="border px-2 py-1">First Name</th>
                  <th class="border px-2 py-1">Last Name</th>
                  <th class="border px-2 py-1">Email</th>
                  <th class="border px-2 py-1">Company</th>
                  <th class="border px-2 py-1">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($employees as $employee)
                    <tr class="text-center {{ $loop->index % 2 === 0 ? 'bg-gray-100' :'bg-white' }}">
                      <td class="border px-2 py-1">{{ $loop->iteration }}</td>
                      <td class="border px-2 py-1">{{ $employee->first_name }}</td>
                      <td class="border px-2 py-1">{{ $employee->last_name }}</td>
                      <td class="border px-2 py-1">{{ $employee->email ?? "N/A" }}</td>
                      <td class="border px-2 py-1">{{ $employee->company->name }}</td>
                      <td class="border px-2 py-1">
                        <div class="flex gap-2 justify-center">
                          <a href="{{ route('employee.edit', $employee->id) }}" class="py-2 px-4 text-sm rounded-lg bg-yellow-400 text-white">Edit</a>
                          <form action="{{ route('employee.destroy', ['employee' => $employee->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this employee it will be undone?')">
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
            <div class="p-2">
              {{ $employees->links() }}
            </div>
          </div>
      </div>
  </div>
</x-app-layout>
