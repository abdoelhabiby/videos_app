@if (getPlaylistLatestHome()->count() > 0)

    <div class="section ">
        <div class="container">
            <h3 class="mt-1 mb-3 text-center h2">Latest Playlist</h3>
            <div class="row">

                @foreach (getPlaylistLatestHome() as $row)
                    <div class="col-md-4">
                        <div class="card" style="width: 20rem;">
                            <img class="card-img-top" src="{{ asset($row->image) }}" style="height: 300px"
                                alt="Card image cap">
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="m-0">{{ $row->name }}</h3>

                                    <button class="btn btn-outline-info btn-sm mb-2"
                                        style="cursor: auto">{{ $row->videos()->published()->count() }}
                                        videos</button>
                                </div>
                                <p class="card-text">{{ Str::limit($row->description, 200) }}</p>
                                <div class="text-center">
                                    <a href="{{ route('front.playlist.show', $row->id) }}"
                                        class="btn btn-danger btn-round">videos</a>

                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
            <br>

        </div>
    </div>
@endif
