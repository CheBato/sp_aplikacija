# sp_aplikacija
web aplikacija za predmet spletno programiranje

#**Spletna učilnica**
##**Utemeljitev aplikacije**
Za projektno nalogo sem si izbral narediti novo spletno učilnico za Ladislavo in Jovota, ki bo imela implementirane naslednje funkcionalnosti:
- dodajanje predmetov,
- dodajanje gradiv (besedilo, spletne povezave, različni dokumenti, predstavitve, ...) v predmet,
- objavo nalog (besedilo) in oddajanje rešenih nalog (nalaganje datoteke),
- ocenjevanje nalog,
- in po možnosti druge dodatne funkcionalnosti.
obrazlozitev:
	Trenutno spletno ucilnico gradi html koda in css, za izgled in navigacijo sem se specificno odlocil, saj je ciljna publika 
	vecinoma studentje/dijaki/ucenci. Navigacija temelji na tem da se da iz vecina strani priti na zazeljeno mesto. 
	- Gosti imajo le osnovni vpogled v studij in predmete, 
	- profesorji in asistenti bodo imeli moc spreminjati, dodajati naloge in ocenjevat v okviru svojega predmeta,
	- Studentski referat pa pravico dodajanja studentov in predmetov preko velikih excel datotek.
	- sami studentje pa bodo imeli vpogled nad svojimi ocenami, predmeti in nalogami.
	Preko koledarja bodo lahko videli datume svojih izpitov,kolokvijev in nalog hkrati pa tudi pomembne studijske dneve, forum bo prisoten
	pri vsakem predmetu kjer bodo imeli vsi razen gostje pravico dodati temo in komentar.
	
	


##**Ciljna publika**
Ciljna publika projekta so študentje/dijaki/ucenci, profesorji in asistenti na fakulteti/srednji soli/osnovni soli, kar je razvidno
po obliki in hkrati barvah spletnih strani.


##**Podprtost aplikacije**
Aplikacija bo podprta na vseh napravah razen mini browserjev. Probali bomo implementirat v vse vrste browserjev, kar pomeni implementacija
in preurejanje kode glede na kateri browser se uporablja.

##**Uporabljene tehnike**
Trenutno planirane tehnike so **html**,**CSS** in **javascript**. Seznam tehnik se bo tudi s časom povečal.

##**Preverjanje izgleda v drugih brskalnikih**
Večina strani se lepo odprejo na vseh ostalih brskalnikih, vendar se najdejo napačni zamaki. Edino tezavo na katero sem naletel je pri
ocene.html kjer zgleda pride do napake pri predmetih in tabelah, ki so collapsane notri IE mi ne pusti odpret in hkrati zapisuje A-je zraven
medtem, ko mozzila mi dopusti "collapsat" vendar prikaze isto A-je. V chrome browserju vse spletne strani delajo normalno.

##**2 zmogljivosti ali gradniki**
Po mojem sem najvec vlozil v ocene, predmete in koledar.html kjer sem sam moral z javascriptom narest collapse in tudi menjanje mesecev.

##**Morebitni komentarji**
Dodatno je treba implementirat dodajanje studentov, kolokvije, predmete in ostalo kar pride z backendom. Treba je tudi dodat forum 
na vsak predmet, vendar to tudi pride z backendom. Edino pri vizualizaciji je treba izboljsati flexs in prilagajanje, saj sem opazil bug ravno 
zadnji dan. Poleg tega je treba kvadrate, ki so v home.html in index.html polepsat z lepsim tekstom in ozadjem.