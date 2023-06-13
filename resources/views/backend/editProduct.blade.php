@include('backend.includes.header')

<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Product</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Product</li>
    </ol>

    <div class="card mb-4">
        <form action="{{ route ('update.product',$product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="form-group mb-3">
                        <label for="">Product Name</label>
                        <input name="product_name" type="text" class="form-control" value="{{ $product->product_name}}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Product Category</label>
                        <select name="Product_category" class="form-control" value = "{{ $product->Product_category}}>
                            <option value=""><--Select Category--></option>
                            <option value="Mobile">Mobile</option>
                            <option value="Freeze">Freeze</option>
                            <option value="TV">TV</option>
                            <option value="Laptop">Laptop</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Product Brand</label>
                        <select name="product_brand" class="form-control" value = "{{ $product->product_brand}}>
                            <option value=""><--Select Brand--></option>
                            <option value="Oppo">Oppo</option>
                            <option value="Walton">Walton</option>
                            <option value="Samsung">Samsung</option>
                            <option value="Mac">Mac</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Product Description</label>
                        <textarea name="product_description"class="form-control" cols="30" rows="5">{{ $product->product_description }}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Product Image</label>
                        <input name="product_image" class="form-control" type="file" value="{{ $product->product_image}}" />
                </div>
                <div class="form-group mb-3">
                    <input name="" class="btn btn-info" type="submit" value="Update Product"/>
                </div>
            </div>
        </form>
    </div>
</div>
@include('backend.includes.footer')
