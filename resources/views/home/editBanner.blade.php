@extends('layouts.app')

@section('content')
@include('layouts.navbar.topnav')
<style>
#selected-images-container {
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
<div class="content-body">
    <div class="container-fluid">
        <!-- Add Project -->
        <!-- row -->
        <div class="row">
            <div class="col-xl-4 col-xxl-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Banner</h4>
                    </div>
                    <div class="card-body">
                        @foreach($bannerInfos as $bannerInfo)
                        <form action="{{ route('banner.update') }}" method="POST" id="form" enctype="multipart/form-data">
                            @csrf
                            <input type = "hidden" name = "id" value = "{{$bannerInfo['id']}}">
                            <input type = "hidden" name = "existingImage" id = "existingImage">
                            <div class="row">
                                <div class="col-lg-12 mb-2">
                                    <div class="form-group">
                                        <label for="name" id="name">
                                            Name
                                        </label>
                                        <input type="text" class="form-control" name="name" id="name" value="{{$bannerInfo['name']}}" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-2">
                                    <div class="form-group">
                                        <label for="name" id="name">
                                            Status
                                        </label>
                                        <select class="form-select form-control" name="status" id="status" aria-label="Default select example">
                                            <option value="1" {{ $bannerInfo['status'] == 1 ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ $bannerInfo['status'] == 0 ? 'selected' : '' }}>In-Active</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-2">
                                    <div class="form-group">
                                        <input type="file" name="images[]" id="image-upload-input" multiple hidden>
                                        <label for="image-upload-input" id="image-upload-label">
                                            <i class="fas fa-upload"></i> Choose Images
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-2">
                                    <div class="form-group float-end">
                                        <button type="submit" class="btn btn-primary btn-md">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-xxl-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Selected Images</h4>
                    </div>
                    <div class="card-body" id="selected-images-container" style="padding:5px;">

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    // document.addEventListener('DOMContentLoaded', function() {
    //     var images = <?php echo json_encode($bannerInfo['images']); ?>;
    //     const container = document.getElementById('selected-images-container');
    //     container.innerHTML = '';    
    //     images.forEach(function(imageUrl, index) {
    //         const listItem = document.createElement('li');
    //         listItem.className = 'image-preview';
    //         const img = document.createElement('img');
    //         img.setAttribute('src', imageUrl);
    //         img.style.minWidth = '230px';
    //         img.style.minHeight = '120px';
    //         img.style.maxWidth = '230px';
    //         img.style.maxHeight = '120px';
    //         img.style.padding = '5px';
    //         img.style.color = 'black';
    //         listItem.appendChild(img);

    //         const removeBtn = document.createElement('button');
    //         removeBtn.className = 'remove-image';
    //         removeBtn.innerHTML = '&times;';
    //         removeBtn.addEventListener('click', function() {
    //             listItem.remove();
    //             images.splice(index, 1);
    //             updateImageInput();
    //         });
    //         listItem.appendChild(removeBtn);
    //         container.appendChild(listItem);
    //     });
    //     function updateImageInput() {
    //         imageInput.value = JSON.stringify(images); // Update the input field with the updated images array
    //     }
    // });

    document.addEventListener('DOMContentLoaded', function() {
        var images = <?php echo json_encode($bannerInfo['images']); ?>;
        const container = document.getElementById('selected-images-container');
        const imageInput = document.getElementById('existingImage');
        container.innerHTML = '';    

        function addImage(imageUrl) {
            const listItem = document.createElement('li');
            listItem.className = 'image-preview';
            const img = document.createElement('img');
            img.setAttribute('src', imageUrl);
            img.style.minWidth = '230px';
            img.style.minHeight = '120px';
            img.style.maxWidth = '230px';
            img.style.maxHeight = '120px';
            img.style.padding = '5px';
            img.style.color = 'black';
            listItem.appendChild(img);

            const removeBtn = document.createElement('button');
            removeBtn.className = 'remove-image';
            removeBtn.innerHTML = '&times;';
            removeBtn.addEventListener('click', function() {
                listItem.remove();
                images.splice(images.indexOf(imageUrl), 1); // Remove the image URL from the array
                updateImageInput(); // Update the image input field
            });
            listItem.appendChild(removeBtn);
            container.appendChild(listItem);
        }

        function updateImageInput() {
            imageInput.value = images; // Update the input field with the updated images array
        }

        images.forEach(function(imageUrl) {
            addImage(imageUrl);
        });

        document.getElementById('image-upload-input').addEventListener('change', function() {
            Array.from(this.files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const imageUrl = e.target.result;
                    images.push(imageUrl); // Add the image URL to the array
                    addImage(imageUrl);
                    updateImageInput(); // Update the image input field
                };
                reader.readAsDataURL(file);
            });
        });
    });


    document.addEventListener('DOMContentLoaded', function(){
        document.getElementById('image-upload-input').addEventListener('change', function() {
            const container = document.getElementById('selected-images-container');
            Array.from(this.files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const listItem = document.createElement('li');
                    listItem.className = 'image-preview';
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.setAttribute('style', 'min-width:230px;min-height:120px;max-width:230px;max-height:120px');
                    listItem.appendChild(img);
                    const removeBtn = document.createElement('button');
                    removeBtn.className = 'remove-image';
                    removeBtn.innerHTML = '&times;';
                    removeBtn.addEventListener('click', function() {
                        listItem.remove();
                    });
                    listItem.appendChild(removeBtn);

                    container.appendChild(listItem);
                };
                reader.readAsDataURL(file);
            });
        });
    });
</script>
@endsection