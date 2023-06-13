@include('backend.includes.header')
<div class="card my-5">
    <div class="card">
     <div class="card-header">
         <h2 class="card-title">All Users</h2>
     </div>
     <div class="card-body">
         <div class="table-responsive">
             <table class="table table-striped
             table-hover
             table-borderless
             table-primary
             align-middle">
                 <thead class="table-light">
                     <tr>
                         <th>#SL:</th>
                         <th>User Name</th>
                         <th>User Email</th>
                         <th>User Role</th>
                         <th>User Status</th>
                         <th>User Action</th>
                     </tr>
                     </thead>
                     <tbody class="table-group-divider">

                         @foreach ($users as $user)
                             <tr class="table-primary" >
                                 <td scope="row">{{$user->id}}</td>
                                 <td scope="row">{{$user->name}}</td>
                                 <td scope="row">{{$user->email}}</td>
                                 <td scope="row">{{$user->role}}</td>
                                 <td scope="row">{{$user->status}}</td>

                                 <td>
                                     <a href="" class="btn btn-info btn-sm">Edit</a>
                                     <a href="" class="btn btn-danger btn-sm">Delete</a>
                                 </td>
                             </tr>
                         @endforeach
                     </tbody>
                     <tfoot>
                         <tr>
                            <th>#SL:</th>
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>User Role</th>
                            <th>User Status</th>
                            <th>User Action</th>
                         </tr>
                     </tfoot>
             </table>
         </div>


     </div>
     <div class="card-footer text-muted">
         Manage user
     </div>
    </div>
 </div>
@include('backend.includes.footer')
