# Trabajo Práctico N° 1 de Auditoria de Sistemas

Trabajo hecho por Bernachea Gabriela, de tercer año de Analisis y desarrollo de Software

Construido con MySQL/MariaDB (XAMPP/LAMPP)

## Requisitos

- XAMPP (Windows) o LAMPP (Linux) con Apache y MySQL/MariaDB
- PHP 8.1 o superior
- Git

## Instalación

### 1. Clonar el repositorio dentro de `htdocs`

**Windows**
```
cd C:\xampp\htdocs
git clone https://github.com/G4-crypto-Berna/TPAudiGabriela 
cd TPAudiGabriela
```

**Linux**
```
cd /opt/lampp/htdocs
git clone https://github.com/G4-crypto-Berna/TPAudiGabriela 
cd TPAudiGabriela

### 2. Crear la base de datos con el archivo que se encuentra en marketing.sql

Iniciar MySQL (desde el Panel de Control de XAMPP, o en Linux con `sudo /opt/lampp/lampp start`) e importar el esquema:

- **Vía phpMyAdmin:** importar el script `marketing.sql`.
- **Vía consola (Windows):**
```
  C:\xampp\mysql\bin\mysql -u root -e "source C:/xampp/htdocs/TPAudiGabriela/marketing.sql"
```
- **Vía consola (Linux):**
```
  /opt/lampp/bin/mysql -u root -e "source /opt/lampp/htdocs/TPAudiGabriela/marketing.sql"