# GD6_2813
## Jawaban Pertanyaan 
Mengapa jumlah baris tetap 3 dan 5 saat `migrate:fresh --seed` dijalankan berulang kali? 
Karena perintah "migrate:fresh" akan menghapus (drop) seluruh tabel beserta isinya terlebih dahulu sebelum membuat ulang tabel dari awal dari file migration. Setelah tabel bersih dan kosong, perintah '--seed' akan memasukkan kembali data awal dari 'DatabaseSeeder' dari keadaan nol. Oleh karena itu, jumlah barisnya akan selalu tetap (tidak berlipat ganda atau bertambah) setiap kali perintah tersebut dijalankan ulang.