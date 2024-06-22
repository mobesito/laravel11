<x-layout>
    <x-slot:title>
        Jobs
    </x-slot:title>
    <x-slot:heading>
        Job Details
    </x-slot:heading>

    <h2 class="font-bold text-lg">{{ $job->title }}</h2>
    <p>
        This job pays {{ $job->salary }} per year.
    </p>
    @can('edit', $job)
        <div class="my-10">
            <x-button href="{{ $job->id }}/edit">Edit</x-button>
        </div>
    @endcan
</x-layout>
