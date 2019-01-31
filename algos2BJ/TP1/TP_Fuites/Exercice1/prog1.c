#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>

#define N 10000
#define TAILLE 500 

typedef struct S_s
{
  int * tab_int[TAILLE] ; 
  char tab_char[TAILLE] ; 
} S_t ; 


char f3() 
{
  char c = 'a' + (rand() % ('z'+1)) ;
  return( c ) ;
}


int * f2() 
{
  /*on alloue de l'espace mémoire a i pour qu'il soit stocké convenablement*/
  int * i = malloc(sizeof(int));
  *i = rand();
  return(i);
}


S_t * f1() 
{
  int i,j;
 /*on alloue de l'espace mémoire pour la structure pour eviter tout probleme de fuite mémoire et que ce que l'on stocke soit placer de maniere a ne creer aucun probleme  */
  S_t * tab = malloc(sizeof(S_t)*N);

  for( i=0 ; i<N ; i++ )
    {
      for( j=0 ; j<TAILLE ; j++ ) 
	{
	  tab[i].tab_int[j] = f2();
	  tab[i].tab_char[j] = f3(); 
	}
    }

  return(tab); 
}



int main()
{
  S_t * tab; 
  int i,j;
  printf("Debut du programme\n"); 

  srand(getpid());

  printf("Appel de f1\n"); 
  tab = f1() ; 
  printf( "Retour de f1\n") ; 

  /*on libere juste tab[i].tab_int[j] car il est déclaré comme pointeur*/
  for( i=0 ; i<N ; i++ )
    {
      for( j=0 ; j<TAILLE ; j++ ) 
	{
	  free(tab[i].tab_int[j]);
	}
  }
  
  printf("Fin normale du programme\n"); 
  return(0); 
}
