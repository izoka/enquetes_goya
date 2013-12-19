/*
 * Inscrit.java
 */
package introavecswing.inscription;

/**
 *
 * @author pascal
 */
public class Inscrit {

    /*
     * ATTRIBUTS
     */
    protected int idInscrit;
    protected String pseudo;
    protected String mdp;
    protected int age;
    protected String dateInscription;

    /*
     * CONSTRUCTEURS
     */
    public Inscrit() {
    }

    public Inscrit(int idInscrit, String pseudo, String mdp, int age, String dateInscription) {
        this.idInscrit = idInscrit;
        this.pseudo = pseudo;
        this.mdp = mdp;
        this.age = age;
        this.dateInscription = dateInscription;
    }

    /*
     * GETTERS ET SETTERS
     */
    public int getIdInscrit() {
        return idInscrit;
    }

    public void setIdInscrit(int idInscrit) {
        this.idInscrit = idInscrit;
    }

    public String getPseudo() {
        return pseudo;
    }

    public void setPseudo(String pseudo) {
        this.pseudo = pseudo;
    }

    public String getMdp() {
        return mdp;
    }

    public void setMdp(String mdp) {
        this.mdp = mdp;
    }

    public int getAge() {
        return age;
    }

    public void setAge(int age) {
        this.age = age;
    }

    public String getDateInscription() {
        return dateInscription;
    }

    public void setDateInscription(String dateInscription) {
        this.dateInscription = dateInscription;
    }
    
    /*
     * AUTRES METHODES
     */

    @Override
    public String toString() {
        return "Inscrit{" + "idInscrit=" + idInscrit + ", pseudo=" + pseudo + ", mdp=" + mdp + ", age=" + age + ", dateInscription=" + dateInscription + '}';
    }
    
    
}
