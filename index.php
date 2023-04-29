<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Caesar Cipher</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
</head>
<style>
  .container-form {
    display: flex;
    justify-content: space-evenly;
    align-items: center;
    margin-top: 50px;
  }
  .font{
    font-family: "Josefin Sans", sans-serif;
  }
</style>

<body>
  <h1 class='mt-10 text-center font text-4xl'>Caesar Cipher</h1>
  <div class="container-form">
    <form method="post" action="" class="bg-gray-100 p-6 rounded-lg border-2 border-gray-300" style="width: 300px; height: 350px">
      <div class="mb-4">
        <label for="plaintext" class="block text-gray-700 font-bold mb-2">Plain Text</label>
        <input type="text" id="plaintext" name="plaintext" required="true" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
      </div>
      <div class="mb-4">
        <label for="key" class="block text-gray-700 font-bold mb-2">Key</label>
        <input type="number" id="key" name="key" min="0" max="25" required="true" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
      </div>
      <div class="flex items-center justify-between">
        <input type="submit" name="encrypt" value="Encrypt" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
      </div>
      <?php
      if (isset($_POST['encrypt']) && isset($_POST['plaintext']) && isset($_POST['key'])) {
        $plaintext = $_POST['plaintext'];
        $key = $_POST['key'];
        $ciphertext = encrypt($plaintext, $key);
        echo "<p class='text-red-700 mt-2'>Encrypted Text: " . $ciphertext . "</p>";
      }
      ?>
    </form>
    <form method="post" action="" class="bg-gray-100 p-6 rounded-lg border-2 border-gray-300" style="width: 300px; height: 350px">
      <div class="mb-4">
        <label for="plaintext" class="block text-gray-700 font-bold mb-2">Cipher Text</label>
        <input type="text" id="cipher-text" name="cipher-text" required="true" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
      </div>
      <div class="mb-4">
        <label for="key" class="block text-gray-700 font-bold mb-2">Key</label>
        <input type="number" id="key" name="key" min="0" max="25" required="true" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
      </div>
      <div class="flex items-center justify-between">
        <input type="submit" name="decrypt" value="Decrypt" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
      </div>
      <?php
      if (isset($_POST['decrypt']) && isset($_POST['cipher-text']) && isset($_POST['key'])) {
        $ciphertext = $_POST['cipher-text'];
        $key = $_POST['key'];
        $plaintext = decrypt($ciphertext, $key);
        echo "<p class='text-green-700 mt-2'>Decrypted Text : " . $plaintext . "</p>";
      }
      ?>
    </form>
  </div>
  <?php
  function encrypt($plaintext, $key)
  {
    $ciphertext = "";
    $length = strlen($plaintext);
    for ($i = 0; $i < $length; $i++) {
      $char = ord($plaintext[$i]);
      if ($char >= 65 && $char <= 90) {
        // uppercase letters
        $newChar = (($char - 65 + $key) % 26) + 65;
      } else if ($char >= 97 && $char <= 122) {
        // lowercase letters
        $newChar = (($char - 97 + $key) % 26) + 97;
      } else {
        // non-alphabetic characters
        $newChar = $char;
      }
      $ciphertext .= chr($newChar);
    }
    return $ciphertext;
  }

  function decrypt($ciphertext, $key)
  {
    $plaintext = "";
    $length = strlen($ciphertext);
    for ($i = 0; $i < $length; $i++) {
      $char = ord($ciphertext[$i]);
      if ($char >= 65 && $char <= 90) {
        // uppercase letters
        $newChar = (($char - 65 - $key + 26) % 26) + 65;
      } else if ($char >= 97 && $char <= 122) {
        // lowercase letters
        $newChar = (($char - 97 - $key + 26) % 26) + 97;
      } else {
        // non-alphabetic characters
        $newChar = $char;
      }
      $plaintext .= chr($newChar);
    }
    return $plaintext;
  }
  ?>
</body>
</html>
<!-- 
        Tugas Pemrograman Web

    Nama  : Mohammad Annan Makruf Mustofa
    Npm   : 2113030041
    Kelas : Sistem Informasi 2A
-->