<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Supervisor Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="space-y-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900">My Interns</h3>
                        <ul class="mt-4 divide-y divide-gray-200">
                            @foreach($interns as $intern)
                                <li class="py-3 text-gray-800">
                                    <span class="font-medium">{{ $intern->name }}</span>
                                    <span class="text-gray-500">({{ $intern->internship_status }})</span>
                                    <span class="text-gray-500">&ndash; {{ $intern->email }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900">Reports to Review</h3>
                        <ul class="mt-4 divide-y divide-gray-200">
                            @foreach($reports as $report)
                                <li class="py-3 text-gray-800">
                                    <span class="font-medium">{{ $report->title }}</span>
                                    <span class="text-gray-500">by {{ $report->student_name }}</span>
                                    <span class="text-gray-500">&ndash; {{ $report->status }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
