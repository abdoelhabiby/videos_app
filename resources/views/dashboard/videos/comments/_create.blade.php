<form action="{{route('dasboard.video.comment.store')}}" method="post">
    @csrf

    <input type="hidden" name="video_id" value="{{$row->id}}">
    <div class="form-group">
        @php
        $input = 'comment';
        @endphp

        <textarea type="text" rows="4" id="{{ $input }}" class="form-control" placeholder="add {{ $input }}   "
            name="{{ $input }}">{{ old($input) }}</textarea>

        @error($input)
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-info">
             add
        </button>
    </div>
</form>
