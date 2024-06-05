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
        </div>
    </div>

    <script>
        const plantDatabase = {
    "001": {
        name: "Mawar",
        description: "Tipe tanaman yang mudah tumbuh baik tropis maupun subtropis. Mawar atau ros (Rosa) adalah tumbuhan perdu, pohonnya berduri, bunganya berbau wangi dan berwarna indah, terdiri atas daun bunga yang bersusun; meliputi ratusan jenis, tumbuh tegak atau memanjat, batangnya berduri, bunganya beraneka warna, seperti merah, putih, merah jambu, merah tua, dan berbau harum. Mawar liar terdiri dari 100 spesies lebih, kebanyakan tumbuh di belahan bumi utara yang berudara sejuk. Spesies ini umumnya merupakan tanaman semak yang berduri atau tanaman memanjat yang tingginya bisa mencapai 2 sampai 5 meter. Walaupun jarang ditemui, tinggi tanaman mawar yang merambat di tanaman lain bisa mencapai 20 meter.",
        image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQLvM_LnLP4VpZUCsqqsoBynhQJ7LzAe1O8KA&s" 
    },
    "002": {
        name: "Cabai",
        description: "Cabai adalah buah dan tumbuhan anggota genus Capsicum. Buahnya dapat digolongkan sebagai sayuran maupun bumbu, tergantung bagaimana pemanfaatannya. Sebagai bumbu, buah cabai yang pedas sangat populer di Asia Tenggara sebagai penguat rasa untuk makanan. Bagi seni masakan Padang, cabai bahkan dianggap sebagai bahan makanan pokok kesepuluh (alih-alih kesembilan). Sangat sulit bagi masakan Padang dibuat tanpa cabai.",
        image: "https://asset.kompas.com/crops/JV0dHLaW13nPwHjb0kxa54timb0=/100x67:900x600/750x500/data/photo/2022/02/18/620f859c6820a.jpg"
    },
    "003": {
        name: "Anggrek",
        description: "Anggrek Bulan (Phalaenopsis amabilis) atau Puspa Pesona adalah salah satu bunga nasional Indonesia. Pertama kali ditemukan oleh seorang ahli botani Belanda, Dr. C.L. Blume. Tanaman anggrek ini tersebar luas mulai dari Malaysia, Indonesia, Filipina, Papua, hingga ke Australia. Cara hidupnya secara epifit dengan menempel pada batang atau cabang pohon di hutan-hutan, bahkan bisa juga dijumpai di pohon-pohon pekarangan rumah. Anggrek ini tumbuh subur hingga 600 meter di atas permukaan laut.",
        image: "https://www.dictio.id/uploads/db3342/d9d4b6bc5afdf456e2a231fbf101436758c0d8a9" 
    },
    "004": {
        name: "Tomat",
        description: "Tomat atau rangam (Solanum lycopersicum) adalah tumbuhan dari keluarga Solanaceae, tumbuhan asli Amerika Tengah dan Selatan, dari Meksiko sampai Peru. Tomat merupakan tumbuhan siklus hidup singkat, dapat tumbuh setinggi 1 sampai 3 meter. Tumbuhan ini memiliki buah berwarna hijau, kuning, dan merah yang biasa dipakai sebagai sayur dalam masakan atau dimakan secara langsung tanpa diproses. Tomat memiliki batang dan daun yang tidak dapat dikonsumsi karena masih sekeluarga dengan kentang dan terung yang mengadung alkaloid.",
        image: "https://dpkp.brebeskab.go.id/wp-content/uploads/2021/09/tomat.jpg"
    },
    "005": {
        name: "Bayam",
        description: "Bayam (Amaranthus) adalah tumbuhan yang biasa ditanam untuk dikonsumsi daunnya sebagai sayuran hijau. Tumbuhan ini berasal dari Amerika tropik namun sekarang tersebar ke seluruh dunia. Tumbuhan ini dikenal sebagai sayuran sumber zat besi yang penting bagi tubuh.",
        image: "https://www.greeners.co/wp-content/uploads/2020/10/Bayam-Duri-2.jpg"
    },
    "006": {
        name: "Sawi",
        description: "Sawi hijau (Brassica rapa kelompok parachinensis, yang disebut juga sawi bakso, caisim, atau caisin). Selain itu, terdapat pula sawi putih (Brassica rapa kelompok pekinensis, disebut juga petsai) yang biasa dibuat sup atau diolah menjadi asinan. Jenis lain yang kadang-kadang disebut sebagai sawi hijau adalah sesawi sayur (untuk membedakannya dengan caisim). Kailan (Brassica oleracea kelompok alboglabra) adalah sejenis sayuran daun lain yang agak berbeda, karena daunnya lebih tebal dan lebih cocok menjadi bahan campuran mi goreng. Sawi sendok (pakcoy atau bok choy) merupakan jenis sayuran daun kerabat sawi yang mulai dikenal pula dalam dunia boga Indonesia. Jenis sawi sendok ini lebih cocok untuk ditumis.",
        image: "https://asset.kompas.com/crops/xqdwdeBgXQAmuuNu8T02Mq0xNA0=/100x67:900x600/750x500/data/photo/2022/09/23/632d95fb653b4.jpg"
    },
    "007": {
        name: "Brokoli",
        description: "Brokoli (Brassica oleracea L. Kelompok Italica) adalah tanaman yang sering dibudidayakan sebagai sayur. Brokoli adalah kultivar dari spesies yang sama dengan kubis dan kembang kol, yaitu Brassica oleracea. Brokoli berasal dari daerah Laut Tengah dan sudah sejak masa Yunani Kuno dibudidayakan. Sayuran ini masuk ke Indonesia belum lama (sekitar 1970-an) dan kini cukup populer sebagai bahan pangan.",
        image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRHssrQ_u1s_hSWn8LVP9V_7J7GfgG9SkzH1g&s"
    },
    "008": {
        name: "Venus Flytrap (Dionaea)",
        description: "Perangkap lalat Venus (Dionaea muscipula) adalah sebuah tanaman karnivora yang berasal dari tanah basah subtropis di Pantai Timur Amerika Serikat di Carolina Utara dan Carolina Selatan. Tanaman tersebut menangkap mangsanya (biasanya serangga dan laba-laba) dengan struktur jebakan yang terbentuk dari belahan daun tanaman tersebut yang memiliki rambut-rambut kecil di permukaan dalam mereka.",
        image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQkQFsEkO6BCZNRSnREjCGvxb4wNLZqQFSpcA&s"
    },
    "009": {
        name: "Bunga bangkai (Amorphophallus)",
        description: "Bunga bangkai (Amorphophallus) mengalami dua fase dalam hidupnya yang berlangsung secara bergantian dan terus menerus, yakni fase vegetatif dan fase generatif. Pada fase vegetatif di atas umbi bunga bangkai tumbuh batang tunggal dan daun yang mirip daun pepaya. Hingga kemudian batang dan daun menjadi layu menyisakan umbi di dalam tanah. Fase selanjutnya, generatif yakni munculnya bunga majemuk yang menggantikan batang dan daun yang layu tadi. Perkembangbiakan juga dibantu oleh burung rangkong, yang di mana akan memakan biji dari bunga bangkai dan akan dibuang melalui feses, namun makin berkurangnya populasi burung rangkong akibat perdagangan liar maka populasi bunga bangkai juga berkurang.",
        image: "https://upload.wikimedia.org/wikipedia/commons/c/c0/Titan-arum1web.jpg"
    },
    "010": {
        name: "Melati",
        description: "Melati, melur, atau yasmin merupakan tanaman bunga hias berupa perdu berbatang tegak yang hidup menahun. Melati merupakan genus dari semak dan tanaman merambat dalam keluarga zaitun.",
        image: "https://dinkes.jakarta.go.id/assets/upload/image/melati-putih.jpg"
    },
    "011": {
        name: "Teh",
        description: "Budidaya teh dimulai dengan memilih lokasi yang tepat, biasanya di daerah pegunungan dengan ketinggian antara 200-2000 meter di atas permukaan laut. Iklim yang sejuk dan curah hujan yang cukup sangat penting untuk pertumbuhan tanaman teh. Tanah yang ideal adalah tanah berpasir dengan pH antara 4,5-5,5, yang kaya akan bahan organik dan memiliki drainase yang baik.",
        image: "https://mediaperkebunan.id/wp-content/uploads/2018/08/daun-teh.jpg"
    }
};

console.log(plantDatabase);


        function searchPlant() {
            const query = document.getElementById('searchQuery').value.toLowerCase();
            const plantDataDiv = document.getElementById('plantData');
            const plantInfo = document.getElementById('plantInfo');
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
            } else {
                plantDataDiv.style.display = 'none';
            }

            return false; // Prevent form submission
        }
    </script>
</body>
</html>
