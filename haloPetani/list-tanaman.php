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
            text-align: center;
        }

        .container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        form, .plant-data {
            background-color: #f0fff0;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 45%;
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

        .plant-data img {
            max-width: 100%;
            border-radius: 5px;
            margin-top: 10px;
        }

        .question-button {
            display: block;
            margin-top: 20px;
            text-align: center;
        }

        .question-button a {
            background-color: #3e8e41;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
        }

        .question-button a:hover {
            background-color: #357a38;
        }
    </style>
</head>
<body>
    <h2>Form Jenis Tanaman</h2>
    <div class="container">
        <form onsubmit="return searchPlant()">
            <label for="searchQuery">Cari Tanaman:</label>
            <input type="text" id="searchQuery" name="searchQuery">
            <input type="submit" value="Search">
        </form>

        <div class="plant-data" id="plantData">
            <h3>Data tanaman</h3>
            <p id="plantInfo"></p>
            <div class="question-button" id="questionButton">
                <a href="question.php">Apakah ingin mengajukan pertanyaan?</a>
            </div>
        </div>
    </div>

    <script>
        const plantDatabase = {
            "001": {
                name: "Mawar",
                description: "Tipe tanaman yang mudah tumbuh baik tropis maupun subtropis...",
                image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQLvM_LnLP4VpZUCsqqsoBynhQJ7LzAe1O8KA&s"
            },
            "002": {
                name: "Cabai",
                description: "Cabai adalah buah dan tumbuhan anggota genus Capsicum...",
                image: "https://asset.kompas.com/crops/JV0dHLaW13nPwHjb0kxa54timb0=/100x67:900x600/750x500/data/photo/2022/02/18/620f859c6820a.jpg"
            },
            "003": {
                name: "Anggrek",
                description: "Anggrek Bulan (Phalaenopsis amabilis) atau Puspa Pesona adalah salah satu bunga nasional Indonesia...",
                image: "https://www.dictio.id/uploads/db3342/d9d4b6bc5afdf456e2a231fbf101436758c0d8a9"
            },
            "004": {
                name: "Tomat",
                description: "Tomat atau rangam (Solanum lycopersicum) adalah tumbuhan dari keluarga Solanaceae...",
                image: "https://dpkp.brebeskab.go.id/wp-content/uploads/2021/09/tomat.jpg"
            },
            "005": {
                name: "Bayam",
                description: "Bayam (Amaranthus) adalah tumbuhan yang biasa ditanam untuk dikonsumsi daunnya sebagai sayuran hijau...",
                image: "https://www.greeners.co/wp-content/uploads/2020/10/Bayam-Duri-2.jpg"
            },
            "006": {
                name: "Sawi",
                description: "Sawi hijau (Brassica rapa kelompok parachinensis, yang disebut juga sawi bakso, caisim, atau caisin)...",
                image: "https://asset.kompas.com/crops/xqdwdeBgXQAmuuNu8T02Mq0xNA0=/100x67:900x600/750x500/data/photo/2022/09/23/632d95fb653b4.jpg"
            },
            "007": {
                name: "Brokoli",
                description: "Brokoli (Brassica oleracea L. Kelompok Italica) adalah tanaman yang sering dibudidayakan sebagai sayur...",
                image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRHssrQ_u1s_hSWn8LVP9V_7J7GfgG9SkzH1g&s"
            },
            "008": {
                name: "Venus Flytrap (Dionaea)",
                description: "Perangkap lalat Venus (Dionaea muscipula) adalah sebuah tanaman karnivora...",
                image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQkQFsEkO6BCZNRSnREjCGvxb4wNLZqQFSpcA&s"
            },
            "009": {
                name: "Bunga bangkai (Amorphophallus)",
                description: "Bunga bangkai (Amorphophallus) mengalami dua fase dalam hidupnya...",
                image: "https://upload.wikimedia.org/wikipedia/commons/c/c0/Titan-arum1web.jpg"
            },
            "010": {
                name: "Melati",
                description: "Melati, melur, atau yasmin merupakan tanaman bunga hias berupa perdu berbatang tegak...",
                image: "https://dinkes.jakarta.go.id/assets/upload/image/melati-putih.jpg"
            },
            "011": {
                name: "Teh",
                description: "Budidaya teh dimulai dengan memilih lokasi yang tepat...",
                image: "https://mediaperkebunan.id/wp-content/uploads/2018/08/daun-teh.jpg"
            }
        };

        function searchPlant() {
            const query = document.getElementById('searchQuery').value.toLowerCase();
            const plantDataDiv = document.getElementById('plantData');
            const plantInfo = document.getElementById('plantInfo');
            const questionButton = document.getElementById('questionButton');
            let found = false;

            plantInfo.innerHTML = '';

            for (let id in plantDatabase) {
                if (plantDatabase[id].name.toLowerCase().includes(query)) {
                    plantInfo.innerHTML += `
                        <strong>${plantDatabase[id].name}:</strong>
                        ${plantDatabase[id].description}
                        <br>
                        <img src="${plantDatabase[id].image}" alt="${plantDatabase[id].name}">
                        <br><br>
                    `;
                    found = true;
                }
            }

            if (found) {
                plantDataDiv.style.display = 'block';
                questionButton.style.display = 'block';
            } else {
                plantDataDiv.style.display = 'none';
                questionButton.style.display = 'none';
            }

            return false; // Prevent form submission
        }
    </script>
</body>
</html>
