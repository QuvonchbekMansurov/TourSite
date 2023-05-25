<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tour info</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if (session('message'))
                    <div style="background: turquoise" class="alert aletr-success">{{ session('message') }}</div>
                @endif

                <div class="card">
                    <div class="card-haeder">
                        <h4>Products Details </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Teaser</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Country</th>
                                    <th>Sale</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $tour_info->id }}</td>
                                    <td>{{ $tour_info->name_uz }}</td>
                                    <td>{{ $tour_info->teaser_uz }}</td>
                                    <td>{{ $tour_info->description_uz }}</td>
                                    <td>{{ $tour_info->price }}</td>
                                    <td>{{ $tour_info->country->name_uz }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>{{ $tour_info->name_ru }}</td>
                                    <td>{{ $tour_info->teaser_ru }}</td>
                                    <td>{{ $tour_info->description_ru }}</td>
                                    <td></td>
                                    <td>{{ $tour_info->country->name_ru }}</td>

                                </tr>
                                <tr>
                                    <td></td>
                                    <td>{{ $tour_info->name_en }}</td>
                                    <td>{{ $tour_info->teaser_en }}</td>
                                    <td>{{ $tour_info->description_en }}</td>
                                    <td></td>
                                    <td>{{ $tour_info->country->name_en }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

</body>

</html>
