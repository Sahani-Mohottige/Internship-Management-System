<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('HR Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="space-y-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900">All Internships</h3>
                        <ul class="mt-4 divide-y divide-gray-200">
                            @foreach($internships as $internship)
                                <li class="py-3 text-gray-800">
                                    <span class="font-medium">{{ $internship->name }}</span>
                                    <span class="text-gray-500">&ndash; {{ $internship->internship_status }}</span>
                                    <span class="text-gray-500">({{ $internship->email }})</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900">All Reports</h3>
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

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900">All Leave Requests</h3>
                        <ul class="mt-4 divide-y divide-gray-200">
                            @foreach($leaves as $leave)
                                <li class="py-3 text-gray-800">
                                    <span class="font-medium">{{ $leave->reason }}</span>
                                    <span class="text-gray-500">by {{ $leave->student_name }}</span>
                                    <span class="text-gray-500">&ndash; {{ $leave->status }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900">All Users</h3>
                        <ul class="mt-4 divide-y divide-gray-200">
                            @foreach($users as $user)
                                <li class="py-3 text-gray-800">
                                    <span class="font-medium">{{ $user->name }}</span>
                                    <span class="text-gray-500">&ndash; {{ $user->email }}</span>
                                    <span class="text-gray-500">&ndash; {{ $user->role }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
