# Seed pro REST API na serveru pomoci PHP

#### Instalace (doplneni zavislosti)
composer install

#### Umístění
API umístíme do samostatného adresáře (např. server).
Napojíme pomocí .htaccess: 

<IfModule mod_rewrite.c>
    RewriteEngine On
    #RewriteBase /
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ /server/api.php/$1 [QSA,L]
</IfModule>