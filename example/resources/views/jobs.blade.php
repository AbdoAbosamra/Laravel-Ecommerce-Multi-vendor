<x-layout>
    <x-slot:heading>
        Home Page
    </x-slot:heading>
    <ul>
        @foreach($jobs as $job)
            <a href="/jobs/1">
                <li><strong>{{$job['title']}} : pays {{$job['salary']}} Per years</strong></li>
            </a>
        @endforeach
    </ul>

</x-layout>
