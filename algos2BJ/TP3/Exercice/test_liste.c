#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <getopt.h>
#include <individu.h>
#include <fraction.h>
#include <mystring.h>
#include <liste.h>



/*********************************
Pas eu le temps d'aborder les tris
*********************************/



int
main( int argc, char * argv[] ) /* argument qui donne le nb d'objets des listes */ 
{


  int var;

  static struct option longopts[] =
{
  {"verbose", required_argument, NULL, (int)'v'},
  {0, 0, 0, 0}
};



 if(argc > 1){

  var = getopt_long(argc, argv, "v", longopts, NULL);

  int N = atoi(argv[1]);
  
/* 
  sscanf(argv[1], "%i", &N);  renvoie 1 si ok, sinon 0 
*/

  int choix;

  err_t (*fonc_aff_individu) (void *, void*);
  err_t (*fonc_aff_fraction) (void *, void*);
  err_t (*fonc_aff_string) (void *, void*);

  err_t (*fonc_destr_individu) (void*);
  err_t (*fonc_destr_fraction) (void*);
  err_t (*fonc_destr_string) (void*);


  do{ /* Rajout du choix sur l'ajout d'un élément */
    printf("\nMenu sélection :\n");
      printf("1 - Ecrire les éléments par référencement.\n");
      printf("2 - Ecrire les éléments par copie.\n");
      printf("Choisir ? --> ");
      scanf("%i",&choix);

      switch(choix){

      case 1:
        fonc_aff_individu = individu_referencer;
	fonc_aff_fraction = fraction_referencer;
	fonc_aff_string = string_referencer;

        fonc_destr_individu = individu_effacer;
        fonc_destr_fraction = fraction_effacer;
        fonc_destr_string = string_effacer;
	
      break;

      case 2:
        fonc_aff_individu = individu_copier;
	fonc_aff_fraction = fraction_copier;
	fonc_aff_string = string_copier;

        fonc_destr_individu = individu_detruire;
        fonc_destr_fraction = fraction_detruire;
        fonc_destr_string = string_detruire;
	
      break;

      default: printf("Err !!! Votre choix doit etre 1 ou 2 !");
      }

  }while(choix != 1 && choix != 2);




  err_t noerr = OK; 

  individu_t ** individus = NULL  ; 
  fraction_t ** fractions = NULL  ;
  string_t ** strings = NULL  ; 

  liste_t * liste = NULL ; 
  int i = 0 ; 
 
  individus = malloc( sizeof(individu_t *) * N )  ; 
  fractions = malloc( sizeof(fraction_t *) * N )  ;
  strings = malloc( sizeof(string_t *) * N )   ; 

  printf( "Debut du programme des test sur les listes de %d objets homogenes\n" , N ) ; 


 /* ---------- */

  individus = malloc( sizeof(individu_t *) * N )  ; 
  fractions = malloc( sizeof(fraction_t *) * N )  ;
  strings = malloc( sizeof(string_t *) * N )   ; 

  printf( "\nCreations des variables de travail\n" ) ;
  
  printf( "\tindividus..." ) ; fflush(stdout) ;
  char prenom[128] ;
  char nom[128] ; 
  for( i=0 ; i<N ; i++ ) 
    {
      sprintf( nom , "nom_%d" , N-i ) ;
      sprintf( prenom , "prenom_%d" , N-i ) ;
      individus[i] = individu_creer( prenom , nom ) ; 
    }
  printf("OK\n"); 

  printf( "\tfractions..." ) ; fflush(stdout) ;
  for( i=0 ; i<N ; i++ ) 
    {
      fractions[i] = fraction_creer( N-i , N-i+1 ) ; 
    }
  printf("OK\n");

  printf( "\tstrings..." ) ; fflush(stdout) ;
  char string[128] ;
  for( i=0 ; i<N ; i++ ) 
    {
      sprintf( string , "string_%d" , N-i ) ; 
      strings[i] = string_creer( string ) ; 
    }
  printf("OK\n");

  /* ---------- */
  if( var == 'v' ){
    printf( "\nTest creation d'une liste de %d individus \n" , N ) ;
  }
  liste = liste_creer(N, fonc_aff_individu, fonc_destr_individu) ; 
 
  for( i=0 ; i<N ; i++ ) 
    {
      liste_elem_ecrire( liste , individus[i] , i ) ;
    }

  if( var == 'v' ){
    printf( "Test affichage liste d'individus AVANT tri \n" ) ;
  }

  liste_afficher( liste , (void*)individu_afficher ) ; 
  printf( "\n");

  if( var == 'v' ){
    printf( "Test Tri de la liste des individus\n" );
  }
  liste_trier( liste  ) ;

  if( var == 'v' ){
    printf( "Test affichage liste d'individus APRES tri\n" ) ;
  }
  liste_afficher( liste , (void*)individu_afficher ) ; 
  printf( "\n");

  if( var == 'v' ){
    printf( "Test destruction liste d'individus\n" ) ;
  }

  if( ( noerr = liste_detruire( &liste ) ) )
    { 
      printf("Sortie avec code erreur = %d\n" , noerr ) ;
      return(noerr) ; 
    }

  if( var == 'v' ){
    printf( "\nTest creation d'une liste de %d fractions \n" , N ) ;
  }
  liste = liste_creer(N, fonc_aff_fraction, fonc_destr_fraction) ; 
 
  for( i=0 ; i<N ; i++ ) 
    {
      liste_elem_ecrire( liste , fractions[i] , i ) ;
    }

  if( var == 'v' ){
    printf( "Test affichage liste de fractions AVANT tri\n" ) ;
  }
  liste_afficher( liste , (void*)fraction_afficher ) ; 
  printf( "\n");

  if( var == 'v' ){
    printf( "Test Tri de la liste des fractions\n" );
  }
  liste_trier( liste ) ;

  if( var == 'v' ){
    printf( "Test affichage liste des fractions APRES tri\n" ) ;
  }
  liste_afficher( liste ,  (void*)fraction_afficher ) ; 
  printf( "\n");
 
  if( var == 'v' ){
    printf( "Test destruction liste de fractions\n" ) ;
  }

  if( ( noerr = liste_detruire( &liste ) ) )
    { 
      printf("Sortie avec code erreur = %d\n" , noerr ) ;
      return(noerr) ; 
    }
  
  if( var == 'v' ){
    printf( "\nTest creation d'une liste de %d strings \n" , N ) ;
  }
  liste = liste_creer(N, fonc_aff_string, fonc_destr_string) ;  

  for( i=0 ; i<N ; i++ ) 
    {
      liste_elem_ecrire( liste , strings[i] , i ) ;
    }

  if( var == 'v' ){
    printf( "Test affichage liste de strings AVANT tri\n" ) ;
  }
  liste_afficher( liste ,  (void*)string_afficher ) ; 
  printf( "\n");
 
  if( var == 'v' ){
    printf( "Test Tri de la liste des strings\n" );
  }
  liste_trier( liste  ) ;
  
  if( var == 'v' ){
    printf( "Test affichage liste des strings APRES tri\n" ) ;
  }
  liste_afficher( liste ,  (void*)string_afficher ) ; 
  printf( "\n");
  
  if( var == 'v' ){
    printf( "Test destruction liste de strings\n" ) ;
  }

  if( ( noerr = liste_detruire( &liste  ) ) )
    { 
      printf("Sortie avec code erreur = %d\n" , noerr ) ;
      return(noerr) ; 
    }



 /* ---------- */

  printf( "\nDestructions des variables de travail\n" ) ;

  printf( "\tindividus..." ) ; fflush(stdout) ; 
  for( i=0 ; i<N ; i++ ) 
    {
      if( ( noerr = individu_detruire( &individus[i] ) ) )
	{ 
	  printf("Sortie avec code erreur = %d\n" , noerr ) ;
	  exit(-1) ; 
	}
    }
  free( individus ) ;
  printf("OK\n"); 


  printf( "\tfractions..." ) ; fflush(stdout) ; 
  for( i=0 ; i<N ; i++ ) 
    {
      if( ( noerr = fraction_detruire( &fractions[i] ) ) )
	{ 
	  printf("Sortie avec code erreur = %d\n" , noerr ) ;
	  exit(-1) ; 
	}
    }
  free( fractions ) ;
  printf("OK\n"); 

  
  printf( "\tstrings..." ) ; fflush(stdout) ; 
  for( i=0 ; i<N ; i++ ) 
    {
      if( ( noerr =string_detruire( &strings[i] ) ) )
	{ 
	  printf("Sortie avec code erreur = %d\n" , noerr ) ;
	  exit(-1) ; 
	}
    }
  free( strings ) ; 
  printf("OK\n"); 

  
  /* ---------- */


  printf( "\nFin du programme des test sur la liste d'objets homogenes\n" ) ; 
  
  printf( "Nombre de liste_t  = %lu\n" , liste_cpt ) ;

 }
 else{
  printf("Erreur - faire ./test_liste (nb obj) (option verbose)\n");
 }

  return(0) ; 
}
