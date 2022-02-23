<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Groups') }}
        </h2>
    </x-slot>


    <div class="container">
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
                <div class="p-2 my-5 overflow-hidden">
                    <div class="card bg-white">
                        <h5 class="card-header">
                            <p><img src="{{ url($selectedGroup->image_url) }}" style="display: inline" width="50" height="50" alt="Group Icon">
                                {{ $selectedGroup->title }}
                                <span>
                                  <button type="button" class="col-2 pull-right mt-2 ml-2 btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#addFriendsModal">
                                       Add friends
                                  </button>
                                </span>
                                <span>
                                  <button type="button" class="col-2 pull-right mt-2 btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addExpenseModal">
                                       Add expense
                                  </button>
                                </span>
                            </p>
                        </h5>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addFriendsModal" tabindex="-1" aria-labelledby="addFriendsModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="createGroup" method="POST" action="{{route('groups.add-friends', $selectedGroup->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Select Friends</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label ">Title *</label>
                            <select class="js-example-basic-multiple" name="states[]" multiple="multiple">
                                <option value="AL">Alabama</option>
                                <option value="WY">Wyoming</option>
                            </select>
                            @error('title')
                            <span class="invalid-feedback" role="alert" style="display: inline;">
                                {{ $errors->first('title') }}
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

    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });

    </script>
</x-app-layout>

