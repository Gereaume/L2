
dupliquer([],[]).
dupliquer([T|Q],[T,T|R]):-dupliquer(Q,R).

ajouter(_,[],[]).
ajouter(N,[T|Q],[R|S]):-R is T+N,ajouter(N,Q,S).

croissante([_]).
croissante([T1,T2|Q]):- T1 < T2, croissante([T2|Q]).

enieme(1,[T|_],T).
enieme(N,[_|Q],E):-N>0, M is N-1,enieme(M,Q,E).
