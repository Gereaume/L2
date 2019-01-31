/*1*/

	


/*2*/
identique(L):- sort(L,N),
	length(N,A),
	A == 1.

/*3*/
entrelacer([],[],L).
entrelacer(_,_,L):-entrelacer([T1|Q1],[T2|Q2],[T1,T2|_]),
		entrelace([Q1|_],[Q2|_],L).
	
