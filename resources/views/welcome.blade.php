<!DOCTYPE html>
<html>

<head>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:200,400,500,600,700,900" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet" href="styles.css">
    <title>3D Kustomisasi</title>

    @include('partials.navbar')

    <div class="container mt-4">
        @yield('container')
    </div>



</head>

<style>
.column {
    border: 1px solid #ddd;
    padding: 8px;
    margin: 2px;
}
</style>

<body>
    <h1 class="row justify-content-center mb-5">Pilih kategori yang akan di kostumisasi</h1>
    <div class="container mt-5">
        <div class="row justify-content-center  text-center">
            <div class="col-md-4 row justify-content-center mb-5">
                <div class="column">
                    <h2>Meja</h2>
                    <p>Furnitur Meja.</p>
                    <x3d width="230px" height="140px">
                        <scene>
                            <inline mapDEFToID="true" url="mejap.x3d"></inline>
                        </scene>
                    </x3d>
                    <h2><a href="/meja">Pilih Meja</a></h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="column">
                    <h2>Lemari</h2>
                    <p>Furnitur Lemari.</p>
                    <x3d width="230px" height="140px">
                        <scene>
                            <inline mapDEFToID="true" url="lemaric1.x3d"></inline>
                        </scene>
                    </x3d>
                    <h2><a href="">Pilih Lemari</a></h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="column">
                    <h2>Rak</h2>
                    <p>Furnitur Rak.</p>
                    <x3d width="230px" height="140px">
                        <scene>
                            <inline mapDEFToID="true" url="rak2.x3d"></inline>
                        </scene>
                    </x3d>
                    <h2><a href="/rak">Pilih Rak</a></h2>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<br><br><br>
<br><br><br>
<footer>
    @include('partials.footer')

    <div class="container mt-4">
        @yield('container')
    </div>
</footer>


</html>
