<x-app-layout>
    <div class="movie-info bg-cover bg-no-repeat" style="background-image: url('{{ 'https://image.tmdb.org/t/p/original/' . $movie['backdrop_path'] }}')">
        <div style="background-image: linear-gradient(to right, rgba(7.84%, 8.63%, 9.80%, 1.00) 150px, rgba(7.84%, 8.63%, 9.80%, 0.84) 100%)">
            <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
                <div class="flex-none">
                    <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] }}" class="w-72"/>
                </div>
                <div class="md:ml-24">
                    <h2 class="text-4xl font-semibold text-white">{{ $movie['name'] }}</h2>
                    <div class="flex items-center text-gray-400 text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <span class="ml-1">{{ $movie['vote_average'] * 10 . '%' }}</span>
                        <span class="mx-2">|</span>
{{--                        <span>{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, y') }}</span>--}}
                        <span class="mx-2">|</span>
                        <span>
                            @foreach ( $movie['genres'] as $genres )
                                {{ $genres['name'] }} @if (!$loop->last), @endif
                            @endforeach
                        </span>
                    </div>
                    <div class="mt-4">
                        <h4 class="font-bold text-2xl text-white">Overview</h4>
                        <p class="text-gray-100">{{ $movie['overview'] }}</p>
                    </div>
                    <div class="mt-12">
                        <div class="flex mt-4">
                            @foreach ($movie['credits']['crew'] as $crew)
                                @if ($loop->index < 3)
                                    <div class="mr-12">
                                        <div class="text-white font-semibold">{{ $crew['name'] }}</div>
                                        <div class="text-sm text-gray-100">{{ $crew['job'] }}</div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="mt-12">
                        <div x-data="{ isOpen: false }">
                            @if (count($movie['videos']['results']) > 0)
                                <div class="mt-12">
                                    <button
                                        @click="isOpen = true"
                                        class="flex inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150"
                                    >
                                        <svg class="w-6 fill-current" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                                        <span class="ml-2">Play Trailer</span>
                                    </button>
                                </div>

                                <template x-if="isOpen">
                                    <div
                                        style="background-color: rgba(0, 0, 0, .5);"
                                        class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                                    >
                                        <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                                            <div class="bg-gray-900 rounded">
                                                <div class="flex justify-end pr-4 pt-2">
                                                    <button
                                                        @click="isOpen = false"
                                                        @keydown.escape.window="isOpen = false"
                                                        class="text-3xl leading-none hover:text-gray-300">&times;
                                                    </button>
                                                </div>
                                                <div class="modal-body px-8 py-8">
                                                    <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
                                                        <iframe class="responsive-iframe absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            @endif


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="movie-image">
        <div class="container mx-auto px-4 py-16">
            <h2 class="capitalize text-white text-2xl font-semibold">Image</h2>
            <div class="grid lg:grid-cols-4 gap-8">
                @foreach ($movie['images']['backdrops'] as $image)
                    @if ($loop->index < 8)
                        <div class="mt-8">
                            <a href="#">
                                <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $image['file_path'] }}" class="hover:opacity-50 transition ease-in-out duration-150 rounded-lg"/>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>



    <div class="movie-cast">
        <div class="container mx-auto px-4 py-16">
            <h2 class="capitalize text-white text-2xl font-semibold">Top Billed Cast</h2>
            <div class="grid lg:grid-cols-7 gap-8">
                @foreach ($movie['credits']['cast'] as $cast)
                    @if ($loop->index < 7)
                        <div class="mt-8">
                            <a href="#">
                                <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $cast['profile_path'] }}" class="hover:opacity-50 transition ease-in-out duration-150 rounded-lg"/>
                            </a>
                            <div class="mt-2">
                                <a href="#" class="text-md pt-4 text-white font-semibold hover:text-yellow-500">{{ $cast['name'] }}</a>
                                <div class="text-sm text-gray-400">
                                    {{ $cast['character'] }}
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <div class="movie-recommendation">
        <div class="container mx-auto px-4 py-16">
            <h2 class="capitalize text-white text-2xl font-semibold">Recommendations</h2>
            <div class="grid lg:grid-cols-7 gap-8">
                @foreach ($movieRecommendations as $movie)
                    @if ($loop->index < 4)
                        <div class="mt-8">
                            <a href="{{ route('tv.show', $movie['id']) }}">
                                <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] }}" class="hover:opacity-50 transition ease-in-out duration-150 rounded-lg"/>
                            </a>
                            <div class="mt-2">
                                <a href="{{ route('tv.show', $movie['id']) }}" class="text-md pt-4 text-white font-semibold hover:text-yellow-500">
                                    {{ $movie['name'] }}
                                </a>
                                <div class="flex items-center text-gray-400 text-sm">
{{--                                    <span>{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, y') }}</span>--}}
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
