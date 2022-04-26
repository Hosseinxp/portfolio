package personal_ppe;

import javax.swing.*;    // des utiles d'Interface Graphiqe
import javax.swing.text.DefaultHighlighter;

import java.awt.*;
import java.awt.event.*;  // ActionListener
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;




public class Code2 extends JFrame implements ActionListener{
	
	// Creation d'un costructeur sans entrer
		public Code2() throws HeadlessException{
			GestionBDD();
			Codes();
		}
	
	//*****************************************************************************************************************
	JButton btn_Ajouter,btn_Consultation,btn_Supprimer;
	JComboBox<String> cmb_Genre,cmb_Taille,cmb_Couleur,cmb_Type;
	JLabel lbl_Genre,lbl_Couleur,lbl_Type,lbl_Taille,lbl_Prix,lbl_Quantité;
	JTextField txt_Prix,txt_Quantité;
	JFrame mainf;
	JTextArea txtPn_textPane;
	JScrollPane scroll ;
	
	private void Codes(){
	mainf=new JFrame("GRETA STORE");
	mainf.setVisible(true);
	mainf.setLayout(null);
	mainf.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
	// Taille du cadre
	Dimension tc=Toolkit.getDefaultToolkit().getScreenSize();   // tc = taille d'écran
	int wEcran=(int) tc.getWidth();
	int hEcran=(int) tc.getHeight();
	int wCadre=700;
	int hCadre=500;
	mainf.setBounds(wEcran/2-wCadre/2,hEcran/2-hCadre/2,wCadre,hCadre);
	
//  mainf.setBounds(650,320,800,500);
	mainf.getContentPane().setBackground(new Color(30,90,150));
	
	//*****************************************************************************************************************
	//******Creatrion des labels et fixer leurs positionnement
	
	int Distance=105;    // la distance vertical entre des labels 
	
	lbl_Genre=new JLabel("Genre");
	lbl_Genre.setBounds(7,20,50,23);
	lbl_Genre.setForeground(Color.GREEN);
	lbl_Genre.setOpaque(true);
	
	lbl_Couleur=new JLabel("Couleur");
	lbl_Couleur.setBounds(Distance,20,50,23);
	lbl_Couleur.setForeground(Color.GREEN);

	lbl_Type=new JLabel("Type");
	lbl_Type.setBounds(Distance+=105,20,50,23);
	lbl_Type.setForeground(Color.GREEN);
	
	lbl_Taille=new JLabel("Taille");
	lbl_Taille.setBounds(Distance+=105,20,50,23);
	lbl_Taille.setForeground(Color.GREEN);
	
	lbl_Prix=new JLabel("Prix");
	lbl_Prix.setBounds(Distance+=105,20,50,23);
	lbl_Prix.setForeground(Color.GREEN);
	
	lbl_Quantité=new JLabel("Quantité");
	lbl_Quantité.setBounds(Distance+=105,20,50,23);
	lbl_Quantité.setForeground(Color.GREEN);
	
	//*** ajouter les libels au cadre
	mainf.add(lbl_Genre);
	mainf.add(lbl_Type);
	mainf.add(lbl_Taille);
	mainf.add(lbl_Couleur);
	mainf.add(lbl_Prix);
	mainf.add(lbl_Quantité);
	
	//*****************************************************************************************************************
		
	// Creation des listes de roullantes + ajouter au cadre
	int Distance2=100;
	Object[] Genre= new Object[] {"M", "F"};
	cmb_Genre= new JComboBox(Genre);
	cmb_Genre.setBounds(5,90,60,30);
	mainf.add(cmb_Genre);
	cmb_Genre.addActionListener(this);
	
	Object[] Couleur= new Object[] {"Rouge", "Vert", "Noir", "Beige", "Blue" };
	cmb_Couleur = new JComboBox(Couleur);
	cmb_Couleur.setBounds(Distance2,90,60,30);
	mainf.add(cmb_Couleur);
	cmb_Couleur.addActionListener(this);
	
	
	Object[] Type= new Object[] {"Robe", "Veste", "Pantalon","Chemise", "Jupe" };
	cmb_Type= new JComboBox(Type);
	cmb_Type.setBounds(Distance2+=100,90,60,30);
	mainf.add(cmb_Type);
	cmb_Type.addActionListener(this);
	
	
	Object[] Taille= new Object[] {"1ans - 6ans", "7ans - 12ans", "13ans - 18ans", "Adulte" };
	cmb_Taille = new JComboBox(Taille);
	cmb_Taille.setBounds(Distance2+=100,90,80,30);
	mainf.add(cmb_Taille);
	cmb_Taille.addActionListener(this);
	
	
	//*****************************************************************************************************************
	//creation des Textfields +ajouter au cadre
	
	txt_Prix=new JTextField();
	txt_Prix.setBounds(Distance2+=100,90,80,30);
	mainf.add(txt_Prix);
	
	
	txt_Quantité=new JTextField();
	txt_Quantité.setBounds(Distance2+=115,90,80,30);
	mainf.add(txt_Quantité);
	//*****************************************************************************************************************
	//Creation des Buttons + ajouter au cadre
	
	btn_Ajouter=new JButton("Ajouter l'article");
	btn_Ajouter.setBounds(15,170,180,35);
	btn_Ajouter.setBackground(Color.GREEN);
	mainf.add(btn_Ajouter);
	btn_Ajouter.addActionListener(this);
	
	btn_Supprimer=new JButton("Supprimer l'article");
	btn_Supprimer.setBounds(240,170,180,35);
	btn_Supprimer.setBackground(Color.RED);
	mainf.add(btn_Supprimer);
	btn_Supprimer.addActionListener(this);
	
	btn_Consultation=new JButton("Consultation Stock");
	btn_Consultation.setBounds(465,170,180,35);
	btn_Consultation.setBackground(Color.BLACK);
	btn_Consultation.setForeground(Color.WHITE);
	mainf.add(btn_Consultation);
	btn_Consultation.addActionListener(this);
	//*****************************************************************************************************************
	
	// Creation le TextPane et ScrollPane et les ajouter au cadre
	txtPn_textPane = new JTextArea(15,50);
	txtPn_textPane.setBounds(35,200,300,100);
	mainf.add(txtPn_textPane);
	txtPn_textPane.setFocusable(true);
	
	scroll = new JScrollPane(txtPn_textPane);
	mainf.add(scroll);
	
	}
	//****************************************************************************************
	// Variables pour la recuperation des liste deroulante
			String genre;
			String type;
			String taille;
			String couleur;
			
