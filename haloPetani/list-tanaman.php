<!DOCTYPE html>
<html>
<head>
    <title>Form Jenis Tanaman</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e7f6e7;
            color: #2d4d2d;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #3e8e41;
        }

        form, .plant-data {
            background-color: #f0fff0;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 20px;
            border: 1px solid #3e8e41;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #3e8e41;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #357a38;
        }

        .plant-data {
            display: none;
        }

        .plant-data h3 {
            margin-top: 0;
        }
    </style>
</head>
<body>
    <h2>Form Jenis Tanaman</h2>
    <form onsubmit="return searchPlant()">
        <label for="searchQuery">Search by PlantTypeName:</label>
        <input type="text" id="searchQuery" name="searchQuery">
        <input type="submit" value="Search">
    </form>

    <div class="plant-data" id="plantData">
        <h3>Plant Data</h3>
        <p id="plantInfo"></p>
    </div>

    <script>
        const plantDatabase = {
            "001": { name: "Mawar", description: "Tipe tanaman yang mudah tumbuh." },
            "002": { name: "Tulip", description: "A bulbous spring-flowering plant." },
            "003": { name: "Orchid", description: "A diverse and widespread family of flowering plants." },
        };

        function searchPlant() {
            const query = document.getElementById('searchQuery').value.toLowerCase();
            const plantDataDiv = document.getElementById('plantData');
            const plantInfo = document.getElementById('plantInfo');
            let found = false;

            plantInfo.innerHTML = '';

            for (let id in plantDatabase) {
                if (plantDatabase[id].name.toLowerCase().includes(query)) {
                    plantInfo.innerHTML += `<strong>${plantDatabase[id].name}:</strong> ${plantDatabase[id].description}<br>`;
                    found = true;
                }
            }

            if (found) {
                plantDataDiv.style.display = 'block';
            } else {
                plantDataDiv.style.display = 'none';
            }

            return false; // Prevent form submission
        }
    </script>
</body>
</html>
