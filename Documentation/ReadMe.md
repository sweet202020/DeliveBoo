# Task del progetto finale

## Introduzione 
- diagramma database
- installazione varie lato laravel (breeze)


## Tipi di Utenti 
- clienti che visitano il sito
- ristoratore: un utente che ha effettuato la registrazione come ristoratore


## Lista delle pagine 
- homepage
- pagina menu ristoratore (compreso il menu e il carrello)
- pagina carrello/checkout (modifica del carrello e pagamento con documentazione braintree)
- Dashboard ristoratore: CRUD
	-pagina lista piatti in ordine alfabetico
	-pagina piatto singolo con descrizione (ingredienti) e prezzo
	-pagina lista ordini ricevuti
	-statistiche (bonus da chiarire venerdi) chartjs


## Requisiti Tecnici 

- Client-side Validation 
Tutti gli input inseriti dall'utente sono controllati client-side (oltre che server-side) per un
controllo di veridicità (es. il prezzo di un piatto deve essere positivo).
creare una funzione lato vue per la validazione della chiamat ajax

- Sistema di Pagamento 
braintree

- Il sito è responsive 

- La ricerca dei ristoranti avviene senza il refresh (vedere breaking bad api)


## Requisiti Funzionali 
- Permettere ai ristoratori di registrarsi alla piattaforma 

- L'applicazione permette ai ristoratori di registrarsi alla piattaforma e creare un profilo.

- Risultato: Un nuovo utente viene creato nel sistema

- Eccezioni: Esiste già nel sistema un utente con l'email inserita

- Le informazioni che l'utente può inserire sono:\
★ Email (unique!!!!!) *\
★ Password * \
★ Nome Attività * \
★ Indirizzo * \
★ PIVA * \
★ Uno o più tipologie * : italiano, internazionale, cinese, giapponese, messicano, indiano, pesce, carne, pizza...

        --> Sono contrassegnati con * i dati obbligatori. <--

- Permettere ai ristoratori di aggiungere un piatto:\
★ Nome piatto\
★ Ingredienti/descrizione\
★ Prezzo\
★ visibile si/no

- Permette ai visitatori di ricercare per tipologia di ristorante
Un utente è in grado di ricercare per una o più tipologie di ristorante


- Permettere ai visitatori di vedere il menu di un ristorante 4
Viene visualizzata la pagina del menu


- Permettere ai UI di pagare l'ordinazione 
inserire dati corretti della carta di credito altrimenti visualizzare messaggio di errore (carta scaduta)

- Permettere ai ristoratori di visualizzare il riepilogo degli ordini ricevuti 
L'utente visualizza il riepilogo degli ordini ricevuti, ordinati in modo decrescente
per data

- Permettere ai ristoratori di visualizzare le statistiche degli ordini 
L'utente visualizza le statistiche degli ordini ricevuti per mese/anno e l'ammontare
delle vendite


## bottoni

-link
`https://uiverse.io/Cornerstone-04/bitter-impala-54`

-aggiunta al carrello e paga/modifica ordine
`https://uiverse.io/cssbuttons-io/stupid-impala-51`


-form submit (search-form), menu e tasto login per l'admin
`https://uiverse.io/gagan-gv/massive-goat-19`


