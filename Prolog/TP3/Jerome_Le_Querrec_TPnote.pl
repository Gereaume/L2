/* TP3 Programmation logique - L2 info - Jerome LE QUERREC */

/* Exercice 1 */

/* Joueurs, jour d'entrainement et points au classement */

joue(rafael,mardi,40).
joue(roger,vendredi,50).
joue(ivan,dimanche,10).
joue(john, mardi,40).
joue(yannick,dimanche,20).
joue(serena,lundi,40).
joue(cristina,dimanche,30).
joue(venus,jeudi,30).
joue(martina,jeudi,30).
joue(ana,vendredi,20).

homme(rafael).
homme(roger).
homme(john).
homme(ivan).
homme(yannick).

femme(serena).
femme(martina).
femme(venus).
femme(cristina).
femme(ana).

/* covoiturage */

covoiturage(J1,J2,J3):-joue(J1,D,_),
	joue(J2,D,_),
	joue(J3,D,_),
	J1 \= J2,
	J2 \= J3,
	J1 \= J3.

		
/* meme categorie */

memeCategorie(J1,J2):-homme(J1),
	homme(J2).
memeCategorie(J1,J2):-femme(J1),
	femme(J2).
		
/* match simple */

matchSimple(J1,J2):-memeCategorie(J1,J2),
	joue(J1,D1,P1),
	joue(J2,D2,P2),
	D1 = D2,
	P1 = P2,
	J1 \= J2.

/* double mixte */

doubleMixte(J1,J2):-femme(J1),
	homme(J2),
	joue(J1,D1,_),
	joue(J2,D2,_),
	D1 = D2.
		
		
/* Exercice 2 */

puissance(x,n,r):-n = 0,
	r is 1.
		
puissance(x,n,r):-n s
	r is (x^(n/2))^2.

puissance(x,n,r):-


/* Exercice 3 */

/* Langages de programmation */

annee(1,[assembleur, c,javascript]).
annee(2,[prolog, lisp, python]).
annee(3,[ruby, java]).
annee(4,[cplus,xml,uml]).
annee(5,[scheme, caml]).

etudiant(tom,1).
etudiant(jane,1).
etudiant(zoe,2).
etudiant(jack,2).
etudiant(bill,3).
etudiant(tim,4).
etudiant(nina,5).

/* Utilitaires */

trouvelem(e1,[e1]).
trouvelem(e1,[_|Q]):-trouvelem(e1,Q).

/* Questions */

/* apprend/2: un etudiant et les langages qu'il est en train d'apprendre */

apprend(prenom,language):-etudiant(prenom,num),
	annee(num,L),
	trouvelem(language,L).

/* anneesInscrits/2 liste des annees ou sont inscrits un ensemble d'etudiants */
anneesInscrits([],_).
anneesInscrits([T|Q],L):-etudiant(T,n),
	anneesInscrit(Q,[L|n]).

/* prerequis/2 une annee et tous les langage appris les annees precedentes */


/* candidat/2 vrai si la liste des langages connus permet de candidater une annee donnee*/





