// PSEUDO-CODE
/*
TP 1 :
EXO 1 /
DEBUT
    VARIABLE tempCel : ENTIER

    ECRIRE("Quel est la T° en celsius ?")
    LIRE(tempCel)

    tempCel <- 32
    tempFah <- (tempCel * 9/5) + 32

    ECRIRE(tempFah)
FIN

EXO 2 /
DEBUT

    VARIABLE prixHt : REEL
    VARIABLE tauxTva : REEL
    VARIABLE pourcent : REEL

    ECRIRE("prix HT de l'article ?")
    LIRE(prixHt)
    ECRIRE("son taux TVA ?")
    LIRE(tauxTva)
    ECRIRE("pourcentage de remise ?")
    LIRE(pourcent)

    prixHt <- 100
    tauxTva <- 20
    pourcent <- 10

    VARIABLE remise : REEL
    VARIABLE prixHtRemise : REEL
    VARIABLE tva : REEL
    VARIABLE prixFinalTtc : REEL


    remise <- prixHt * (pourcent / 100)
    prixHtRemise <- prixHt - remise
    tva <- prixHtRemise * (tauxTva / 100)
    prixFinalTtc <- prixHtRemise + tva


    ECRIRE("Prix final TTC à payer : " + prixFinalTtc + " €")
FIN

EXO 3/
DEBUT
    VARIABLE a, b, temp : ENTIER
    a <- 5
    b <- 3

    temp <- a
    a <- b
    b <- temp

    ECRIRE("a = ", a, ", b = ", b)
FIN
Question : Pourquoi ecrire a ← b puis b ← a ne fonctionne-t-il pas ?
les deux voudront b


EXO 4/
DEBUT
    VARIABLE poids : ENTIER
    VARIABLE taille : REEL

    ECRIRE("Votre poids en kg :")
    LIRE(poids)

    ECRIRE("Votre taille en m :")
    LIRE(taille)

    VARIABLE calcTaille : REEL
    VARIABLE imc : REEL
    VARIABLE imcCalc : REEL

    calcTaille <-  taille * taille
    imc <-   poids / calcTaille
    imcCalc <-  Math.round(imc * 10.0) / 10.0

    ECRIRE("Votre IMC est de  : " + imcDec)

    SI imcDec < 18.5
    ECRIRE("Insuffisance ponderale")
    SINON SI imcDec > 18.5 && imcDec < 24.9
    ECRIRE("Poids normal")
    SINON SI imcDec > 25.0 && imcDec < 29.9
    ECRIRE("Surpoids")
    SINON
    ECRIRE("Obesite")
FIN


Objectifs : Probleme concret multi-etapes, decomposition en sous-calculs, arrondi superieur.
Un peintre veut un programme de devis. Regles :
Surface des murs = perimetre × hauteur (4 murs, sans sol ni plafond)
Retirer 20% pour portes/fenetres
1 pot de peinture couvre 10 m²
Nombre de pots arrondi au superieur
1 pot coute 29.90 €
Le programme demande longueur, largeur et hauteur, puis affiche la surface nette, le nombre de pots et
le prix total.
Question : Quelle fonction JS pour l'arrondi superieur ? Pourquoi pas Math.round() ?

*/


import java.util.Scanner;

public class Tp {
    public static void exo1() {
        Scanner sc = new Scanner(System.in);

        System.out.println("Bonjour, quel T° en C° fait il ?");
        int tempCel = sc.nextInt();

        int tempFah = (tempCel * 9/5) + 32;

        System.out.println("La T° en F est de : " + tempFah);

        sc.close();
    }

    public static void exo2() {
        Scanner sc = new Scanner(System.in);

        System.out.println("prix HT de l'article ? ");
        float prixHt = sc.nextFloat();

        System.out.println("son taux TVA ? ");
        float tauxTva = sc.nextFloat();

        System.out.println("pourcentage de remise ? ");
        float pourcent = sc.nextFloat();

        float remise = prixHt * (pourcent / 100);
        float prixHtRemise = prixHt - remise;
        float tva = prixHtRemise * (tauxTva / 100);
        float prixFinalTtc = prixHtRemise + tva;

        System.out.println("Prix final TTC à payer : " + prixFinalTtc + " €");

        sc.close();
    }

    public static void exo3() {

        int a;
        int b;
        int temp;

        a = 5;
        b = 3;

        temp = a;
        a = b;
        b = temp;

        System.out.println("a = " + a + " b = " + b);

        int c;
        int d;

        c = 0;
        d = 42;

        c = c + d;
        d = d - c;

        System.out.println("c = " + c + " d = " + d);

        int f;
        int e;

        e = -1;
        f = -1;

        System.out.println("e = " + e + " f = " + f);

    }

    public static void exo4() {
        Scanner sc = new Scanner(System.in);

        System.out.println("Votre poids en kg :");
        int poids = sc.nextInt();

        System.out.println("Votre taille en m :");
        float taille = sc.nextFloat();

        float calcTaille = taille * taille;
        float imc = poids / calcTaille ;
        double imcDec = Math.round(imc * 10.0) / 10.0;

        System.out.println("Votre IMC est de  : " + imcDec);

        if (imcDec < 18.5) {
            System.out.println("Insuffisance ponderale");
        } else if (imcDec > 18.5 && imcDec < 24.9) {
            System.out.println("Poids normal");
        } else if (imcDec > 25.0 && imcDec < 29.9) {
            System.out.println("Surpoids");
        } else {
            System.out.println("Obesite");
        };

        sc.close();
    }

    public static void exo5() {
        Scanner sc = new Scanner(System.in);

        double pot = 29.90;

        System.out.println("longeur ? :");
        int longeur = sc.nextInt();

        System.out.println("largeur ? :");
        int largeur = sc.nextInt();

        System.out.println("hauteur ? :");
        float hauteur = sc.nextFloat();

        float surface = (largeur * hauteur) * 2;
        float surface2 = (longeur * hauteur) * 2;

        float totalSurface = surface + surface2;
        double calPeF = totalSurface * 0.80;

        double pots = calPeF / 10;
        double arrondiPots = Math.ceil(pots);
        double prixPots = arrondiPots * pot;


        System.out.println("surface nette : " + calPeF + " prix pots : " + prixPots);

        sc.close();
    }


    public static void main(String[] args) {
        exo5();
    }
}

