initial(etat(dep,dep,dep,dep)).
final(etat(arr,arr,arr,arr)).




traverse(etat(dep,C,E,L),etat(arr,C,E,L),part(seul)):- E\=L,C\=E.
traverse(etat(dep,dep,E,L),etat(arr,arr,E,L),part(chou)):- E\=L.
traverse(etat(dep,C,dep,L),etat(arr,C,arr,L),part(chevre)).
traverse(etat(dep,C,E,dep),etat(arr,C,E,arr),part(loup)):- C\=E.

traverse(etat(arr,C,E,L),etat(dep,C,E,L),part(seul)):- E\=L,C\=E.
traverse(etat(arr,arr,E,L),etat(dep,dep,E,L),part(chou)):- E\=L.
traverse(etat(arr,C,arr,L),etat(dep,C,dep,L),part(chevre)).
traverse(etat(arr,C,E,arr),etat(dep,C,E,dep),part(loup)):- C\=E.

resoudre(EF,_,[]):-
	final(EF).
resoudre(EC,L,[A|S]):-
	traverse(EC,EN,A),                           
	absent(EN,L),
	resoudre(EN,[EN|L],S).
		
absent(_,[]).
absent(X,[E|L]):- 
	X\=E, 
	absent(X,L).
		
paysan(S):- initial(Init), resoudre(Init,[Init],S).
