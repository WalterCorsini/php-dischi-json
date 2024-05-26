Descrizione
Dobbiamo creare una web-app che permetta di leggere e stampare in pagina una lista di dischi presente nel nostro server.
Stack
Html, CSS, VueJS (importato tramite CDN), axios, PHP
Consigli
Nello svolgere l’esercizio seguite un approccio graduale.
Prima assicuratevi che la vostra pagina index.php (il vostro front-end) riesca a comunicare correttamente con il vostro script PHP (le vostre “API”).
Solo a questo punto sarà utile passare alla lettura della lista da un file JSON.
Bonus :stella2:
1. Aggiungete ad ogni disco la chiave "like" con valore booleano che rappresenta se l'utente ha aggiunto il disco ai preferiti.
Al click sul bottone per ogni disco fare una chiamata api che cambia il valore del like nel file json e invia l'array di dischi aggiornati da stampare in pagina.
2. Permettere all'utente di selezionare se visualizzare tutti i dischi o solo quelli preferiti. Il filtro deve essere applicato lato server. Quindi il client invia la richiesta al server con il valore del filtro, il server prepara l'array di dischi in base al filtro e lo invia al client.

# API

## AllAlbum
### show all album in list
URL: "http://localhost/boolean/php-dischi-json/server.php"
METHOD: GET
RESPONSE:
    result: array

## onlyLiked
### show only liked album
URL: "http://localhost/boolean/php-dischi-json/server.php"
METHOD: POST
REQ_BODY:
    action: string
RESPONSE:
    result: array

## addLike
### add or remove like to album in list
URL: "http://localhost/boolean/php-dischi-json/server.php"
METHOD: POST
REQ_BODY:
    id: number
RESPONSE:
    result: array


# FUNCTION

## get_data
### get data to file json

## change_id
### change key "like" true to false and reverse

## put_data
### refresh data in file json

## only_liked
### filter only disc with like true

## prepare_response
### prepare the response to send to client


1) nel created lancio la funzione AllAlbum
    - fa una chiamata get axios
    - se riceve la risposta
        - salva i dati in un array locale
    - se clicco un disco in pagina
        - fa una chiamat post axios passando l'id del disco
        - il sever cambia il valore della key "like" da true a false e viceversa.
            - questa chiamata è una chiamata put, cio vuol dire che non riceve risposta.
            - il file json e l'array locale si aggiornano al click della card,(quindi non avviene un refresh vero ma i dati sono comunque aggiornati).
            Questà scelta è stata fatta perchè nella visualizzazione dei preferiti, al cambio di valore true o false della variabile "like",la chiamata avrebbe rimandato in pagina tutti i dischi uscendo dalla visualizzazione preferiti.
            la scelta è stata fatta anche perche si è pensato che si potesse togliere il mi piace per sbaglio e si potesse comunque rimediare subito senza andare a ricercare il brano successivamente tra tutti.
    - se clicco nell'header al link "visualizza preferiti"
        - faccio una chiamata post al server
            - filtra tutti i dischi che hanno like uguale a true restituendoli in pagina
    - se clicco su visualizza tutto richiama la funzione AllAlbum che mostra tutti gli album in pagina.