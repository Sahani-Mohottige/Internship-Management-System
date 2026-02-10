<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="space-y-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center justify-between gap-4">
                            <h3 class="text-lg font-semibold text-gray-900">My Internship</h3>
                        </div>

                        <div class="mt-4 text-gray-800">
                            @if($internship)
                                <p>
                                    <span class="text-gray-500">Status:</span>
                                    <span class="font-medium">{{ $internship->status }}</span>
                                </p>
                            @else
                                <p class="text-gray-600">No internship assigned yet.</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900">My Reports</h3>
                        <ul class="mt-4 divide-y divide-gray-200">
                            @foreach($reports as $report)
                                <li class="py-3 text-gray-800">
                                    <span class="font-medium">{{ $report->title ?? 'Untitled Report' }}</span>
                                    <span class="text-gray-500">&ndash; {{ $report->status }}</span>
                                </li>
                            @endforeach
                        </ul>

                        <div class="mt-6">
                            <a
                                href="/reports/create"
                                class="inline-flex items-center rounded-md bg-gray-800 px-4 py-2 text-sm font-semibold text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2"
                            >
                                Submit New Report
                            </a>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900">My Leave Requests</h3>
                        <ul class="mt-4 divide-y divide-gray-200">
                            @foreach($leaves as $leave)
                                <li class="py-3 text-gray-800">
                                    <span class="font-medium">{{ $leave->reason }}</span>
                                    <span class="text-gray-500">&ndash; {{ $leave->status }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
