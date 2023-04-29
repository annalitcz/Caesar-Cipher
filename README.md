# Caesar-Cipher
Tugas Pemrograman Web

- Nama  : Mohammad Annan Makruf Mustofa
- Npm   : 2113030041
- Kelas : Sistem Informasi 2A

# Script Caesar Cipher
* JavaScript `index.html`
```JavaScript
    const encrypt = () => {
      const plaintextInput = document.getElementById("plain-text");
      const keyInput = document.getElementById("key-encrypt");
      const resultElement = document.getElementById("result-encrypt");

      // get input values
      const plaintext = plaintextInput.value;
      const key = parseInt(keyInput.value);

      // perform encryption
      let ciphertext = "";
      for (let i = 0; i < plaintext.length; i++) {
        const charCode = plaintext.charCodeAt(i);
        let newCharCode = charCode;
        if (charCode >= 65 && charCode <= 90) {
          // uppercase letters
          newCharCode = ((charCode - 65 + key) % 26) + 65;
        } else if (charCode >= 97 && charCode <= 122) {
          // lowercase letters
          newCharCode = ((charCode - 97 + key) % 26) + 97;
        }
        ciphertext += String.fromCharCode(newCharCode);
      }

      // update result element
      resultElement.textContent = ciphertext;
    };

    const decrypt = () => {
      const cipherTextInput = document.getElementById("cipher-text");
      const keyInput = document.getElementById("key-decrypt");
      const result = document.getElementById("result-decrypt");

      const cipherText = cipherTextInput.value;
      const key = parseInt(keyInput.value);

      let plaintext = "";
      for (let i = 0; i < cipherText.length; i++) {
        let charCode = cipherText.charCodeAt(i);
        let newCharCode = charCode;
        if (charCode >= 65 && charCode <= 90) {
          newCharCode = ((charCode - 65 - key + 26) % 26) + 65;
        } else if (charCode >= 97 && charCode <= 122) {
          newCharCode = ((charCode - 97 - key + 26) % 26) + 97;
        }

        plaintext += String.fromCharCode(newCharCode);
      }

      result.textContent = plaintext;
    };
 ```
* PHP `index.php`
```PHP
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
  ?>
```

# Demo `index.html`
[![Try](https://img.shields.io/badge/Watch-Now-green)](https://caesar-cipher-eight.vercel.app/)
