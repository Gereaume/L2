
entree(crudite,6,100).
entree(taboule,8,150).
entree(avocat,5,200).

plat(couscous,12,400).
plat(risotto,10,300).
plat(lasagne,12,500).

dessert(glace,6,200).
dessert(fruit,5,100).
dessert(gateau,8,300).


menu(P,E,C,X) :-plat(P,P1,C1), entree(E,P2,C2), X is P1+P2,C is C1+C2.
menu(P,D,C,X) :-plat(P,P1,C1), dessert(D,P2,C2), X is P1+P2,C is C1+C2.


