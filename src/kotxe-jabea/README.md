# kotxe-jabea

```ascii
+--------+           +---------+
| jabeak |---<1:N>---| kotxeak |
+--------+           +---------+

jabeak:
- id
- DNI
- Izena

kotxeak:
- id
- jabea_id (Nulua izan daiteke. Jaberik gabeko kotxea)
- matrikula
- matrikulazio_data
- ITV: boolearra (ITV pasata du ala ez)
```

```sql
CREATE DATABASE kotxe_jabe;

USE kotxe_jabe;

CREATE TABLE jabeak (
    id INT AUTO_INCREMENT PRIMARY KEY,
    DNI VARCHAR(9) NOT NULL,
    izena VARCHAR(100) NOT NULL
);

CREATE TABLE kotxeak (
    id INT AUTO_INCREMENT PRIMARY KEY,
    jabea_id INT,
    matrikula VARCHAR(7) NOT NULL,
    matrikulazio_data DATE,
    itv BOOLEAN,
    FOREIGN KEY (jabea_id) REFERENCES jabeak(id) ON DELETE SET NULL
);
```

1 - Datu basea sortu (db.sql) eta jabeak eta kotxeak taula, datu batzukin bete. Kotxeari ez asignatu jaberik.

2 - Kotxeari jabea asignatzeko aplikazio egin. Asignazioa ```HTML <select>``` elementua erabiliz egin. Kontutan hartu, jaberik gabeko kotxea egon daitekeela.

3 - Kotxe bateko datuak aldatzeko formularioa egin. Datuak balidatu.

