# OS SERVER & SYSTEM ADMIN 
## Password Manager
Kellompok:

- fiqri andrian julianto (22.83.0830)
- Maftukh Zaki Mubarok (22.83.0872)
- Yosafat Wahyono (22.73.0855)
- Calvin rudiansyah putra nugraha (22.83.0863)

membuat website untuk menyimpan suatu password yang bisa di enkripsi dan dekripsi

service ubuntu :
- apache 2
- phpmyadmin
- ssh

keamanan :
- OPENSSL AES-256-CBC (bawaan phpmyadmin)
-  PASSWORD_BCRYPT (bawaan phpmyadmin)

#### Install dan configurasi ssh

update dan install

```sh
sudo apt-get update
```

```sh
sudo apt install openssh-server
```

configurasi
```sh
sudo ufw allow ssh
```
```
sudo nano /etc/ssh/sshd_config
```
untuk bagian port ubah sesuai yg di ingin kan misal 6969
```
port 6969
```

restart service ssh
```
sudo systemctl restart ssh
```

kemudian jalankan di cmd
``` 
ssh server@'iplocalhost' -port 6969
```
#### install apache 2
```sh
sudo apt install apache2
```
jalankan apache 2
```
sudo systemctl enable apache2
sudo systemctl start apache2
sudo systemctl status apache2
```
#### menginstall phpMyadmin

```
sudo apt install phpmyadmin
```
saat installasi :

- saat menginstall phpmyadmin jika muncul tampilan configurasi phpmyadmin centang pada bagian apache2 dengan menekan space bar, kemudian klik tab dan ok.
- jika muncul tampilan dbconfig pilih yes
- kemudian masukan password phpmyadmin nya

enable exkstensi php
```
sudo phpenmod mbstring
```

restart service
```
sudo systemctl restart apache2
```

untuk mengecek apache2 jalan apa tidak bisa memasukan https://iplocalhost dalam browser kesayangan dan untuk melihat phpmyadmin bia menuliskan  https://iplocalhost/phpmyadmin


#### Tampilan login
![image](https://github.com/Xzhacts-Crew/YellowHat/assets/145192908/8415679a-f7c6-43e6-aba1-7e6bf0cd1263)

#### Tampilan dashboard
![image](https://github.com/Xzhacts-Crew/YellowHat/assets/145192908/ffec882f-b9b9-4bce-aca5-60ecd1104141)
