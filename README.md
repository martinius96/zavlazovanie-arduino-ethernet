# Zavlažovanie - Arduino Mega 2560 + Ethernet W5100

* Webová aplikácia postavená na mikrokontroléri Arduino Mega 2560 s Ethernet konektivitou do vzdialeného webového rozhrania slúžiaceho na správu celého projektu

# Systém ponúka:
* Real-time výpis hodnôt, stavov, režimov všetkých výstupov, senzorov, prehľad konektivity Arduina
* Zmena názvov jednotlivých vstupov a výstupov napr. podľa miesta ich umiestnenia
* Prepínanie medzi chladením a vykurovaním miestnosti s automatickým a manuálnym režimom s voliteľnou nastaviteľnou požadovanou teplotou a hysterézou
* Časové ovládanie okruhov závlahy, ktorá vie fungovať v nastaviteľných časových intervaloch so zohľadnením počasia - neaktívne ak prší
* Oznámenia systému - chybné údaje od čidiel, neplatné prihlásenie od používateľa.
* Zmena prihlasovacieho mena a hesla
* Vzdialený reštart Arduina

# Inštalácia systému
* súbor export.sql importovať štruktúru a vzorové dáta tabuľky do MySQL databázy (napríklad prostredníctvom klienta PHPMyAdmin)
* v súbore system/connect.php zmeniť prihlasovacie údaje k MySQL databáze --> host, username, password, db_name
* Webaplikácia je pripravená na použitie s loginom --> **meno: admin heslo: admin**
* Súčasťou webaplikácie je aj zdrojový kód pre mikrokontróler v ktorom je potrebné zmeniť relatívnu cestu a hosta, kde webaplikácia beží
* Zdrojový kód pre mikrokontróler je možné nahrať cez prostredie Arduino IDE
* PHP scripty sú validné pre verziu 5.6 / 7

# Screenshoty systému
![Prehľad posledných údajov - Zavlažovanie](https://i.nahraj.to/f/23a7.PNG)
![Prehľad posledných údajov 2 - Zavlažovanie](https://i.nahraj.to/f/23a6.PNG)
![Zmena názvov - Zavlažovanie](https://i.nahraj.to/f/23a5.PNG)
![Ovládací panel automatickej závlahy - Zavlažovanie](https://i.nahraj.to/f/23a4.PNG)
![Grafická vizualizácia - teploty - Zavlažovanie](https://i.imgur.com/oBfiPXL.png)
![Grafická vizualizácia - aktivita okruhov - Zavlažovanie](https://i.imgur.com/bbRSWvm.png)
![Budíková reprezentácia maxím, miním, priemerných hodnôt za 24h, 7 dní, 30 dní - Zavlažovanie](https://i.imgur.com/Nj6iZG4.png)
