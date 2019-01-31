/* TP1 Programmation logique - L2 info */


/* Relations de famille */

/* Liste des femmes */
femme(lyarra).
femme(minisa).

femme(catelyn). 
femme(lysa).
femme(wylla).

femme(sansa). 
femme(arya).


/* Liste des hommes */
homme(rickard).
homme(hoster).

homme(ned).
homme(benjen).
homme(edmure).
homme(jon_arryn).
homme(tyrion).

homme(jon_snow). 
homme(bran).
homme(robert).


/* Relations m�re-enfant */
mere(lyarra,ned).
mere(lyarra,benjen).
mere(minisa,lysa).
mere(minisa,edmure).
mere(minisa,catelyn).

mere(catelyn, sansa).
mere(catelyn,arya).
mere(catelyn,bran).
mere(wylla,jon_snow).
mere(lysa,robert).


/* Relations p�re-enfant */
pere(rickard,ned).
pere(rickard,benjen).
pere(hoster,lysa).
pere(hoster,edmure).
pere(hoster,catelyn).

pere(ned, jon_snow).
pere(ned, sansa).
pere(ned,arya).
pere(ned,bran).
pere(jon_arryn,robert).


/* Couples mari�s */
conjoints(lyarra, rickard).
conjoints(hoster,minisa).
conjoints(catelyn,ned).
conjoints(jon_arryn,lysa).
conjoints(sansa, tyrion).

parent(X,Y):-pere(X,Y).
parent(X,Y):-mere(X,Y).

grandmere(X,Y):-mere(X,Z),parent(Z,Y).

grandpere(X,Y):-pere(X,Z),parent(Z,Y).
/*on met different car on ne peut pas etre son propre frere cousin ou cousine */
soeur(X,Y):-femme(X),
	pere(P,X),
	mere(M,X),
	pere(P,Y),
	mere(M,Y),
	X \= Y.

frere(X,Y):-homme(X),
	pere(P,X),
	mere(M,X),
	pere(P,Y),
	mere(M,Y),
	X \= Y.

cousine(X,Y):-femme(X),
	parent(P,X),
	parent(T,Y),
	frere(P,T),
	X \= Y.

cousine(X,Y):-homme(X),
	parent(P,X),
	parent(T,Y),
	soeur(P,T),
	X \= Y.

cousin(X,Y):-homme(X),
	parent(P,X),
	parent(T,Y),
	soeur(P,T),
	X \= Y.

cousin(X,Y):-homme(X),
	parent(P,X),
	parent(T,Y),
	frere(P,T),
	X \= Y.

tante(X,Y):-femme(X),
	parent(P,Y),
	soeur(X,P).

oncle(X,Y):-homme(X),
	parent(P,Y),
	frere(X,P).
/*on le fait dans les deux sens probleme de declaration de la base connaissances*/
bellefille(X,Y):-femme(X),
	parent(Y,P),
	conjoints(X,P).

bellefille(X,Y):-femme(X),
	parent(Y,P),
	conjoints(P,X).
/*on le fait dans les deux sens probleme de declaration de la base connaissances*/
gendre(X,Y):-homme(X),
	parent(Y,P),
	conjoints(X,P).

gendre(X,Y):-homme(X),
	parent(Y,P),
	conjoints(P,X).
/*trop de test pour eviter doublon etc*/
demisoeur(X,Y):-femme(X),
	parent(P1,X),
	parent(P2,Y),
	parent(T,X),
	parent(T,Y),
	P1 \= P2,
	T \= P1,
	T \= P2,
	X \= Y.

demifrere(X,Y):-homme(X),
	parent(P1,X),
	parent(P2,Y),
	parent(T,X),
	parent(T,Y),
	P1 \= P2,
	T \= P1,
	T \= P2,
	X \= Y.	
	

