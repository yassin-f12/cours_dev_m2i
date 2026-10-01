import java.util.Scanner;

public class Tp2 {
    public static void exo1() {
        Scanner sc = new Scanner(System.in);

        System.out.println("nombre 1 :");
        int nb1 = sc.nextInt();
        System.out.println("nombre 2 :");
        int nb2 = sc.nextInt();
        System.out.println("operateur ? :");
        String ope = sc.next();

        switch (ope) {
            case "+" :
                System.out.println(nb1 + nb2);
                break;
            case "-" :
                System.out.println(nb1 - nb2);
                break;
            case "*" :
                System.out.println(nb1 * nb2);
                break;
            case "/" :
                if (nb1 == 0 || nb2 == 0) {
                    System.out.println("division par 0 impossible");
                } else {
                    System.out.println(nb1 / nb2);
                };
                break;
            default:
                System.out.println("calcul impossible ou votre operateur est inconnu");
        }
        sc.close();
    }

    public static void exo2() {
        Scanner sc = new Scanner(System.in);

        int choice = 1 + (int) (Math.random() * 100);

        System.out.println("nombre entre 1 et 100 :");
        int tentative = 0;

        while (true) {
            int choixUser = sc.nextInt();

            if (choixUser > choice) {
                System.out.println("plus petit !");
                tentative++;
            } else if (choixUser < choice) {
                System.out.println("plus grand !");
                tentative++;
            } else {
                System.out.println("GG !" + "vous avez trouver en : " + tentative);
                return;
            }
        }
    }

    public static void exo3() {

        for (int n = 1; n <= 105; n++) {
            if (n % 3 == 0 && n % 5 == 0) {
                System.out.println("FizzBuzz");
            } else if (n % 5 == 0) {
                System.out.println("Buzz");
            } else if (n % 3 == 0) {
                System.out.println("Fizz");
            } else if (n % 7 == 0) {
                System.out.println("Wazz");
            } else {
                System.out.println(n);
            }
        }
    }

    public static void exo4() {
        Scanner sc = new Scanner(System.in);

        System.out.println("Taper votre mdp : ");
        String mdp = sc.next();

        for (int i = 0; i < mdp.length() ; i++) {
            if (mdp.length() < 8) {
                System.out.println("Au moins 8 caracteres, re-essai");
                mdp = sc.next();
            } else {
                boolean contientMaj = false;
                for (int m = 0; m < mdp.length(); m++) {
                    if (Character.isUpperCase(mdp.charAt(m))) {
                        contientMaj = true;
                    }
                }
                if (!contientMaj) {
                    System.out.println("Au moins une majuscule, re-essai");
                    mdp = sc.next();
                } else {
                    boolean contientMin = false;
                    for (int e = 0; e < mdp.length(); e++) {
                        if (Character.isLowerCase(mdp.charAt(e))) {
                            contientMin = true;
                        }
                    }
                    if (!contientMin) {
                        System.out.println("Au moins une minuscule, re-essai");
                        mdp = sc.next();
                    } else {
                        boolean contientChif = false;
                        for (int c = 0; c < mdp.length(); c++) {
                            if (Character.isDigit(mdp.charAt(c))) {
                                contientChif = true;
                            }
                        }
                        if (!contientChif) {
                            System.out.println("Au moins un chiffre, re-essai");
                            mdp = sc.next();
                        }
                    }
                }
            }
        }

        System.out.println
                (
                "Au moins 8 caracteres : ✓ " + '\n'
                + "Au moins une majuscule : ✓ "
                + '\n' + "Au moins une minuscule : ✓ "
                + '\n' + "Au moins un chiffre : ✓ "
                + '\n' + "Mot de passe valide !"
        );

        sc.close();
    }

    public static void exo5() {

        int[][] matrice = new int[5][5];
        System.out.print("    | ");
        for (int a = 1; a < 6; a++) {
            System.out.print(a + " ");
        }
        System.out.println("  ");
        System.out.print("-".repeat(4));
        System.out.print("|");
        System.out.print("-".repeat(15));

        System.out.println("  ");
        for (int i = 0; i < matrice.length; i++) {
            System.out.print("  " + (i + 1) + " | ");
            for (int j = 0; j < matrice[i].length; j++) {
                matrice[i][j] = (i+1) * (j+1);
                System.out.print(matrice[i][j] + " ");
            }
            System.out.println();
        }
    }

    public static void exo6() {

        /*Partie A : Triangle rectangle (N=5)
        for (int i = 1; i <= 5; i++) {
            String ligne = "";
            for (int j = 1; j <= i; j++) {
                ligne += "* ";
            }
            System.out.println(ligne);
        }*/

        /*Partie B : Triangle inverse (N=5)
        for (int i = 5; i >= 1 ; i--) {
            String ligne = "";
            for (int j = 1; j <= i ; j++) {
                ligne += "*";
            }
            System.out.println(ligne);
        }*/

        /*Partie C : Pyramide centree (N=5)
        for (int i = 0; i <= 5; i++) {
            System.out.print("  ");
            for (int j = 6 - i; j > 1; j--) {
                System.out.print(" ");
            }

            for (int j = 0; j <= i ; j++) {
                System.out.print("* ");
            }
            System.out.println();
        }*/

        /*Partie D (Bonus) : Losange (N=5)*/
        for (int i = 0; i <= 5 ; i++) {
            System.out.print("  ");

            for (int j = 6 - i; j > 1 ; j--) {
                System.out.print(" ");

            }

            for (int j = 0; j <= i; j++) {
                System.out.print("* ");

            }
            System.out.println();
        }
        for (int i = 4; i >= 0 ; i--) {
            System.out.print("  ");

            for (int j = 6 - i; j > 1 ; j--) {
                System.out.print(" ");

            }

            for (int j = 0; j <= i; j++) {
                System.out.print("* ");

            }
            System.out.println();
        }
    }

    public static void exo7() {

        Scanner sc = new Scanner(System.in);

        System.out.println("ton chiffre romain ? ");
        String rom = sc.next();

        int add = 0;
        int actu = 0;
        int next = 0;

        for (int i = 0; i < rom.length(); i++) {
            System.out.print(rom.charAt(i) + " -> ");

            switch (rom.charAt(i)) {
                case 'I':
                    actu = 1;
                    break;
                case 'V':
                    actu = 5;
                    break;
                case 'X':
                    actu = 10;
                    break;
                case 'L':
                    actu = 50;
                    break;
                case 'C':
                    actu = 100;
                    break;
                case 'D':
                    actu = 500;
                    break;
                case 'M':
                    actu = 1000;
                    break;
                default:
                    System.out.println("non romain");
            }

            if (rom.length() > (i + 1)) {
                switch (rom.charAt(i + 1)) {
                    case 'I':
                        next = 1;
                        break;
                    case 'V':
                        next = 5;
                        break;
                    case 'X':
                        next = 10;
                        break;
                    case 'L':
                        next = 50;
                        break;
                    case 'C':
                        next = 100;
                        break;
                    case 'D':
                        next = 500;
                        break;
                    case 'M':
                        next = 1000;
                        break;
                    default:
                        System.out.println("non romain");
                }

                if (actu < next) {
                    add -= actu;
                } else {
                    add += actu;
                }
            } else {
                add += actu;
            }


        }
        System.out.println(add);

        sc.close();
    }

    public static void main(String[] args) {
        exo7();
    }
}
