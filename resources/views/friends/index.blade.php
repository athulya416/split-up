<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Friends') }}
        </h2>
    </x-slot>


    <div class="container">
        <div class="row">
            <button type="button" class="col-2 right-0 mt-3 btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Friends</button>
           <div class="p-6 my-5 bg-white overflow-hidden shadow-sm sm:rounded-lg">
               <table class="table">
                   <thead>
                   <tr>
                       <th scope="col">Name</th>
                       <th scope="col">Email</th>
                   </tr>
                   </thead>
                   <tbody>
                   @foreach($friends as $friend)
                   <tr>
                       <td>{{ $friend->name }}</td>
                       <td>{{ $friend->email }}</td>
                   </tr>
                   @endforeach
                   </tbody>
               </table>
           </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form name="addFriends" method="POST" action="{{route('friends.store')}}">
                 @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Friends</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" required aria-describedby="name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" required aria-describedby="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
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
