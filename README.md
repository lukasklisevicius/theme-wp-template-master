## Punti fondamentali tema WP

**WP**
 - corretta gerarchia dei file:
	 - ogni template al suo posto, non utilizzare index.php per homepage o simili
 - stringhe sempre traducibili, in modo che un sito possa diventare multilingua in ogni momento.
	 - non utilizzare costanti o variabili per dominio del tema (non funzionano)
 - utilizzare funzioni wp
	 - non importare assets "alla vecchia maniera", ma sfruttare gli enqueue di wp
- meno plugin possibili, rallentano di molto le prestazioni
	- form custom, no CF7
- campi acf sincronizzati via json

```
.
+-- assets
| +-- scss
|  +-- custom.scss
| +-- js
|  +-- app.scss
+-- dist
| +-- css
|  +-- custom.css
| +-- js
|  +-- app.min.js
+-- template-parts
|   +-- social.php
|   +-- map.php
+-- templates
|   +-- about_us.php
+-- functions.php
+-- front-page.php
+-- home.php

```

**Assets**
- framework CSS: [Tailwind CSS](https://tailwindcss.com/docs)
	- fornisce molte classi, il css aggiuntivo dev'essere il minore possibile
- file grafici scritti in SCSS (o SASS) e poi compilati attraverso Node, Yarn e Laravel Mix
	- in questo modo è possibile differenziare i file di sorgente, con i file di distribuzione finale che verranno importati dal tema
		- nei file sorgente è possibile (anzi consigliato) aggiungere commenti, in modo che il codice possa essere comprensibile anche ad altri sviluppatori. Tanto il file finale sarà compilato e minimizzato (per cui i commenti verranno eliminati e non aumenteranno il peso del file)
- File css spezzetati in componenti (ad esempio header.scss, footer.scss ecc)
- Non utilizzare lo style.css come compilato finale, è meglio lasciarlo lì per modificare la versione del tema, che dev'essere aggiornata a ogni modifica del tema
- niente CDN, tutte le librerie utili si possono installare attraverso Yarn

**GIT**
- ogni tema avrà un suo repository, dove ovviamente non devono essere caricati i node_modules
- è possibile quindi lavorare in locale, compilare e poi attraverso plugin-update-checker rilasciare l'aggiornamento del tema e scaricarlo nel sito live
