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
    <title>Meja Bulat</title>

    @include('partials.navbar')

    <div class="container mt-4">
        @yield('container')
    </div>



</head>

<style>
.column {
    border: 2px solid #ddd;
    padding: 10px;
    margin: 6px;
}
.custom-kaki, .custom-papan {
  border: 1px solid #ddd;
  padding: 10px;
  width: 300px;
}
.container {
  display: flex;
  justify-content:center;
  flex-flow: row wrap;
}
</style>

<body>
    <div class="m-6">
        <div align="center">
        <h1 class="text-4xl text-yellow-400">Pilih Part Meja Anda</h1>
        </div>
        <div class="container">
            <div class="custom-papan" >
                <h3 class="text-2xl">Papan</h3>
                <ul>
                    <label id="radioButtons_papan"></label>
                </ul>
            </div>
            <div class="custom-kaki" >
                <h3 class="text-2xl">Kaki</h3>
                <ul>
                    <label id="radioButtons_kaki"></label>
                </ul>
            </div>
        </div>
        <h1 class="text-4xl text-blue-400" align="center">Hasil Kustomisasi</h1>
        <div align="center" id="userModel" style="display: none;">
            <x3d width="476px" height="233px">
                <scene id="x3dContent">
                </scene>
            </x3d>
        </div>
        <div align="center">
        <button id="applyButton" onclick="applyChanges()" type="button" class="danger">Apply</button>
        </div>
        <br><br><br>
    </div>

    <script>
    const items_papan = [{
            value: "item1",
            label: "Papan Bulat",
            url: "Bulat Connecting C.x3d",
        },
        {
            value: "item2",
            label: "Papan Bulat 2",
            url: "Bulat Double Connecting C.x3d",
        },
        // Add more items as needed
    ];
    const items_kaki = [{
            value: "item1",
            label: "Kaki Meja Bulat 1",
            url: "KakiMejaSegiEnamC1.x3d",
        },
        {
            value: "item2",
            label: "Kaki Meja Bulat 2",
            url: "KakiMejaSegiEnamC.x3d",
        },
        {
            value: "item3",
            label: "Kaki Meja Bulat 3",
            url: "KakiMejaSegiEnamC2.x3d",
        },
        {
            value: "item4",
            label: "Kaki Meja Bulat 4",
            url: "KakiMejaSegiEnamC3.x3d",
        },
        {
            value: "item5",
            label: "Kaki Meja Bulat 5",
            url: "KakiMejaSegiEnamC4.x3d",
        },
        // Add more items as needed
    ];

    var currentState_papan = items_papan[0].url; // Default state for papan
    var currentState_kaki = items_kaki[0].url; // Default state for kaki
    document.getElementById("x3dContent").innerHTML =
        `<inline mapDEFToID="true" url="${currentState_papan}"></inline>
                                                            <inline mapDEFToID="true" url="${currentState_papan}"></inline>`;

    function createRadioButtonsPapan() {
        var radioButtonsContainer = document.getElementById("radioButtons_papan");

        items_papan.forEach(item => {
            var radioButton = document.createElement("input");
            radioButton.type = "radio";
            radioButton.name = "item_papan";
            radioButton.value = item.value;
            radioButton.checked = item.value === items_papan[0].value; // Set initial checked item
            radioButtonsContainer.appendChild(radioButton);

            var label = document.createElement("label");
            label.textContent = item.label;
            radioButtonsContainer.appendChild(label);

            radioButtonsContainer.appendChild(document.createElement("br"));
        });
    }

    function createRadioButtonsKaki() {
        var radioButtonsContainer = document.getElementById("radioButtons_kaki");

        items_kaki.forEach(item => {
            var radioButton = document.createElement("input");
            radioButton.type = "radio";
            radioButton.name = "item_kaki";
            radioButton.value = item.value;
            radioButton.checked = item.value === items_kaki[0].value; // Set initial checked item
            radioButtonsContainer.appendChild(radioButton);

            var label = document.createElement("label");
            label.textContent = item.label;
            radioButtonsContainer.appendChild(label);

            radioButtonsContainer.appendChild(document.createElement("br"));
        });
    }

    async function applyChanges() {
        var selectedValue_papan = document.querySelector('input[name="item_papan"]:checked').value;
        var selectedValue_kaki = document.querySelector('input[name="item_kaki"]:checked').value;

        var newPapan = items_papan.find(item => item.value === selectedValue_papan);
        var newKaki = items_kaki.find(item => item.value === selectedValue_kaki);

        var applyButton = document.getElementById("applyButton");
        applyButton.innerHTML =
            '<svg class="animate-spin h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647zM20 12c0-3.042-1.135-5.824-3-7.938l-3 2.647A7.962 7.962 0 0120 12h4a8 8 0 01-8 8v-4z"></path></svg>Loading...';

        applyButton.disabled = true; // Disable the Apply button

        await delay(1000); // Simulating asynchronous delay (1 second)
        document.getElementById("x3dContent").innerHTML =
            `<inline mapDEFToID="true" url="${newPapan.url}"></inline>
                                                                <inline mapDEFToID="true" url="${newKaki.url}"></inline>`;
        document.getElementById("userModel").style.display = "block";

        applyButton.innerHTML = "Apply"; // Reset the Apply button text
        applyButton.disabled = false; // Enable the Apply button
    }

    function delay(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }

    // Create the radio buttons dynamically
    createRadioButtonsPapan();
    createRadioButtonsKaki();
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

<footer>
    @include('partials.footer')

    <div class="container mt-4">
        @yield('container')
    </div>
</footer>


</html>
