import java.util.*;

public class Tp3 {

    public static int minimum(int[] tab) {
        int min = tab[0];

        for (int i = 1; i < tab.length; i++) {
            if (tab[i] < min) {
                min = tab[i];
            }
        }
        System.out.println("min : " + min);

        return min;
    }

    public static int maximum(int[] tab) {
        int max = tab[0];

        for (int i = 1; i < tab.length; i++) {
            if (tab[i] > max) {
                max = tab[i];
            }
        }
        System.out.println("max : " + max);

        return max;
    }

    public static double moyenne(double[] tab) {
        double total = tab[0];

        for (int i = 1; i < tab.length; i++) {
            total += tab[i];
        }
        double result = total / tab.length;

        System.out.println("moyenne : " + result);

        return result;
    }

    public static double ecartType(double[] tab) {
        double total = tab[0];
        double totalCarre = 0;

        for (int i = 1; i < tab.length; i++) {
            total += tab[i];
        }
        double moyenne = total / tab.length;

        System.out.println("moyenne : " + moyenne);

        for (int i = 0; i < tab.length; i++) {
            double value = tab[i] - moyenne;
            value = value * value;
            totalCarre += value;
        }
        double ecartT = Math.sqrt(totalCarre / tab.length);
        ecartT = Math.ceil(ecartT * 100) / 100;

        System.out.println("ecart type : " + ecartT);

        return ecartT;
    }

    public static void menuExo2() {
        Scanner sc = new Scanner(System.in);

        String[] items = new String[10];

        while (true) {
            System.out.println(" --- LISTE DE COURSES ---");
            System.out.println("Votre choix : \n" +
                    "1. Ajouter un produit\n" +
                    "2. Supprimer un produit\n" +
                    "3. Rechercher un produit\n" +
                    "4. Afficher la liste\n" +
                    "5. Quitter"
            );

            System.out.println("Quel est votre choix ? ");
            int choice = sc.nextInt();
            System.out.println("votre choix est : " + choice);

            if (choice == 1) {
                System.out.println("Quel produit voulez-vous ajouter ?");
                String item = sc.next();
                System.out.println(item);
                for (int i = 0; i < items.length; i++) {
                    if (items[i] == null) {
                        items[i] = item;
                        break;
                    }
                }
            } else if (choice == 2) {
                System.out.println("Quel produit voulez-vous supprimer ?");
                for (int i = 0; i < items.length; i++) {
                    if (items[i] != null) {
                        System.out.println(" -> " + items[i]);
                    }
                }
                String item = sc.next();
                for (int i = 0; i < items.length; i++) {
                    if (items[i] != null && items[i].equals(item)) {
                        items[i] = null;
                        System.out.println(item + " a ete supprimer !");
                        break;
                    }
                }
            } else if (choice == 3) {
                System.out.println("Quel produit voulez-vous rechercher ?");
                String item = sc.next();
                int i = 0;
                for (; i < items.length; i++) {
                    if (items[i] != null && items[i].equals(item)) {
                        System.out.println("-> " + item);
                        break;
                    }
                }
                if (i == 10 ) {
                    System.out.println("Aucun produit trouvé");
                }
            } else if (choice == 4) {
                for (int i = 0; i < items.length; i++) {
                    if (items[i] != null) {
                        System.out.println("-> " + items[i]);
                    }
                }
            } else if (choice == 5) {
                System.out.println("Au revoir");
                return;
            } else {
                System.out.println("Commande non accepter");
            }
        }

    }

    public static void exo3() {
        Scanner sc = new Scanner(System.in);

        System.out.println("Tapez votre phrase :");
        String phrase = sc.nextLine().toLowerCase();

        System.out.println("Entree : " + phrase);

        String[] split = phrase.split("\\s+");

        System.out.println(Arrays.toString(split));

        Map<String, Integer> occur = new HashMap<>();
        for (int i = 0; i < split.length; i++) {
            boolean result = occur.containsKey(split[i]);

            if (result) {
                int valeur = occur.get(split[i]);
                occur.put(split[i], valeur + 1);
            } else {
                occur.put(split[i], 1);
            }
        }
        while (true) {
            int nbMax = 0;
            String mb = "";
            for (Map.Entry<String, Integer> item : occur.entrySet()) {
               if (item.getValue() > nbMax) {
                   nbMax = item.getValue();
                   mb = item.getKey();
               }
            }
            System.out.println(mb + " → " + nbMax);
            occur.remove(mb);

            if (occur.isEmpty()) {
                return;
            }
        }

    }

    public static int[] doublesNaif(int[] tab) {
        ArrayList<Integer> doublons = new ArrayList<>();

        for (int i = 0; i < tab.length ; i++) {
            for (int j = i + 1; j < tab.length  ; j++) {
                if (tab[i] == tab[j]) {
                    if (!doublons.contains(tab[j])) {
                        doublons.add(tab[j]);
                    }
                }
            }
        }

        int[] resultat = new int[doublons.size()];
        for (int i = 0; i < doublons.size(); i++) {
            resultat[i] = doublons.get(i);
        }
        return resultat;
    }

    public static int[] doubleSet(int[] tab) {
        ArrayList<Integer> doublons = new ArrayList<>();

        HashSet<Integer> setDouble = new HashSet<>();

        for (int i = 0; i < tab.length ; i++) {
            if (setDouble.contains(tab[i])) {
                if (!doublons.contains(tab[i])) {
                    doublons.add(tab[i]);
                }
            } else {
                setDouble.add(tab[i]);
            }
        }

        int[] resultat = new int[doublons.size()];
        for (int i = 0; i < doublons.size(); i++) {
            resultat[i] = doublons.get(i);
        }
        return resultat;
    }

    public static void exo5() {

    }


    public static void main(String[] args) {
        /*int[] tab =  {10, 20, 30, 40, 50};
        minimum(tab);

        int[] tab2 =  {10, 20, 30, 40, 50};
        maximum(tab2);

        double[] tab3 =  {5, 12, 18, 20, 1};
        moyenne(tab3);

        double[] tab4 =  {-3,0,3};
        ecartType(tab4);*/

        /*int[] tab5 =  {1,2,3,2,4,3,5};
        int[] resultat = doublesNaif(tab5);
        System.out.println(Arrays.toString(resultat));*/

        /*int[] tab6 =  {1,2,3,2,4};
        int[] resultat2 = doubleSet(tab6);
        System.out.println(Arrays.toString(resultat2));*/

        exo5();

    }
}
