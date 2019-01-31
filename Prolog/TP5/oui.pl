article(masc,sing) --> [le].
article(fem,sing) --> [la].
article(_,plur) --> [les].

nomPropre(_,sing) --> [camille].

nomCommun(masc,sing) --> [garçon].
nomCommun(fem,sing) --> [chaise].
nomCommun(fem,_) --> [souris].

adjectif(masc,sing) --> [petit].
adjectif(fem,sing) --> [petite].

verbeIntransitif(_,sing) --> [parle].
verbeIntransitif(_,sing) --> [tombe].
verbeIntransitif(_,plur) --> [courent].

verbeTransitif(_,sing) --> [regarde].
verbeTransitif(_,sing) --> [apporte].

groupeNominal(_,Y) --> nomPropre(_,Y).
groupeNominal(_,Y) --> article(X,Y),nomCommun(X,Y).
groupeNominal(_,Y) --> article(X,Y),adjectif(X,Y),nomCommun(X,Y).

groupeVerbal(_,Y) --> verbeIntransitif(_,Y).
groupeVerbal(_,Y) --> verbeTransitif(_,Y), groupeNominal(_,_).

maphrase --> groupeNominal(_,Y),groupeVerbal(_,Y).

debute(X):-maphrase([X|Q],[]),
	write([X|Q]).

nbphrase():-findall(L,maphrase([_|L],L1),L1),length(L1,X),
	write(X).


