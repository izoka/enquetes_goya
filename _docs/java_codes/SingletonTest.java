package intro.singleton;

/**
 *
 * @author stagiaire
 */
public class SingletonTest {
    public static void main(String[] args) {
//        new Fenetre();
//        new Fenetre();
        
        
        Fenetre f1 = Fenetre.getInstance();
        Fenetre f2 = Fenetre.getInstance();
    }
}
