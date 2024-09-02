<x-layout>
    <div class="card">
        <div class="card-header">
            <h3>Edit Contact</h3>
        </div>
        <div class="card-body">
            <div id="defaultLayout animated fadeInDown">
                <div class="form">
                    <form action="{{url('/contact/update/'.$contact->id)}}" method="post">
                        @csrf
                        @method('put')
                        <label>Phone</label>
                        <input type="text" value="{{$contact->phone}}" name="phone" placeholder="Phone">
                        @error('phone')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        <label>Name</label>
                        <input type="text" value="{{$contact->name}}" name="name" placeholder="Name">
                        <label>Email</label>
                        <input type="email" value="{{$contact->email}}" name="email" placeholder="Email">
                        <label>Group</label>
                        <input type="text" value="{{$contact->group}}" name="group" placeholder="Group[family, friend]">
                        <label>Website</label>
                        <input type="text" value="{{$contact->website}}" name="website" placeholder="Website">
                        <button type="submit" class="btn btn-sm btn-warning">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
