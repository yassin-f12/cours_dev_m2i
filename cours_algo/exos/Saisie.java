import java.util.Scanner;

public class Saisie {
    public static void main(String[] args) {

        Scanner scanner = new Scanner(System.in);

        System.out.print("Votre prenom ? ");
        String  prenom = scanner.nextLine();

        System.out.println("Bonjour " + prenom);


        System.out.println("ton code secret ? ");

        while(!scanner.hasNextInt()) {
            System.out.println("nn");
            scanner.next();
        }
        int secret = scanner.nextInt();

        if (secret == 1234) {
            System.out.println("Ton code est bon " + prenom + " !");
        } else {
            System.out.println("Tu n'est pas celui qui nous faut " + prenom + "...");
        };

        scanner.close();

    }
}