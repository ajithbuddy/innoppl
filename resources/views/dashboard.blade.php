@extends('layouts.app')

@section('content')
@include('layouts.navbar.topnav')

<style>
.no-word-break {
    overflow-wrap: normal;
    word-wrap: normal;
    white-space: nowrap; /* Optional: Prevent wrapping of long content */
}

#selectedRowImages {
    list-style: none;
    padding: 0;
    margin-top: 10px;
    display: flex;
    flex-wrap: wrap;
}


.image-preview {
    position: relative;
    margin-right: 10px;
    margin-bottom: 10px;
}

.image-preview img {
    max-width: 100px;
    max-height: 100px;
    object-fit: cover;
}

.remove-image {
    position: absolute;
    top: 5px;
    right: 5px;
    background-color: rgba(0, 0, 0, 0.5);
    color: #fff;
    border: none;
    border-radius: 20%;
    padding: 6px;
    cursor: pointer;
}


</style>



<link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.1/css/responsive.dataTables.css">
<div class="content-body ">
    <div class="container-fluid">
        <!-- Add Project -->
        <!-- row -->
        <div class="row">
            
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            @if(session('failed'))
            <div class="alert alert-danger">
                {{ session('failed') }}
            </div>
            @endif
            
            <div class="col-8">
                <div class="card col-md-12" style = "position: relative;">
                    <?php if( app('App\helper\CustomHelper')->checkPermission('employee-add') ){?>
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Product List</h4>
                            <div class="d-flex align-items-center">
                                <!-- <button class="btn btn-success mr-4" href="{{ route('product.add') }}">Sample Excel File</button> -->
                                <a type="button" class="btn btn-success text-right" style="margin-right: 5px;" href="{{ url('public/images/productUpload.xlsx') }}" download>Sample Excel File</a>
                                <!-- Form for uploading the Excel file -->
                                <form action="{{ route('product.import') }}" method="post" enctype="multipart/form-data" class="mr-4">
                                    @csrf
                                    <input type="file" name="file" id="fileInput" accept=".xlsx" style="display: none;"  onchange="document.getElementById('submit').click();">
                                    <button type="button" class="btn btn-success mt-3   text-right" onclick="document.getElementById('fileInput').click();">Upload Excel</button>
                                    <button type="submit" class="btn btn-primary" style="display: none;" id = "submit">Upload</button>
                                </form>
                            </div>
                            <a class="btn btn-primary"  href="{{ route('product.add') }}">+ Add Product</a>
                        </div>
                 <?php }?>
                    <div class="card-body">
                    <!-- <div class = "col-md-12 col-xl-12 col-xxl-12">
                        <div class  = "row">
                            <div class = "col-md-6 col-xl-6 col-xxl-6">
                                <a class="add-project-sidebar btn btn-primary" class = "text-left" href="{{route('product.add')}}">+ Add Product</a>
                            </div>
                            <div class = "col-md-6 col-xl-6 col-xxl-6">
                                <a class="add-project-sidebar btn btn-primary" class = "text-right" href="{{route('product.add')}}">+ Add Product</a>
                            </div>
                        </div>
                    </div> -->
                    <table id="productTable" class="display">
                        <thead>
                            <tr>
                                <th>view images</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>SKU</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody id = "productTableBody">
                        </tbody>
                    </table>
                    
                    </div>
                </div>
            </div>
            <div class="col-4">
            <div class="card col-md-12" style = "position: relative;">
                    <div class="card-header">
                        <h4 class="card-title">Image List</h4>
                    </div>
                    <div class="card-body " id =  "selectedRowImages">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.1/js/dataTables.responsive.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.1/js/responsive.dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    setTimeout(function () {
        // Closing the alert
        $('.alert').alert('close');
    }, 5000);

    $(document).on('change', '.imageCheckbox', function() {
        $('.imageCheckbox').not(this).prop('checked', false);
        if ($(this).is(':checked')) {
            $('#selectedRowImages').empty();
            var images = $(this).data('images');
            var name = $(this).data('name');
            var id = $(this).data('id');
            var status = $(this).data('status');

            // Convert images to an array if it's a string
            if (typeof images === 'string') {
                images = images.split(',');
            }
            displayImages(images, name, id, status);
        } else {
            // Remove images from preview container if checkbox is unchecked
            $('#selectedRowImages').empty();
            var id = $(this).data('id');
            $('#selectedRowImages').find('.image-preview[data-id="' + id + '"]').remove();
        }
    });
    $(document).ready(function() {
        new DataTable('#productTable', {
            ajax: {
                url: "{{ route('products.index') }}",
                type: "GET",
                dataType: "json",
                dataSrc: "" // Use an empty string since your data is not nested under a specific key
            },
            columns: [
                {
                    data: null,
                    render: function(data, type, row) {
                        return '<input type="checkbox" class="imageCheckbox" data-images="' + row.images + '" ' +
                                'data-name="' + row.name + '" ' +
                                'data-id="' + row.id + '" ' +
                                'data-status="' + row.price + '" ' +
                                'data-status="' + row.sku + '" ' +
                                'data-status="' + row.description + '" ' +
                                '>';
                    }
                },
                { data: 'name' },
                { data: 'price' },
                { data: 'sku' },
                { data: 'description' }
            ],
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'pdf'
            ],
            paging: true, // Enable pagination
            pageLength: 10, // Set the number of rows per page
        });
    });

    function displayImages(images, name, id, status) {
        var container = $('#selectedRowImages');
        
        images.forEach(function(imageUrl) {
            var img = $('<img>').attr('src', imageUrl).css({ 'min-width': '210px', 'min-height': '120px', 'max-width': '210px', 'max-height': '120px',"padding":"5px" });
            container.append(img);
        });
    }

    
    
});
</script>