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
    <title>Meja Segi Enam</title>

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
.custom-laci, .custom-rak {
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
        <h1 class="text-4xl text-yellow-400">Pilih Part Rak Anda</h1>
        </div>
        <div class="container">
            <div class="custom-rak" >
                <h3 class="text-2xl">Rak</h3>
                <ul>
                    <label id="radioButtons_rak"></label>
                </ul>
            </div>
            <div class="custom-laci" >
                <h3 class="text-2xl">Laci</h3>
                <ul>
                    <label id="radioButtons_laci"></label>
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
    const items_rak = [{
            value: "item1",
            label: "Rak Tingkat 1",
            url: "rak2.x3d",
        },
        // Add more items as needed
    ];
    const items_laci = [{
        value: "item1",
            label: "None",
            url: "laci.x3d",
        },
        {
            value: "item2",
            label: "Laci 1",
            url: "laci1.x3d",
        },
        {
            value: "item3",
            label: "Laci 2",
            url: "laci2.x3d",
        },
        // Add more items as needed
    ];

    var currentState_rak = items_rak[0].url; // Default state for papan
    var currentState_laci = items_laci[0].url; // Default state for kaki
    document.getElementById("x3dContent").innerHTML =
        `<inline mapDEFToID="true" url="${currentState_rak}"></inline>
                                                            <inline mapDEFToID="true" url="${currentState_rak}"></inline>`;

    function createRadioButtonsRak() {
        var radioButtonsContainer = document.getElementById("radioButtons_rak");

        items_rak.forEach(item => {
            var radioButton = document.createElement("input");
            radioButton.type = "radio";
            radioButton.name = "item_rak";
            radioButton.value = item.value;
            radioButton.checked = item.value === items_rak[0].value; // Set initial checked item
            radioButtonsContainer.appendChild(radioButton);

            var label = document.createElement("label");
            label.textContent = item.label;
            radioButtonsContainer.appendChild(label);

            radioButtonsContainer.appendChild(document.createElement("br"));
        });
    }

    function createRadioButtonsLaci() {
        var radioButtonsContainer = document.getElementById("radioButtons_laci");

        items_laci.forEach(item => {
            var radioButton = document.createElement("input");
            radioButton.type = "radio";
            radioButton.name = "item_laci";
            radioButton.value = item.value;
            radioButton.checked = item.value === items_laci[0].value; // Set initial checked item
            radioButtonsContainer.appendChild(radioButton);

            var label = document.createElement("label");
            label.textContent = item.label;
            radioButtonsContainer.appendChild(label);

            radioButtonsContainer.appendChild(document.createElement("br"));
        });
    }

    async function applyChanges() {
        var selectedValue_rak = document.querySelector('input[name="item_rak"]:checked').value;
        var selectedValue_laci = document.querySelector('input[name="item_laci"]:checked').value;

        var newRak = items_rak.find(item => item.value === selectedValue_rak);
        var newLaci = items_laci.find(item => item.value === selectedValue_laci);

        var applyButton = document.getElementById("applyButton");
        applyButton.innerHTML =
            '<svg class="animate-spin h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647zM20 12c0-3.042-1.135-5.824-3-7.938l-3 2.647A7.962 7.962 0 0120 12h4a8 8 0 01-8 8v-4z"></path></svg>Loading...';

        applyButton.disabled = true; // Disable the Apply button

        await delay(1000); // Simulating asynchronous delay (1 second)
        document.getElementById("x3dContent").innerHTML =
            `<inline mapDEFToID="true" url="${newRak.url}"></inline>
            <inline mapDEFToID="true" url="${newLaci.url}"></inline>`;
        document.getElementById("userModel").style.display = "block";

        applyButton.innerHTML = "Apply"; // Reset the Apply button text
        applyButton.disabled = false; // Enable the Apply button
    }

    function delay(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }

    // Create the radio buttons dynamically
    createRadioButtonsRak();
    createRadioButtonsLaci();
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
