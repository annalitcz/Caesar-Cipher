<!DOCTYPE html>
<html>
<head>
  <title>Caesar Cipher</title>
</head>
<style>
  .container{
    display: flex;
    justify-content: space-evenly;
    align-items: center;
    margin-top: 50px;
  }
  h1{
    text-align: center;
  }
  p{
    text-align: center;
  }
</style>
<body>
  <h1>Caesar Cipher</h1>
  <div class="container">
    <form method="post" action="">
      <label for="plaintext">Plain Text</label><br>
      <input type="text" id="plaintext" name="plaintext" required="true">
      <br><br>
      <label for="key">Key</label><br>
      <input type="number" id="key" name="key" min="0" max="25" required="true">
      <br><br>
      <input type="submit" name="encrypt" value="Encrypt">
    </form>
    <form method="post" action="">
      <label for="plaintext">Cipher Text</label><br>
      <input type="text" id="cipher-text" name="cipher-text" required="true">
      <br><br>
      <label for="key">Key</label><br>
      <input type="number" id="key" name="key" min="0" max="25" required="true">
      <br><br>
      <input type="submit" name="decrypt" value="Decrypt">
    </form>
  </div>
  <?php
    function encrypt($plaintext, $key) {
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
    
    function decrypt($ciphertext, $key) {
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
    
    if (isset($_POST['encrypt']) && isset($_POST['plaintext']) && isset($_POST['key'])) {
      $plaintext = $_POST['plaintext'];
      $key = $_POST['key'];
      $ciphertext = encrypt($plaintext, $key);
      echo "<p>Plain Text : " . $plaintext . "</p>";
      echo "<p>Encrypted Text: " . $ciphertext . "</p>";
    }
    if (isset($_POST['decrypt']) && isset($_POST['cipher-text']) && isset($_POST['key'])) {
      $ciphertext = $_POST['cipher-text'];
      $key = $_POST['key'];
      $plaintext = decrypt($ciphertext, $key);
      echo "<p>Cipher Text : " . $ciphertext . "</p>";
      echo "<p>Decrypted Text : " . $plaintext . "</p>";
    }
  ?>
</body>
</html>