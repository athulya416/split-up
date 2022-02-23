<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Groups') }}
        </h2>
    </x-slot>


    <div class="container">
        <button type="button" class="col-2 right-0 mt-3 btn btn-info" data-bs-toggle="modal" data-bs-target="#groupModal">
            Create Group
        </button>
        <div class="row">
            @if ($groups->count() > 1)
                <div class="col-3">
                    <div class="p-6 my-5 bg-white overflow-hidden shadow-sm ">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Groups</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($groups as $group)
                                <tr>
                                    <td>
                                        <a href="{{ route('groups.show', $group->id) }}">
                                            <p><img src="{{ url($group->image_url) }}" style="display: inline" width="50" height="50" alt="Group Icon">  {{ $group->title }}</p>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-9">
                    <div class="p-6 my-5 bg-white overflow-hidden shadow-sm ">
                        <div class="card">
                            <div class="card-header">
                                {{--                            Featured--}}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="groupModal" tabindex="-1" aria-labelledby="groupModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="createGroup" method="POST" action="{{route('groups.store')}}" enctype="multipart/form-data">
                 @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Group</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Title *</label>
{{--                            <x-inputs.friends id="friend_id"  class=" w-200">--}}
{{--                                @if (request()->filled('friend_id') && request()->filled('friend_text'))--}}
{{--                                    <option value="{{ old('friend_id', request()->input('friend_id')) }}" selected>--}}
{{--                                        {{ old('friend_id', request()->input('friend_text')) }}--}}
{{--                                    </option>--}}
{{--                                @endif--}}
{{--                            </x-inputs.friends>--}}
                            @error('title')
                            <span class="invalid-feedback" role="alert" style="display: inline;">
                                {{ $errors->first('title') }}
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Group Icon</label>
                            <input type="file" name="image" class="form-control" id="image"  aria-describedby="image">
                            @error('image')
                            <span class="invalid-feedback" role="alert" style="display: inline;">
                                {{ $errors->first('image') }}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary bg-gray-800" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
