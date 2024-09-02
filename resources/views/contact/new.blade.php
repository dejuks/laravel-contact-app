<x-layout>
    <div class="card">
        <div class="card-header">
            <h3>Create New Contact</h3>
        </div>
        <div class="card-body">
            <div id="defaultLayout animated fadeInDown">
                <div class="form">
                    <form action="{{url('contact-save')}}" method="post">
                        @csrf

                        <label>Phone</label>
                        <input type="text" name="phone" placeholder="Phone">
                        @error('phone')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        <label>Name</label>
                        <input type="text" name="name" placeholder="Name">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Email">
                        <label>Group</label>
                        <input type="text" name="group" placeholder="Group[family, friend]">
                        <label>Website</label>
                        <input type="text" name="website" placeholder="Website">
                        <button type="submit" class="btn btn-sm btn-info">Save</button>


                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
