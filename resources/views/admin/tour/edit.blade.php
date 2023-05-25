<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Otika - Admin Dashboard Template</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="/assets/assets/css/app.min.css">
    <link rel="stylesheet" href="/assets/assets/bundles/dropzonejs/dropzone.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/assets/css/style.css">
    <link rel="stylesheet" href="/assets/assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="/assets/assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <!-- Main Content -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-haeder">
                                <h4>Edit Tours
                                    <a href="{{ url('/tour') }}" class="btn btn-primary float-end">BACK</a>
                                </h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ url('admin/tours') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="">Tour name (uz)</label>
                                        <input type="text" value="{{$tour->name_uz}}" name="name_uz" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Tour name (ru)</label>
                                        <input type="text" value="{{$tour->name_ru}}" name="name_ru" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Tour name (en)</label>
                                        <input type="text" value="{{$tour->name_en}}" name="name_en" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Tour teaser (uz)</label>
                                        <input type="text" value="{{$tour->teaser_uz}}" name="teaser_uz" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Tour teaser (ru)</label>
                                        <input type="text" value="{{$tour->teaser_ru}}" name="teaser_ru" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Tour teaser (en)</label>
                                        <input type="text" value="{{$tour->teaser_en}}" name="teaser_en" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Description (uz)</label>
                                        <input type="text" value="{{$tour->description_uz}}" name="description_uz" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Description (ru)</label>
                                        <input type="text" value="{{$tour->description_ru}}" name="description_ru" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Description (en)</label>
                                        <input type="text" value="{{$tour->description_en}}" name="description_en" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Price</label>
                                        <input type="number" value="{{$tour->price}}" name="price" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Month</label>
                                        <input type="number" value="{{$tour->month}}" name="month" class="form-control">
                                    </div>
                                    <div class="mb-3">Country </label>
                                        <select name="country_id" class="form-control">
                                            @foreach ($country as $item)
                                                <option value="{{ $item->id }}">{{ $item->name_uz }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Category</label>
                                        <div class="selectgroup selectgroup-pills">
                                            @foreach ($category as $item)
                                                <label class="selectgroup-item">
                                            <input type="checkbox" name="tour_categories[]" value="{{$item->id}}" class="selectgroup-input" checked>
                                            <span class="selectgroup-button">{{$item->name_uz}}</span>
                                          </label>
                                            @endforeach
                                          
                                        </div>
                                      </div>
                                    <div class="mb-3">
                                        <label for="">Image</label>
                                        <input type="file" name="image[]" multiple class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- General JS Scripts -->
            <script src="/assets/assets/js/app.min.js"></script>
            <!-- JS Libraies -->
            <script src="/assets/assets/bundles/dropzonejs/min/dropzone.min.js"></script>
            <!-- Page Specific JS File -->
            <script src="/assets/assets/js/page/multiple-upload.js"></script>
            <!-- Template JS File -->
            <script src="/assets/assets/js/scripts.js"></script>
            <!-- Custom JS File -->
            <script src="/assets/assets/js/custom.js"></script>
</body>

</html>
