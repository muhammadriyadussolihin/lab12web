# lab12web

|  |  |  |
|-----|------|-----|
|Nama|Muhhammad Riyadus Solihin|
|NIM|312210404|
|Kelas|TI.22.A.4|
|Mata Kuliah|Pemograman Web|

## Login Form
mengacu pada pemahaman dan penerapan pengembangan halaman login dalam konteks pengembangan web. Sebuah formulir login adalah antarmuka yang umumnya digunakan untuk mengotentikasi pengguna dan memberikan akses ke bagian terbatas dari suatu situs web atau aplikasi.<br>
<br>
Berikut adalah beberapa aspek penting dalam pengenalan studi kasus pembuatan formulir login:

1. **Session Management**:<br>
Studi kasus formulir login biasanya melibatkan pengelolaan sesi. Sesuai dengan contoh PHP yang diberikan, `session_start()` digunakan untuk memulai sesi PHP. Setelah login berhasil, informasi pengguna seringkali disimpan dalam sesi untuk mempertahankan status login selama pengguna berada di situs.
2. **Database Interaction**:<br>
Informasi login, seperti nama pengguna dan kata sandi, biasanya disimpan dalam basis data. Studi kasus formulir login harus mencakup interaksi dengan basis data untuk memeriksa kecocokan kredensial yang dimasukkan oleh pengguna.
3. **Form Validation**:<br>
Formulir harus mengalami validasi untuk memastikan bahwa pengguna memberikan informasi yang benar dan diperlukan. Contohnya, pastikan bahwa kedua bidang (username dan password) telah diisi sebelum mencoba mengautentikasi pengguna.
4. **Hashing Password**:<br>
Dalam studi kasus keamanan, kata sandi biasanya dihash sebelum disimpan di basis data. Pada contoh PHP yang diberikan, fungsi `md5()` digunakan untuk menghasilkan hash dari kata sandi sebelum membandingkannya dengan yang disimpan di basis data. Namun, penggunaan `md5()` tidak disarankan untuk keamanan yang lebih tinggi. Sebaiknya gunakan fungsi hash yang lebih aman seperti.
5. **Styling dan UI**:<br>
Desain formulir login, seperti yang terlihat pada contoh HTML dan CSS, melibatkan pemilihan gaya dan struktur tata letak. Memberikan tampilan yang bersih dan mudah digunakan untuk pengguna sangat penting dalam pengalaman pengguna yang baik.
6. **Redirection**:<br>
Setelah login berhasil, seringkali ada pengalihan ke halaman beranda atau halaman tertentu yang memerlukan otentikasi. Ini dicapai dengan menggunakan header HTTP atau metode pengalihan lainnya.

### Sintaks **login.php** & **login_session.php**

1. **login.php**
    ```php
    <?php
    session_start();

    $title = 'Data Mahasiswa';
    include_once '../class/koneksi.php';

    if (isset($_POST['submit'])) {
        $user = $_POST['user'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM user WHERE username = '{$user}' AND password = md5('{$password}') ";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_affected_rows($conn) != 0) {
            $_SESSION['isLogin'] = true;
            $_SESSION['user'] = mysqli_fetch_array($result);

            header('location: index.php');
        } else {
            $errorMsg = "<p style=\"color:red;\">Gagal Login, silakan ulangi lagi.</p>";
        }
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title ?></title>
        <link rel="stylesheet" href="../CSS/style.css">
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
            }

            .container {
                max-width: 400px;
                margin: 50px auto;
                padding: 20px;
                background-color: #fff;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                border-radius: 5px;
            }

            h1 {
                text-align: center;
                color: #333;
            }

            form {
                display: flex;
                flex-direction: column;
            }

            .input {
                margin-bottom: 15px;
            }

            label {
                font-weight: bold;
                margin-bottom: 5px;
            }

            input {
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
            }

            .submit {
                text-align: center;
            }

            input[type="submit"] {
                background-color: #007bf;
                color: #fff;
                cursor: pointer;
                padding: 10px 20px;
                border: none;
                border-radius: 4px;
            }

            input[type="submit"]:hover {
                background-color: #45a049;
            }

            .error-message {
                color: red;
                text-align: center;
                margin-bottom: 15px;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <?php if (isset($errorMsg)) echo "<div class='error-message'>$errorMsg</div>"; ?>
            <h1>Login</h1>
            <form method="post">
                <div class="input">
                    <label for="user">Username</label>
                    <input type="text" name="user" id="user" placeholder="Username" required />
                </div>
                <div class="input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" required />
                </div>
                <div class="submit">
                    <input type="submit" name="submit" value="Login" />
                </div>
            </form>
        </div>
    </body>

    </html>
    ```

2. **login_session.php**

    ```php
    <?php 

    session_start();

    if (!isset($_SESSION['isLogin']))
        header('location: login.php');

    ?>
    ```

## Hasil

https://github.com/muhammadriyadussolihin/lab12web/assets/116700346/fd7a129e-bf07-4041-8289-52459a291af5