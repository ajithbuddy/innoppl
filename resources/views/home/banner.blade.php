@extends('layouts.app')

@section('content')
@include('layouts.navbar.topnav')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
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

            <div class="col-7">
                <div class="card col-md-12" style = "position: relative;">
                    <?php if( app('App\helper\CustomHelper')->checkPermission('employee-add') ){?>
                    <div class="card-header">
                        <h4 class="card-title">Banner List</h4>
                        <a class="add-project-sidebar btn btn-primary" href="{{ route('home.addBanner') }}">+ Add Banner</a>
                    </div>
                 <?php }?>
                    <div class="card-body">
                        <div class="table-responsive" style = "overflow-y: hidden;">
                            <table id="example4" class="display">
                                <thead>
                                    <tr>
                                    <tr>
                                        <th></th>
                                        <th>Banner Name</th>
                                        <th>status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    foreach($banners as $banner){ ?>
                                        <tr>
                                            
                                            <td><input type="checkbox" class="imageCheckbox" data-images="{{ json_encode($banner['images']) }}"
                                                data-name="{{ $banner['name'] }}"
                                                data-id="{{ $banner['id'] }}"
                                                data-status="{{ $banner['status'] }}">
                                            </td>
                                            <td>{{$banner["name"]}}</td>
                                            <td>
                                                <button class="btn @if($banner['status'] == 1) btn-success @else btn-danger @endif">
                                                    {{ $banner['status'] == 1 ? 'Active' : 'Inactive' }}
                                                </button>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
                                                        <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                                <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                                <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                            </g>
                                                        </svg>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" data-toggle="modal"
                                                            data-target="#employeeDetailsModal">Active</a>
                                                        <a class="dropdown-item" href="">In-Active</a>
                                                        <a class="dropdown-item" href="{{ route('home.editBanner', ['id' => $banner['id']]) }}">Edit</a>
                                                        <a class="dropdown-item" href="{{ route('home.destroyBanner', ['id' => $banner['id']]) }}">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-5">
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
<script type="text/javascript">
  $(document).ready(function() {
    setTimeout(function () {
        // Closing the alert
        $('.alert').alert('close');
    }, 5000);

    $(document).ready(function() {
        $('#assign_artist').change(function() {
            var selectedText = $(this).find('option:selected').text();
            $('#artist_name').val(selectedText);
        });

        $('#assign_admin').change(function() {
            var selectedText = $(this).find('option:selected').text();
            $('#lead_name').val(selectedText);
        });

        $('.imageCheckbox').on('change', function() {
            $('.imageCheckbox').not(this).prop('checked', false);
            if ($(this).is(':checked')) {
                $('#selectedRowImages').empty();
                var images = $(this).data('images');
                var name = $(this).data('name');
                var id = $(this).data('id');
                var status = $(this).data('status');
                displayImages(images, name, id, status);
            } else {
                // Remove images from preview container if checkbox is unchecked
                var id = $(this).data('id');
                $('#selectedRowImages').find('.image-preview[data-id="' + id + '"]').remove();
            }
        });

        function displayImages(images, name, id, status) {
            var container = $('#selectedRowImages');
            images.forEach(function(imageUrl) {
                var img = $('<img>').attr('src', imageUrl).css({ 'min-width': '230px', 'min-height': '120px', 'max-width': '230px', 'max-height': '120px',"padding":"5px" });

                container.append(img);
            });
        }
    });

    
});
</script>