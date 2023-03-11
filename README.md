# Corso PHP con Ciraolo
> Video corso: https://youtube.com/XXX  
> Canale Zavy: https://www.youtube.com/@zavy86  
> Canale Ciraolone: https://www.youtube.com/@ciraolone  
> Repository video corso: https://github.com/Zavy86/corso-php-ciraolo

## Sviluppo tramite Laragon
Per sviluppare tramite Laragon dovete creare un virtualhost

`XXX`

e copiare al suo interno tutti i file presenti in questo repository
(tranne la directory docker che è inutile in questo caso).

## Sviluppo tramite Docker
Per sviluppare tramite docker dovete prima di tutto ovviamente 
installare docker, dopodiché potete "tirare su" i container con
questi due semplici comandi:

`cd docker`

`make docker`

Se non avete a disposizione make eseguite questi comandi:

`docker-compose -p corso-php-ciraolo build --no-cache`

`docker-compose -p corso-php-ciraolo up -d`

A questo punto potete aprire il vostro browser e andare al link 
http://localhost

Se tutto è andato a buon fine dovreste vedere la vostra applicazione.

## Domande?
Se avete delle domande potete lasciare un commento sotto al video sul
canale di Andrea Ciraolo oppure potete venire a seguire il corso PHP
sul mio canale e commentare sotto uno dei miei video!
