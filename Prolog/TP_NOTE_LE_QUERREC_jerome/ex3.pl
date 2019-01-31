/* TP6 Programmation logique - L2 info */


/* Exercice 3: pr�dicats pr�d�finis */

film(metropolis,1927,fritzLang).
film(theLodger,1927,alfredHitchcock).
film(lAurore,1927,friedrichMurnau).
film(aliceInWonderland,1972,williamSterling).
film(abyss,1989,jamesCameron).
film(titanic,1997,jamesCameron).
film(avatar,2009,jamesCameron).
film(aliceInWonderland,2010,timBurton).
film(missPeregrine,2016,timBurton).


/*1*/
nbSorties(A,N):- findall(A,film(_,A,_),L),
	length(L,N).

/*2*/
filmographie(R,L):- findall(Q,film(Q,_,R),L).

/*3*/	
cineMuet(L):- findall(A,film(_,A,_),R),
	sort(R,[An|_]),
	findall(Q,film(Q,An,_),L).

/*4*/
plusRecent(R,T):- findall(A,film(_,A,R),L),
	sort(L,Lt),
	reverse(Lt,[An|_]),
	findall(Q,film(Q,An,R),T).
	
/*5*/
sansRemake(T):- findall(T,film(T,_,_),L),
	length(L,N),
	N ==1.


