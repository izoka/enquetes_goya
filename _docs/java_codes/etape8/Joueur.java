/*
 * Joueur.java
 */
package introavecswing.inscription;

/**
 *
 * @author pascal
 */
public class Joueur extends Inscrit {
    /*
     * ATTRIBUTS
     */

    private int classement;
    private Discipline discipline;

    /*
     * METHODES
     */

    /*
     * CONSTRUCTEURS
     */
    public Joueur() {
    }

    public Joueur(int idInscrit, String pseudo, String mdp, int age, String dateInscription, int classement, Discipline discipline) {
        super(idInscrit, pseudo, mdp, age, dateInscription);
        this.classement = classement;
        this.discipline = discipline;
    }

    /*
     * GETTERS ET SETTERS
     */
    public int getClassement() {
        return classement;
    }

    public void setClassement(int classement) {
        this.classement = classement;
    }

    public Discipline getDiscipline() {
        return discipline;
    }

    public void setDiscipline(Discipline discipline) {
        this.discipline = discipline;
    }

    /*
     * AUTRES METHODES
     */
    @Override
    public String toString() {
        
        String lsJoueur = "";
        lsJoueur += super.toString();
        lsJoueur += "Joueur{" + "classement=" + classement + ", discipline=" + discipline + '}';
        return  lsJoueur;
    }
} /// FIN Class
