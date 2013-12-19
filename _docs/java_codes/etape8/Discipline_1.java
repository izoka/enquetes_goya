/*
 * Discipline.java
 */
package introavecswing.inscription;

//import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author pascal
 */
public class Discipline {
    /*
     * ATTRIBUTS
     */

    private int idDiscipline;
    private String nomDiscipline;
    private final String[] disciplines = {"Echecs", "Dames", "Bridge", "Poker", "Scopone scientifico"};
    private List listeJoueurs;

    /*
     * METHODES
     */
    /*
     * CONSTRUCTEURS
     */
    public Discipline() {
    }

    public Discipline(int idDiscipline, String nomDiscipline) {
        this.idDiscipline = idDiscipline;
        this.nomDiscipline = nomDiscipline;
    }

    /*
     * SETTERS ET GETTERS
     */
    public int getIdDiscipline() {
        return idDiscipline;
    }

    public void setIdDiscipline(int idDiscipline) {
        this.idDiscipline = idDiscipline;
    }

    public String getNomDiscipline() {
        return nomDiscipline;
    }

    public void setNomDiscipline(String nomDiscipline) {
        this.nomDiscipline = nomDiscipline;
    }
    
    // SUPPLEMENT
    public String getNomDiscipline(int aiIdDiscipline) {
        return disciplines[aiIdDiscipline];
    }    
    

    /*
     * AUTRES
     */
    @Override
    public String toString() {
        return "Discipline{" + "idDiscipline=" + idDiscipline + ", nomDiscipline=" + nomDiscipline + '}';
    }

    public String[] getDisciplines() {
        return disciplines;
    }
    
} /// FIN Class
