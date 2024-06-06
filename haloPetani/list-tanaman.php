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

        .back-button {
            display: block;
            margin-top: 20px;
            text-align: right;
        }

        .back-button a {
            background-color: #3e8e41;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
        }

        .back-button a:hover {
            background-color: #357a38;
        }
    </style>
</head>
<body>
    <h2>Form Jenis Tanaman</h2>
    <div class="back-button">
        <a href='menu.php'>Kembali Ke Menu</a>
    </div>
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
                description: "Mawar merupakan komoditas hortikultura yang bernilai ekonomi tinggi dan banyak diminati konsumen serta dapat dibudidayakan secara komersial. Mawar mempunyai nilai ekonomi yang penting sebagai bunga potong dan bahan baku minyak bunga yang digunakan industri parfum. Tanaman mawar biasanya dipropagasi secara konvensional. Pemuliaan tanaman mawar secara konvensional menghasilkan ribuan hibrida dan kultivar yang sebagian besar merupakan bunga ganda dengan daun mahkota berlapis hasil mutasi benang sari menjadi daun mahkota tambahan. Mawar hibrida atau kultivar sebagian besar dibuat untuk dinikmati bunganya di taman-taman. Para pemulia mawar abad ke-20 berlomba-lomba dengan ukuran dan warna untuk menghasilkan bunga-bunga besar dan menarik serta berbau harum (atau tanpa bau), padahal mawar liar atau mawar zaman dulu justru sangat berbau harum. Kultivar tertentu seperti Rosa banksiae malah tidak memiliki duri sama sekali. ",
                image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQLvM_LnLP4VpZUCsqqsoBynhQJ7LzAe1O8KA&s"
            },
            "002": {
                name: "Cabai",
                description: "Tanaman cabai cocok ditanam pada tanah yang kaya humus, gembur dan sarang, serta tidak tergenang air; pH tanah yang ideal sekitar 5—6. Waktu tanam yang baik untuk lahan kering adalah pada akhir musim hujan (Maret—April). Untuk memperoleh harga cabai yang tinggi, bisa juga dilakukan pada bulan Oktober dan panen pada bulan Desember, walaupun kemungkinan memiliki risiko kegagalan. Tanaman cabai diperbanyak melalui biji yang ditanam dari tanaman yang sehat serta bebas dari hama dan penyakit. Buah cabai yang telah diseleksi untuk bibit dijemur hingga kering. Kalau panasnya cukup dalam lima hari telah kering kemudian baru diambil bijinya. Untuk areal satu hektare dibutuhkan sekitar dua sampai tiga kg buah cabai (300—500 gr biji). ",
                image: "https://asset.kompas.com/crops/JV0dHLaW13nPwHjb0kxa54timb0=/100x67:900x600/750x500/data/photo/2022/02/18/620f859c6820a.jpg"
            },
            "003": {
                name: "Anggrek",
                description: "Anggrek dikenal sebagai epifit, yang berarti mereka sering tumbuh menempel pada pohon atau permukaan lainnya, menggunakan akarnya yang kuat dan berbulu untuk melekat dan menyerap nutrisi serta air dari kelembapan udara dan sisa-sisa organik di sekitarnya. Meskipun begitu, ada juga anggrek yang tumbuh di tanah (terestrial) atau di bebatuan (litofit). Selama pertumbuhannya, anggrek memerlukan kondisi lingkungan yang lembap tetapi dengan sirkulasi udara yang baik. Mereka umumnya membutuhkan pencahayaan yang cukup, tetapi tidak langsung, karena sinar matahari yang terlalu kuat bisa merusak daunnya. Kelembapan adalah faktor penting untuk pertumbuhan anggrek, dan mereka biasanya memerlukan kelembapan udara yang tinggi serta penyiraman yang cukup tetapi tidak berlebihan. Akarnya harus mendapat cukup udara untuk mencegah busuk akar, sehingga media tanam seperti kulit kayu, serat kelapa, atau lumut sphagnum sering digunakan untuk menanam anggrek.",
                image: "https://www.dictio.id/uploads/db3342/d9d4b6bc5afdf456e2a231fbf101436758c0d8a9"
            },
            "004": {
                name: "Tomat",
                description: "Perawatan tomat melibatkan beberapa hal penting. Penyiraman harus dilakukan secara konsisten, terutama selama musim kering, untuk memastikan tanah tetap lembap. Namun, penyiraman yang berlebihan harus dihindari karena dapat menyebabkan penyakit seperti busuk akar. Penggunaan mulsa dapat membantu menjaga kelembapan tanah dan mengurangi pertumbuhan gulma. Pemupukan adalah bagian penting dari perawatan tomat. Tanaman tomat membutuhkan nutrisi yang cukup untuk mendukung pertumbuhan dan pembentukan buah. Pupuk yang kaya akan nitrogen, fosfor, dan kalium biasanya digunakan. Pemangkasan juga dapat dilakukan untuk menghilangkan daun dan tunas yang tidak produktif, membantu meningkatkan sirkulasi udara dan mengurangi risiko penyakit.",
                image: "https://dpkp.brebeskab.go.id/wp-content/uploads/2021/09/tomat.jpg"
            },
            "005": {
                name: "Bayam",
                description: "Bayam adalah tanaman sayuran hijau yang tumbuh dengan cepat dan mudah dirawat. Pertumbuhannya dimulai dari biji yang disemai dalam tanah yang subur dan kaya nutrisi. Biji bayam biasanya berkecambah dalam waktu beberapa hari hingga satu minggu, tergantung pada suhu dan kondisi tanah. Bibit yang muncul akan memiliki daun kecil yang mulai berkembang menjadi daun yang lebih besar dan lebih banyak. Bayam membutuhkan sinar matahari penuh untuk tumbuh dengan baik, meskipun dapat mentolerir sedikit naungan. Tanah yang digunakan harus memiliki drainase yang baik untuk mencegah genangan air, karena bayam tidak tahan terhadap kondisi tanah yang terlalu basah. Penyiraman yang teratur sangat penting, terutama selama musim kemarau, untuk memastikan tanah tetap lembap tetapi tidak tergenang.",
                image: "https://www.greeners.co/wp-content/uploads/2020/10/Bayam-Duri-2.jpg"
            },
            "006": {
                name: "Sawi",
                description: "awi adalah tanaman sayuran yang populer karena kemudahannya dalam pertumbuhan dan perawatan, serta manfaat kesehatannya yang tinggi. Pertumbuhan sawi dimulai dari biji yang disemai dalam tanah yang gembur dan subur. Biji sawi biasanya berkecambah dalam beberapa hari, dengan bibit kecil yang muncul dari tanah. Setelah berkecambah, bibit sawi memerlukan sinar matahari yang cukup, meskipun sawi juga dapat tumbuh baik di tempat yang teduh sebagian. Tanah yang digunakan untuk menanam sawi harus memiliki drainase yang baik untuk mencegah genangan air yang bisa menyebabkan akar busuk. Penyiraman dilakukan secara teratur untuk menjaga kelembapan tanah, terutama selama musim kemarau. Namun, penting untuk tidak menyiram terlalu banyak karena kondisi terlalu basah bisa memicu penyakit.",
                image: "https://asset.kompas.com/crops/xqdwdeBgXQAmuuNu8T02Mq0xNA0=/100x67:900x600/750x500/data/photo/2022/09/23/632d95fb653b4.jpg"
            },
            "007": {
                name: "Brokoli",
                description: "Brokoli adalah sayuran hijau yang dikenal karena bunganya yang padat dan bernutrisi tinggi. Pertumbuhannya dimulai dari biji yang disemai dalam tanah yang subur dan kaya nutrisi. Biji brokoli biasanya berkecambah dalam waktu sekitar satu minggu, menghasilkan bibit kecil yang memerlukan banyak sinar matahari. Bibit tersebut kemudian dipindahkan ke lahan tanam ketika sudah cukup kuat, biasanya setelah memiliki beberapa daun sejati. Brokoli membutuhkan tanah yang gembur dan memiliki drainase baik, serta pH tanah yang sedikit asam hingga netral. Sinar matahari penuh sangat penting untuk pertumbuhannya, tetapi brokoli juga dapat tumbuh dalam kondisi cuaca yang lebih sejuk, menjadikannya tanaman yang ideal untuk musim semi atau musim gugur. Penyiraman harus dilakukan secara teratur untuk menjaga tanah tetap lembap, tetapi tidak boleh terlalu basah untuk mencegah busuk akar.",
                image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRHssrQ_u1s_hSWn8LVP9V_7J7GfgG9SkzH1g&s"
            },
            "008": {
                name: "Venus Flytrap (Dionaea)",
                description: "Venus flytrap, atau Dionaea muscipula, adalah tanaman karnivora yang terkenal karena kemampuannya menangkap dan mencerna serangga. Pertumbuhannya dimulai dari biji atau umbi kecil yang ditanam dalam media tanam yang sangat asam dan berdrainase baik, seperti campuran sphagnum moss dan perlit. Media ini harus bebas dari nutrisi tambahan, karena Venus flytrap memperoleh sebagian besar nutrisinya dari serangga yang ditangkap. Tanaman ini membutuhkan pencahayaan yang sangat baik, idealnya sinar matahari penuh selama setidaknya 4-6 jam sehari. Jika ditanam di dalam ruangan, lampu tumbuh yang menyediakan spektrum cahaya penuh bisa digunakan untuk memastikan tanaman mendapatkan cukup cahaya. Kelembapan tinggi dan suhu yang hangat juga penting untuk pertumbuhan yang optimal. Penyiraman dilakukan dengan menggunakan air yang bebas dari mineral, seperti air hujan atau air suling, karena mineral dalam air biasa dapat merusak tanaman. Media tanam harus selalu lembap, tetapi tidak tergenang air. Penyiraman dari bawah sering kali direkomendasikan untuk mencegah pembusukan akar dan memastikan air mencapai seluruh media tanam.",
                image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQkQFsEkO6BCZNRSnREjCGvxb4wNLZqQFSpcA&s"
            },
            "009": {
                name: "Bunga bangkai (Amorphophallus)",
                description: "Bunga bangkai, atau Amorphophallus titanum, adalah salah satu tanaman berbunga terbesar dan paling luar biasa di dunia. Pertumbuhannya dimulai dari umbi besar yang ditanam dalam tanah yang kaya akan bahan organik dan memiliki drainase yang baik. Umbi ini bisa sangat besar, mencapai berat puluhan kilogram, dan membutuhkan banyak ruang untuk tumbuh. Bunga bangkai memerlukan kondisi yang hangat dan lembap untuk tumbuh dengan baik, mirip dengan habitat aslinya di hutan tropis Sumatra. Tanaman ini membutuhkan sinar matahari yang terang tetapi tersebar, karena sinar matahari langsung yang terlalu kuat bisa merusak daunnya. Suhu ideal untuk pertumbuhannya adalah antara 24-30°C, dengan kelembapan yang tinggi.",
                image: "https://upload.wikimedia.org/wikipedia/commons/c/c0/Titan-arum1web.jpg"
            },
            "010": {
                name: "Melati",
                description: "Bunga melati, atau Jasminum spp., dikenal karena bunganya yang harum dan indah. Pertumbuhannya dimulai dari stek atau biji yang ditanam dalam tanah yang gembur dan subur. Tanah harus memiliki drainase yang baik, memungkinkan air mengalir dengan mudah untuk mencegah genangan yang bisa menyebabkan akar busuk. Melati memerlukan sinar matahari penuh atau setidaknya sebagian, dengan lokasi yang mendapatkan cahaya matahari langsung selama beberapa jam setiap hari. Tanaman ini menyukai kelembapan yang cukup, sehingga penyiraman dilakukan secara teratur untuk menjaga tanah tetap lembap, terutama selama musim kemarau. Namun, penting untuk tidak menyiram terlalu banyak agar tidak menyebabkan tanah menjadi terlalu basah. Melati juga dapat tumbuh dengan baik di pot, selama pot memiliki lubang drainase yang memadai untuk mencegah penumpukan air.",
                image: "https://dinkes.jakarta.go.id/assets/upload/image/melati-putih.jpg"
            },
            "011": {
                name: "Teh",
                description: "Teh, yang berasal dari tanaman Camellia sinensis, adalah salah satu minuman paling populer di dunia. Pertumbuhannya dimulai dari biji atau stek yang ditanam dalam tanah yang subur, kaya bahan organik, dan memiliki drainase yang baik. Tanaman teh memerlukan kondisi iklim yang lembap dan sejuk, dengan suhu ideal berkisar antara 18-25°C. Ketinggian yang ideal untuk pertumbuhan teh adalah sekitar 600-2000 meter di atas permukaan laut, karena kondisi ini memberikan suhu yang stabil dan curah hujan yang cukup. Tanaman teh memerlukan sinar matahari yang cukup tetapi tidak berlebihan. Biasanya, mereka ditanam di lokasi yang mendapatkan sinar matahari pagi dan teduh pada siang hari untuk menghindari stres panas. Penyiraman harus dilakukan secara teratur untuk menjaga kelembapan tanah, tetapi tanah tidak boleh terlalu basah untuk mencegah busuk akar. Sistem irigasi yang baik sangat penting untuk memastikan tanaman mendapatkan air yang cukup tanpa mengalami kelebihan air.",
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

            return false; 
        }
    </script>
</body>
</html>
