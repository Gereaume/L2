fibo(0,0).
fibo(1,1).
fibo(N,V):-
 N>1, N1 is N-1, N2 is N-2,
 fibo(N1, V1), fibo(N2, V2),
 V is V1+V2.
 	 
nettoyer :- retract(valeur_fibo(_,_)), fail.

afficher(X):- format("On ajoute ",[], write(x), n1).

fibo2(N):-
	asserta(valeur_fibo(0,0)),
	asserta(valeur_fibo(1,1)),
	fibo2(N,V).
		
