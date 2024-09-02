<x-layout>
    <div class="card animated fadeInDown shadow">
        <div class="card-header">
            <h3>List Contacts
           <a href="{{url('add-contact')}}" class="btn btn-warning float-end btn-sm">+Add</a>
            </h3>
        </div>
        @if(session('success'))
            <div class="alert alert-success">
                <p>{{session('success')}}</p>
            </div>
        @endif
        <div class="card-body">
           <table class="table table-bordered table-striped">
               <thead>
               <tr>
                   <th>#</th>
                   <th>Name</th>
                   <th>Phone</th>
                   <th>Email</th>
                   <th>Website</th>
                   <th>Action</th>
               </tr>
               </thead>
               <tbody>
               @foreach($contacts as $contact)
               <tr>
                   <td>{{$loop->iteration}}</td>
                   <td>{{$contact->name}}/{{$contact->group}}</td>
                   <td><i class="fa fa-phone"></i> {{$contact->phone}}</td>
                   <td>{{$contact->email}}</td>
                   <td>{{$contact->website}}</td>
                   <td>
                       <a href="{{url('contact/edit/'.$contact->id)}}" class="btn btn-sm btn-warning">Edit</a>
                       <form method="post" action="{{url('contact/delete/'.$contact->id)}}" class="d-inline">
                           @csrf
                           @method('delete')
                           <button type="submit" onclick="return confirm('are sure want to delete ?')" class="btn btn-sm btn-outline-danger">Delete</button>

                       </form>
                   </td>
               </tr>
               @endforeach
               </tbody>
           </table>
        </div>

        <p>Total contact  {{count($contacts)}}</p>
    </div>
</x-layout>