	// Varibales des Prix et Quantité
			
			static float prix;
			static int quantité;
			int s ; // Le prix supprimer
			int p; //le quantité supprimé
	//***********************************************************************************************
	
	// Attributs BDD
		private Connection con;
		
		private ResultSet Res;
		
		private PreparedStatement pp_stmt;
		
		private Statement stmt;
		
	// Connection a la BDD	
		void GestionBDD() {
				try {
				Class.forName("com.mysql.jdbc.Driver");
				System.out.println("Ca marche , Nous avons trouvé votre Driver!");
				}catch(Exception e) {
					System.out.println(e.getMessage());
				}
				try {
					con=DriverManager.getConnection("jdbc:mysql://localhost:3306/achatenligne","root","");
					stmt=con.createStatement();
					}catch(Exception e) {
						System.out.println("Error : "+e.getMessage());
					}
				
			}
				
			
	//******************************************************************************************************************************************		
	// ActionListener(event) = rendre le code responsive = écouter au client!
	public void actionPerformed(ActionEvent e) {
		Object obj=e.getSource();   // getSource() est une méthode pour connaitre quels sont les éléments(button,liste de roulant,etc) peuvent étre traité par le client
		
		if (e.getSource() == btn_Consultation) {
			try {
				txtPn_textPane.append("Vous avez :\n");
				String Consultation="Select * from stock";
				PreparedStatement pp_stmt=con.prepareStatement(Consultation);
				ResultSet Res=pp_stmt.executeQuery();
				while(Res.next()) {
					txtPn_textPane.append("genre : " + Res.getString(1) + "\n  type_vetement : "+ Res.getString(2) +
							"\n  taille : "+ Res.getString(3) +"\n  couleur : "+ Res.getString(4)+ "\n  prix_unitaire : " + 
							Res.getInt(5)+ "  €"+ "\n  quantite : "+Res.getInt(6)+ "\n");
					System.out.println("  genre : " + Res.getString(1) + "\n  type_vetement : "+ Res.getString(2) +
							"\n  taille : "+ Res.getString(3) +"\n  couleur : "+ Res.getString(4)+ "\n  prix_unitaire : " + 
							Res.getInt(5)+ "  €"+ "\n  quantite : "+Res.getInt(6)+ "\n");
				}
				
			} catch (Exception e1) {
				
				System.out.println(e1.getMessage());
			}
			
			
		}
	

		else if (e.getSource() == cmb_Genre) {
			genre = (String) cmb_Genre.getSelectedItem();
		}
		
		else if (e.getSource() == cmb_Type) {
			type = (String) cmb_Type.getSelectedItem();
		}
		
		else if (e.getSource() == cmb_Taille) {
			taille = (String) cmb_Taille.getSelectedItem();
		}
		
		else if (e.getSource() == cmb_Couleur) {
			couleur = (String) cmb_Couleur.getSelectedItem();
		}
		
		
		else if(obj==btn_Ajouter) 
		{	
			
			try {
				String sql_Ajouter="Insert into stock values(?,?,?,?,?,?)";
				pp_stmt=con.prepareStatement(sql_Ajouter);
				pp_stmt.setString(1,genre);
				pp_stmt.setString(2,type);
				pp_stmt.setString(3,taille);
				pp_stmt.setString(4,couleur);
				prix=Float.parseFloat(txt_Prix.getText());
				quantité=Integer.parseInt(txt_Quantité.getText());
				if (prix >0 && quantité > 0) {
				pp_stmt.setFloat(5,prix);
				pp_stmt.setInt(6,quantité);
				}
				int rowsAffected = pp_stmt.executeUpdate();
					if (rowsAffected > 0) {
						System.out.println("Vous avez ajouté "+quantité+" "+type+" "+couleur+" de genre "+genre+" de taille "+taille+" qui coutent "+quantité*prix+" € totale et "+prix+" € pour chaque "+type);
										  }	
				}catch(Exception err) {
					System.out.println("la valeur de saisie pour le Prix : "+prix+" et la quantité : "+quantité+" . Vérifier les valeurs saisies.");
			
								}
										
			
			
		}else if(obj==btn_Supprimer) {
			try {
			String Drop = "delete from stock where Genre = ? and Type = ? and Taille = ? and Couleur = ? and Prix = ? and Quantité = ?";
			PreparedStatement prepStat;
			pp_stmt = con.prepareStatement(Drop);
			pp_stmt.setString(1, genre);
			pp_stmt.setString(2, type);
			pp_stmt.setString(3, taille);
			pp_stmt.setString(4, couleur);
			int s = Integer.parseInt(txt_Prix.getText());
			p = Integer.parseInt(txt_Quantité.getText());
			if (s >0 && p > 0) {
				pp_stmt.setInt(5, s);
				pp_stmt.setInt(6, p);
			}
			int rowsAffected = pp_stmt.executeUpdate();
			System.out.println("Vous avez ajouté "+p+" "+type+" "+couleur+" de genre "+genre+" de taille "+taille+" qui coutent "+p*s+" € totale et "+s+" € pour chaque "+type);
			}catch(Exception errr) {
				System.out.println("la valeur de saisie pour le Prix : "+s+" et la quantité : "+p+" . Vérifier les valeurs saisies. En plus, vérifier si les vetements que vous voulez supprimer existe dans le stock !");
			}
		}
		
	}
	}


