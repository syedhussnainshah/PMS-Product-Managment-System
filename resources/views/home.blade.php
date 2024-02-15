@extends('./layouts/Main')
@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-end">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AddProductModal">
                    Add Product
                </button>
                <!-- Modal -->
                <div class="modal fade" id="AddProductModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Add Product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="productName" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" id="productName"
                                        placeholder="Enter Product Name" maxlength="30">
                                    <div id="productNameError" class="text-danger"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="productPrice" class="form-label">Product Price</label>
                                    <input type="number" class="form-control" id="productPrice"
                                        placeholder="Enter Product Price">
                                    <div id="productPriceError" class="text-danger"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="productStock" class="form-label">Product Stock </label>
                                    <input type="number" class="form-control" id="productStock"
                                        placeholder="Enter Product Stock">
                                    <div id="productStockError" class="text-danger"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="productDescription" class="form-label">Product Description</label>
                                    <textarea class="form-control" id="productDescription" rows="3"></textarea>
                                    <div id="productDescriptionError" class="text-danger"></div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success" id="SaveProduct">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="ProductTable">
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="modal fade" id="ViewProductModal" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">View Product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h3 class="mb-4" id="viewProductName">Product Name</h3>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <h6 class="fw-bold">Product Price:</h6>
                                        <p class="text-muted" id="viewProductPrice">Product Price</p>
                                    </div>
                                    <div class="col-6">
                                        <h6 class="fw-bold">Product Stock:</h6>
                                        <p class="text-muted" id="viewProductStock">Product Stock</p>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <h6 class="fw-bold">Description:</h6>
                                    <p class="text-muted" id="viewProductDescription">Description</p>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success" id="SaveProduct">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="modal fade" id="EditProductModal" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <input type="hidden" id="productId">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Edit Product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="editProductName" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" id="editProductName"
                                        placeholder="Enter Product Name" maxlength="30">
                                    <div id="editProductNameError" class="text-danger"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="editProductPrice" class="form-label">Product Price</label>
                                    <input type="number" class="form-control" id="editProductPrice"
                                        placeholder="Enter Product Price">
                                    <div id="editProductPriceError" class="text-danger"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="editProductStock" class="form-label">Product Stock </label>
                                    <input type="number" class="form-control" id="editProductStock"
                                        placeholder="Enter Product Stock">
                                    <div id="editProductStockError" class="text-danger"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="editProductDescription" class="form-label">Product Description</label>
                                    <textarea class="form-control" id="editProductDescription" rows="3"></textarea>
                                    <div id="editProductDescriptionError" class="text-danger"></div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success" id="SaveProduct"
                                    onclick="Update()">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#productDescription').summernote();

        });
    </script>
    <script>
        GetAllProducts();

        function GetAllProducts() {
            $(document).ready(function() {
                $.ajax({
                    type: 'GET',
                    url: '{{ route('index') }}',
                    success: function(response) {
                        $("#ProductTable").html('');
                        $.each(response.data, function(index, product) {
                            $("#ProductTable").append('<tr><td>' + product.name + '</td><td>' +
                                product.price + '</td><td>' + product.stock +
                                '</td><td><div class="btn-group"><button class="btn btn-info" onclick="View(' +
                                product.id +
                                ')">view</button><button class="btn btn-primary" onclick="Edit(' +
                                product.id +
                                ')">Edit</button><button class="btn btn-danger" onclick="Delete(' +
                                product.id + ')">Del</button></div></td></tr>');
                        });
                        new DataTable('#example');
                    },
                    error: function(error) {
                        // Handle error response
                        console.error(error);
                    }
                });
                $('#SaveProduct').click(function() {
                    var productName = $('#productName').val();
                    var productPrice = $('#productPrice').val();
                    var productStock = $('#productStock').val();
                    var productDescription = $('#productDescription').val();
                    // Reset error messages
                    $('.text-danger').empty();

                    // Validation
                    var isValid = true;
                    if (!productName) {
                        $('#productNameError').text('Product Name is required.');
                        isValid = false;
                    }
                    if (!productPrice) {
                        $('#productPriceError').text('Product Price is required.');
                        isValid = false;
                    }
                    if (!productStock) {
                        $('#productStockError').text('Product Stock is required.');
                        isValid = false;
                    } else {
                        if (productStock === 0) {
                            $('#productStockError').text('Product Stock Must be Greater than 0.');
                            isValid = false;
                        }
                    }
                    if (!productDescription) {
                        $('#productDescriptionError').text('Product Description is required.');
                        isValid = false;
                    }
                    if (isValid) {
                        // AJAX form submission
                        $.ajax({
                            type: 'POST',
                            url: '{{ route('store') }}',
                            data: {
                                name: productName,
                                price: productPrice,
                                stock: productStock,
                                description: productDescription
                            },
                            success: function(response) {
                                if (response.message) {
                                    $("#AddProductModal").modal('hide');
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success!',
                                        text: response.message,
                                        confirmButtonColor: '#198754',
                                    });
                                    $('#productName').val('');
                                    $('#productPrice').val('');
                                    $('#productStock').val('');
                                    $('#productDescription').val('');
                                    GetAllProducts();
                                }
                            },
                            error: function(error) {
                                // Handle error response
                                console.error(error);
                            }
                        });
                    }
                });

            });
        }

        function Delete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this product!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(document).ready(function() {
                        $.ajax({
                            url: 'product/' + id,
                            method: 'DELETE',
                            success: function(response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: 'Product deleted successfully.',
                                    confirmButtonColor: '#3085d6',
                                });
                                GetAllProducts();
                            },
                            error: function(xhr, status, error) {
                                // Handle error response
                            }
                        });
                    });
                }
            });
        }

        function View(id) {
            $.ajax({
                url: 'product/' + id, // Replace 'product/' with your actual endpoint for fetching product details
                method: 'GET',
                success: function(response) {

                    console.log(response); // Example: Log the product details to console
                    $("#ViewProductModal").modal('show');
                    $("#viewProductName").html(response.data.name);
                    $("#viewProductPrice").html(response.data.price)
                    $("#viewProductStock").html(response.data.stock);
                    $("#viewProductDescription").html(response.data.description);
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.error(xhr.responseText);
                    // You can show an error message here if needed
                }
            });
        }

        function Edit(id) {
            $.ajax({
                url: 'product/' + id, // Replace 'product/' with your actual endpoint for fetching product details
                method: 'GET',
                success: function(response) {
                    $('#editProductName').val(response.data.name);
                    $('#editProductPrice').val(response.data.price);
                    $('#editProductStock').val(response.data.stock);
                    $('#editProductDescription').val(response.data.description);
                    $('#productId').val(response.data.id);
                    $('#EditProductModal').modal('show');
                    $('#editProductDescription').summernote();
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.error(xhr.responseText);
                    // You can show an error message here if needed
                }
            });
        }

        function Update() {
            var updatedData = {
                name: $('#editProductName').val(),
                price: $('#editProductPrice').val(),
                stock: $('#editProductStock').val(),
                description: $('#editProductDescription').val()
            };
            $('.text-danger').empty();

            // Validation
            var isValid = true;
            if (!updatedData.name) {
                $('#editProductNameError').text('Product Name is required.');
                isValid = false;
            }
            if (!updatedData.price) {
                $('#editProductPriceError').text('Product Price is required.');
                isValid = false;
            }
            if (!updatedData.stock) {
                $('#editProductStockError').text('Product Stock is required.');
                isValid = false;
            } else {
                if (updatedData.price === 0) {
                    $('#editProductStockError').text('Product Stock Must be Greater than 0.');
                    isValid = false;
                }
            }
            if (!productDescription) {
                $('#editProductDescriptionError').text('Product Description is required.');
                isValid = false;
            }
            if (!isValid) {
                return;
            }
            let id = $("#productId").val();


            $.ajax({
                url: 'product/' + id, // Replace 'product/' with your actual endpoint for updating product details
                method: 'PUT', // Use PUT method for updating data
                data: updatedData, // Send updated data in the request body
                success: function(response) {
                    GetAllProducts();
                    $('#EditProductModal').modal('hide');
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    </script>
@endsection

{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
{{-- <div class="container"> --}}
{{--    <div class="row justify-content-center"> --}}
{{--        <div class="col-md-8"> --}}
{{--            <div class="card"> --}}
{{--                <div class="card-header">{{ __('Dashboard') }}</div> --}}

{{--                <div class="card-body"> --}}
{{--                    @if (session('status')) --}}
{{--                        <div class="alert alert-success" role="alert"> --}}
{{--                            {{ session('status') }} --}}
{{--                        </div> --}}
{{--                    @endif --}}

{{--                    {{ __('You are logged in!') }} --}}
{{--                </div> --}}
{{--            </div> --}}
{{--        </div> --}}
{{--    </div> --}}
{{-- </div> --}}
{{-- @endsection --}}
