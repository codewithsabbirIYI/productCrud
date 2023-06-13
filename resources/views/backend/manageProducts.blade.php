@include('backend.includes.header')
<div class="card my-5">
   <div class="card">
    <div class="card-header">
        <h2 class="card-title">All Product</h2>
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
                        <th>Product Name</th>
                        <th>Product Category</th>
                        <th>Product Brand</th>
                        <th>Product Description</th>
                        <th>Product Image</th>
                        <th>Product Status</th>
                        <th>Product Action</th>
                    </tr>
                    </thead>
                    <tbody class="table-group-divider">

                        @foreach ($products as $product)
                            <tr class="table-primary" >
                                <td scope="row">{{$product->id}}</td>
                                <td scope="row">{{$product->product_name}}</td>

                                <td>{{$product->Product_category}}</td>
                                <td>{{$product->product_brand}}</td>
                                <td>{{$product->product_description}}</td>
                                <td>{{$product->product_image}}</td>
                                <td>@if ($product->status === 1)
                                    Active
                                @else
                                    Inactive
                                @endif</td>
                                <td>
                                    <a href="{{ route('edit.product', $product->id) }}" class="btn btn-info btn-sm">Edit</a>
                                    <a href="{{route('delete.product', $product->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#SL:</th>
                        <th>Product Name</th>
                        <th>Product Category</th>
                        <th>Product Brand</th>
                        <th>Product Description</th>
                        <th>Product Image</th>
                        <th>Product Status</th>
                        <th>Product Action</th>
                        </tr>
                    </tfoot>
            </table>
        </div>


    </div>
    <div class="card-footer text-muted">
        Manage Product
    </div>
   </div>
</div>

@include('backend.includes.footer')
